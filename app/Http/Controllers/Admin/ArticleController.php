<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student_article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * แสดงรายการบทความทั้งหมด
     */
    public function index(Request $request)
    {
        $query = Student_article::query();

        // ค้นหาตามชื่อบทความ
        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        // กรองตามหมวดหมู่
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // กรองตามสถานะ
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $articles = $query->latest()->paginate(15);

        // ดึงหมวดหมู่ทั้งหมดสำหรับ filter
        $categories = Student_article::select('category')
                                     ->whereNotNull('category')
                                     ->groupBy('category')
                                     ->pluck('category');

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    /**
     * แสดงฟอร์มสร้างบทความใหม่
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * บันทึกบทความใหม่
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:student_articles,slug',
            'short_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ], [
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'slug.unique' => 'Slug นี้ถูกใช้ไปแล้ว',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'image.image' => 'ไฟล์ต้องเป็นรูปภาพเท่านั้น',
            'image.max' => 'ขนาดไฟล์ต้องไม่เกิน 2MB',
        ]);

        // สร้าง slug อัตโนมัติถ้าไม่มี
        if (empty($validated['slug'])) {
            $slug = Str::slug($validated['title']);
            if (empty($slug)) {
                $slug = 'article-' . time() . '-' . rand(1000, 9999);
            }
            $validated['slug'] = $slug;
        }

        // อัปโหลดรูปภาพ
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/articles'), $imageName);
            $validated['image'] = 'images/articles/' . $imageName;
        }

        // กำหนดค่า default
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['views'] = 0;

        // ถ้าไม่มี published_at ให้ใช้เวลาปัจจุบัน
        if (empty($validated['published_at']) && $validated['is_active']) {
            $validated['published_at'] = now();
        }

        Student_article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'สร้างบทความสำเร็จ');
    }

    /**
     * แสดงฟอร์มแก้ไขบทความ
     */
    public function edit($id)
    {
        $article = Student_article::findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * อัปเดตบทความ
     */
    public function update(Request $request, $id)
    {
        $article = Student_article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:student_articles,slug,' . $id,
            'short_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ], [
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'slug.unique' => 'Slug นี้ถูกใช้ไปแล้ว',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'image.image' => 'ไฟล์ต้องเป็นรูปภาพเท่านั้น',
            'image.max' => 'ขนาดไฟล์ต้องไม่เกิน 2MB',
        ]);

        // อัปเดต slug ถ้ามีการเปลี่ยนแปลง
        if (!empty($validated['slug']) && $validated['slug'] !== $article->slug) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        // อัปโหลดรูปภาพใหม่
        if ($request->hasFile('image')) {
            // ลบรูปเก่า
            if ($article->image && file_exists(public_path($article->image))) {
                unlink(public_path($article->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/articles'), $imageName);
            $validated['image'] = 'images/articles/' . $imageName;
        }

        // กำหนดค่า checkbox
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'อัปเดตบทความสำเร็จ');
    }

    /**
     * ลบบทความ
     */
    public function destroy($id)
    {
        $article = Student_article::findOrFail($id);

        // ลบรูปภาพ
        if ($article->image && file_exists(public_path($article->image))) {
            unlink(public_path($article->image));
        }

        $article->delete();

        return back()->with('success', 'ลบบทความสำเร็จ');
    }
}
