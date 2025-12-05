@extends('Tutor_layout')

@section('title', 'สมัครติวเตอร์ | EngBuddy')

@section('content')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f5f7fa; }

        .main { max-width: 1200px; margin: 40px auto; padding: 0 20px; }

        .welcome { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 40px; border-radius: 8px; margin-bottom: 30px; }
        .welcome h1 { font-size: 28px; margin-bottom: 10px; }

        .status-badge { padding: 6px 12px; border-radius: 20px; font-size: 14px; font-weight: 500; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }

        .card { background: white; border-radius: 8px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card-title { font-size: 20px; color: #2c3e50; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #3498db; }

        .info-row { display: grid; grid-template-columns: 200px 1fr; padding: 12px 0; border-bottom: 1px solid #ecf0f1; }
        .info-row:last-child { border-bottom: none; }

        .info-label { color: #7f8c8d; font-weight: 500; }
        .info-value { color: #2c3e50; }

        .list-item { background: #f8f9fa; padding: 16px; border-radius: 4px; margin-bottom: 12px; }
        .list-item-title { font-weight: 600; color: #2c3e50; margin-bottom: 8px; }
        .list-item-detail { color: #7f8c8d; font-size: 14px; }

        .btn { padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 14px;
               font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s; }
        .btn-primary { background: #3498db; color: white; }
        .btn-primary:hover { background: #2980b9; transform: translateY(-1px); }

        .alert { padding: 16px; border-radius: 6px; margin-bottom: 20px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }

        .card-header { display: flex; justify-content: space-between; align-items: center;
                       margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #3498db; }

        @media (max-width: 768px) {
            .info-row { grid-template-columns: 1fr; gap: 4px; }
        }
    </style>

    <div class="main">

        <div class="welcome">
            <h1>สวัสดี คุณ{{ $tutorProfile->first_name }}!</h1>
            <p>ยินดีต้อนรับสู่ระบบติวเตอร์ EngBuddy</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

 


        <div class="card">
            <div class="card-header">
                <h2 style="margin: 0; font-size: 20px; color: #2c3e50;">ข้อมูลส่วนตัว</h2>
            </div>

            <div class="info-row">
                <div class="info-label">ชื่อ-นามสกุล</div>
                <div class="info-value">{{ $tutorProfile->first_name }} {{ $tutorProfile->last_name }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">อีเมล</div>
                <div class="info-value">{{ $user->email }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">เบอร์โทรศัพท์</div>
                <div class="info-value">{{ $tutorProfile->phone }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">ที่อยู่</div>
                <div class="info-value">
                    {{ $tutorProfile->address }}
                    @if($tutorProfile->district), {{ $tutorProfile->district }}@endif
                    @if($tutorProfile->province), {{ $tutorProfile->province }}@endif
                    @if($tutorProfile->postal_code) {{ $tutorProfile->postal_code }}@endif
                </div>
            </div>

            @if($tutorProfile->experience)
            <div class="info-row">
                <div class="info-label">ประสบการณ์การสอน</div>
                <div class="info-value">{{ $tutorProfile->experience->years_of_experience ?? 'N/A' }} ปี</div>
            </div>
            @endif

            @if($tutorProfile->bio)
                <div class="info-row">
                    <div class="info-label">แนะนำตัว</div>
                    <div class="info-value">{{ $tutorProfile->bio }}</div>
                </div>
            @endif
        </div>


        <div class="card">
            <h2 class="card-title">วุฒิการศึกษา</h2>

            @forelse($tutorProfile->educations as $education)
                <div class="list-item">
                    <div class="list-item-title">
                        @if($education->degree_level === 'bachelor') ปริญญาตรี
                        @elseif($education->degree_level === 'master') ปริญญาโท
                        @elseif($education->degree_level === 'phd') ปริญญาเอก
                        @elseif($education->degree_level === 'certificate') ประกาศนียบัตร
                        @else อนุปริญญา
                        @endif

                        — {{ $education->field_of_study }}
                    </div>
                    <div class="list-item-detail">
                        {{ $education->institution }} ({{ $education->graduation_year }})
                    </div>
                </div>
            @empty
                <p style="color:#7f8c8d;">ยังไม่มีข้อมูลวุฒิการศึกษา</p>
            @endforelse
        </div>


        <div class="card">
            <h2 class="card-title">วิชาที่สอนได้</h2>

            @forelse($tutorProfile->subjects as $subject)
                <div class="list-item">
                    <div class="list-item-title">{{ $subject->subject_name }}</div>

                    <div class="list-item-detail">
                        <strong style="color: #27ae60;">฿{{ number_format($subject->hourly_rate, 0) }}</strong> บาท/ชั่วโมง
                        @if($subject->description)
                            <br><span style="color: #7f8c8d;">{{ $subject->description }}</span>
                        @endif
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 20px; color: #95a5a6;">
                    <p>ยังไม่มีข้อมูลวิชาที่สอน</p>
                </div>
            @endforelse
        </div>

    </div>

@endsection
