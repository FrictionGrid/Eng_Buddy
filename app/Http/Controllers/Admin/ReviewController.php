<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\student_review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * แสดงรายการรูปรีวิวทั้งหมด
     */
    public function index()
    {
        $reviews = student_review::latest()->paginate(12);

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * แสดงฟอร์มเพิ่มรูปรีวิว
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * บันทึกรูปรีวิวใหม่
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.required' => 'กรุณาเลือกรูปภาพ',
            'image.image' => 'ไฟล์ต้องเป็นรูปภาพเท่านั้น',
            'image.mimes' => 'รองรับเฉพาะไฟล์ .jpeg, .png, .jpg, .gif',
            'image.max' => 'ขนาดไฟล์ต้องไม่เกิน 2MB',
        ]);

        // อัปโหลดรูปภาพ
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/reviews'), $imageName);

            student_review::create([
                'image' => 'images/reviews/' . $imageName,
            ]);
        }

        return redirect()->route('admin.reviews.index')
            ->with('success', 'เพิ่มรูปรีวิวสำเร็จ');
    }

    /**
     * แสดงฟอร์มแก้ไขรูปรีวิว
     */
    public function edit($id)
    {
        $review = student_review::findOrFail($id);

        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * อัปเดตรูปรีวิว
     */
    public function update(Request $request, $id)
    {
        $review = student_review::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.image' => 'ไฟล์ต้องเป็นรูปภาพเท่านั้น',
            'image.mimes' => 'รองรับเฉพาะไฟล์ .jpeg, .png, .jpg, .gif',
            'image.max' => 'ขนาดไฟล์ต้องไม่เกิน 2MB',
        ]);

        // ถ้ามีการอัปโหลดรูปใหม่
        if ($request->hasFile('image')) {
            // ลบรูปเก่า
            if ($review->image && file_exists(public_path($review->image))) {
                unlink(public_path($review->image));
            }

            // อัปโหลดรูปใหม่
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/reviews'), $imageName);

            $review->update([
                'image' => 'images/reviews/' . $imageName,
            ]);
        }

        return redirect()->route('admin.reviews.index')
            ->with('success', 'อัปเดตรูปรีวิวสำเร็จ');
    }

    /**
     * ลบรูปรีวิว
     */
    public function destroy($id)
    {
        $review = student_review::findOrFail($id);

        // ลบรูปภาพจากเซิร์ฟเวอร์
        if ($review->image && file_exists(public_path($review->image))) {
            unlink(public_path($review->image));
        }

        $review->delete();

        return back()->with('success', 'ลบรูปรีวิวสำเร็จ');
    }
}
