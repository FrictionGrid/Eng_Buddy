@extends('Tutor_layout')

@section('title', 'EngBuddy | หาติวเตอร์สอนพิเศษภาษาอังกฤษ หาครูสอนพิเศษ เรียนพิเศษตัวต่อตัว')

@section('content')

  <div class="page-title">
    <h1>งานสอน (สำหรับติวเตอร์)</h1>
    <p>รวมทุกงานสอนไว้ในตารางเดียว พร้อมตัวช่วยค้นหา</p>
  </div>

  <div class="controls">
    <label class="search">
      <input id="q" class="search-input" placeholder="ค้นหา: ประเภท, สถานที่…" />
    </label>
    <select id="category" class="select filter-dropdown">
      <option value="">ทุกประเภท</option>
    </select>
    <select id="ageGroup" class="select filter-dropdown">
      <option value="">ทุกกลุ่มวัย</option>
    </select>
    <select id="day" class="select filter-dropdown">
      <option value="">ทุกวัน</option>
        <option value="อาทิตย์">อาทิตย์</option>
      <option value="จันทร์">จันทร์</option>
    <option value="จันทร์">อังคาร</option>
      <option value="พุธ">พุธ</option>
      <option value="พุธ">พฤหัสบดี</option>
       <option value="พุธ">ศุกร์</option>
      <option value="เสาร์">เสาร์</option>
    </select>
    <select id="sort" class="sort filter-dropdown">
      <option value="recent">ล่าสุดก่อน</option>
    </select>
  </div>


   <!-- JOBS TABLE -->
    <section id="jobs" class="container">
        <div class="card">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>วิชา</th>
                        <th>สถานที่สอน</th>
                        <th>วันเรียน</th>
                        <th>รหัสงาน</th>
                    </tr>
                </thead>
                <tbody id="homepage-courses">
                    @forelse($courses as $course)
                    <tr>
                        <td>
                            <strong>{{ $course->subject }}</strong>
                            @if($course->description)
                                {{ $course->description }}
                            @endif
                            @if($course->rate)
                                <div style="color:#0a7a2a;font-weight:bold;margin-top:4px;">฿{{ number_format($course->rate) }} / ชม.</div>
                            @endif
                        </td>
                        <td>{{ $course->location }}</td>
                        <td>{{ $course->day }} {{ $course->time }}</td>
                        <td class="code">
                            {{ $course->job_code }}
                            <span class="pill">{{ $course->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align:center;padding:40px;color:#999;">
                            ยังไม่มีงานสอนในขณะนี้
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </section>
  <!-- Curved divider -->
  <div class="wave" aria-hidden="true">
    <svg viewBox="0 0 1440 90" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="url(#g)" d="M0,64 C240,112 480,16 720,32 C960,48 1200,112 1440,64 L1440,90 L0,90 Z"></path>
      <defs>
        <linearGradient id="g" x1="0" x2="1" y1="0" y2="0">
          <stop offset="0%" stop-color="#e6efff"/>
          <stop offset="100%" stop-color="#f3f6ff"/>
        </linearGradient>
      </defs>
    </svg>
  </div>
    <!-- CTA BAR (ปรับดีไซน์) -->
  <section class="cta-bar" aria-label="ติดต่อเรา">
    <div class="cta-inner">
      <div>
        <div class="cta-title">เพียงกรอก <strong>สมัครติวเตอร์</strong> แล้วเลือกงานสอนที่ใช่</div>
        <p class="cta-sub">ทีมงานตอบไว ภายในเวลาทำการ – ติดต่อเราผ่านช่องทางที่สะดวกด้านล่าง</p>
        <p class="cta-note">* แนะนำให้แจ้ง <strong>Job ID</strong> ตอนทัก เพื่อความรวดเร็ว</p>
      </div>
      <div class="cta-actions" role="group" aria-label="ปุ่มติดต่อโซเชียล">
        <a class="social-btn line" href="#" aria-label="LINE @EngBuddy">
          <svg class="social-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.8 4.2A10 10 0 104 19.8L2.5 22a1 1 0 001.3 1.3L6 21.9A10 10 0 1019.8 4.2z"></path></svg>
          <span>LINE</span>
          <span class="tag">@EngBuddy</span>
        </a>
        <a class="social-btn tiktok" href="#" aria-label="TikTok @EngBuddy">
          <svg class="social-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
          <span>TikTok</span>
          <span class="tag">@EngBuddy</span>
        </a>
      </div>
    </div>
  </section>




<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('q');
    const categorySelect = document.getElementById('category');
    const ageGroupSelect = document.getElementById('ageGroup');
    const daySelect = document.getElementById('day');
    const sortSelect = document.getElementById('sort');
    const tableBody = document.getElementById('homepage-courses');
    const allRows = Array.from(tableBody.querySelectorAll('tr'));

    // Function to filter and display rows
    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedCategory = categorySelect.value.toLowerCase();
        const selectedAgeGroup = ageGroupSelect.value.toLowerCase();
        const selectedDay = daySelect.value.toLowerCase();

        let visibleRows = allRows.filter(row => {
            // Skip empty state row
            if (row.cells.length === 1) return false;

            const subject = row.cells[0].textContent.toLowerCase();
            const location = row.cells[1].textContent.toLowerCase();
            const day = row.cells[2].textContent.toLowerCase();
            const jobCode = row.cells[3].textContent.toLowerCase();

            // Search filter
            const matchesSearch = !searchTerm ||
                subject.includes(searchTerm) ||
                location.includes(searchTerm) ||
                day.includes(searchTerm) ||
                jobCode.includes(searchTerm);

            // Day filter
            const matchesDay = !selectedDay || day.includes(selectedDay);

            // Category filter (based on subject keywords)
            let matchesCategory = true;
            if (selectedCategory) {
                matchesCategory = subject.includes(selectedCategory);
            }

            // Age group filter (based on keywords in subject)
            let matchesAgeGroup = true;
            if (selectedAgeGroup) {
                matchesAgeGroup = subject.includes(selectedAgeGroup);
            }

            return matchesSearch && matchesDay && matchesCategory && matchesAgeGroup;
        });

        // Sort rows
        const sortValue = sortSelect.value;
        if (sortValue === 'recent') {
            // Keep original order (most recent first)
            visibleRows.reverse();
        }

        // Hide all rows first
        allRows.forEach(row => row.style.display = 'none');

        // Show filtered rows
        if (visibleRows.length > 0) {
            visibleRows.forEach(row => row.style.display = '');
        } else {
            // Show "no results" message
            const noResultsRow = tableBody.querySelector('tr[colspan]');
            if (noResultsRow) {
                noResultsRow.style.display = '';
                noResultsRow.cells[0].textContent = 'ไม่พบงานสอนที่ตรงกับเงื่อนไขการค้นหา';
            }
        }
    }

    // Add event listeners
    searchInput.addEventListener('input', filterTable);
    categorySelect.addEventListener('change', filterTable);
    ageGroupSelect.addEventListener('change', filterTable);
    daySelect.addEventListener('change', filterTable);
    sortSelect.addEventListener('change', filterTable);

    // Populate category dropdown dynamically
    const categories = new Set();
    allRows.forEach(row => {
        if (row.cells.length > 1) {
            const subject = row.cells[0].textContent;
            // Extract category keywords
            if (subject.includes('TOEIC')) categories.add('TOEIC');
            if (subject.includes('IELTS')) categories.add('IELTS');
            if (subject.includes('Conversation')) categories.add('Conversation');
            if (subject.includes('Grammar')) categories.add('Grammar');
            if (subject.includes('ติวสอบ')) categories.add('ติวสอบ');
        }
    });
    categories.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.toLowerCase();
        option.textContent = cat;
        categorySelect.appendChild(option);
    });

    // Populate age group dropdown dynamically
    const ageGroups = new Set();
    allRows.forEach(row => {
        if (row.cells.length > 1) {
            const subject = row.cells[0].textContent;
            if (subject.includes('Kids') || subject.includes('เด็ก')) ageGroups.add('เด็ก');
            if (subject.includes('ม.ต้น')) ageGroups.add('ม.ต้น');
            if (subject.includes('ม.4') || subject.includes('ม.ปลาย')) ageGroups.add('ม.ปลาย');
            if (subject.includes('คนทำงาน') || subject.includes('ผู้ใหญ่')) ageGroups.add('ผู้ใหญ่');
        }
    });
    ageGroups.forEach(age => {
        const option = document.createElement('option');
        option.value = age.toLowerCase();
        option.textContent = age;
        ageGroupSelect.appendChild(option);
    });

    // เปลี่ยน placeholder บน mobile
    function updatePlaceholder() {
        if (window.innerWidth <= 768) {
            searchInput.placeholder = "ค้นหา: วิชา, สถานที่, วัน, รหัสงาน…";
        } else {
            searchInput.placeholder = "ค้นหา: ประเภท, สถานที่…";
        }
    }

    updatePlaceholder();
    window.addEventListener('resize', updatePlaceholder);
});
</script>

@endsection