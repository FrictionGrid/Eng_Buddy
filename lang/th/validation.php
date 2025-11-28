<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute ต้องได้รับการยอมรับ',
    'accepted_if' => ':attribute ต้องได้รับการยอมรับเมื่อ :other เป็น :value',
    'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
    'after' => ':attribute ต้องเป็นวันที่หลังจาก :date',
    'after_or_equal' => ':attribute ต้องเป็นวันที่หลังจากหรือเท่ากับ :date',
    'alpha' => ':attribute ต้องเป็นตัวอักษรเท่านั้น',
    'alpha_dash' => ':attribute ต้องเป็นตัวอักษร ตัวเลข เครื่องหมายขีดกลาง และขีดล่างเท่านั้น',
    'alpha_num' => ':attribute ต้องเป็นตัวอักษรและตัวเลขเท่านั้น',
    'array' => ':attribute ต้องเป็นอาร์เรย์',
    'ascii' => ':attribute ต้องมีเฉพาะอักขระและสัญลักษณ์แบบไบต์เดียวเท่านั้น',
    'before' => ':attribute ต้องเป็นวันที่ก่อน :date',
    'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date',
    'between' => [
        'array' => ':attribute ต้องมีระหว่าง :min ถึง :max รายการ',
        'file' => ':attribute ต้องมีขนาดระหว่าง :min ถึง :max กิโลไบต์',
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min ถึง :max',
        'string' => ':attribute ต้องมีความยาวระหว่าง :min ถึง :max ตัวอักษร',
    ],
    'boolean' => ':attribute ต้องเป็นจริงหรือเท็จ',
    'can' => ':attribute มีค่าที่ไม่ได้รับอนุญาต',
    'confirmed' => 'การยืนยัน :attribute ไม่ตรงกัน',
    'contains' => ':attribute ขาดค่าที่จำเป็น',
    'current_password' => 'รหัสผ่านไม่ถูกต้อง',
    'date' => ':attribute ไม่ใช่วันที่ที่ถูกต้อง',
    'date_equals' => ':attribute ต้องเป็นวันที่เท่ากับ :date',
    'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format',
    'decimal' => ':attribute ต้องมี :decimal ตำแหน่งทศนิยม',
    'declined' => ':attribute ต้องถูกปฏิเสธ',
    'declined_if' => ':attribute ต้องถูกปฏิเสธเมื่อ :other เป็น :value',
    'different' => ':attribute และ :other ต้องแตกต่างกัน',
    'digits' => ':attribute ต้องเป็นตัวเลข :digits หลัก',
    'digits_between' => ':attribute ต้องอยู่ระหว่าง :min ถึง :max หลัก',
    'dimensions' => ':attribute มีขนาดรูปภาพไม่ถูกต้อง',
    'distinct' => ':attribute มีค่าซ้ำกัน',
    'doesnt_end_with' => ':attribute ต้องไม่ลงท้ายด้วย: :values',
    'doesnt_start_with' => ':attribute ต้องไม่เริ่มต้นด้วย: :values',
    'email' => ':attribute ต้องเป็นอีเมลที่ถูกต้อง',
    'ends_with' => ':attribute ต้องลงท้ายด้วย: :values',
    'enum' => ':attribute ที่เลือกไม่ถูกต้อง',
    'exists' => ':attribute ที่เลือกไม่ถูกต้อง',
    'extensions' => ':attribute ต้องมีนามสกุล: :values',
    'file' => ':attribute ต้องเป็นไฟล์',
    'filled' => ':attribute ต้องมีค่า',
    'gt' => [
        'array' => ':attribute ต้องมีมากกว่า :value รายการ',
        'file' => ':attribute ต้องมีขนาดมากกว่า :value กิโลไบต์',
        'numeric' => ':attribute ต้องมากกว่า :value',
        'string' => ':attribute ต้องมีความยาวมากกว่า :value ตัวอักษร',
    ],
    'gte' => [
        'array' => ':attribute ต้องมี :value รายการหรือมากกว่า',
        'file' => ':attribute ต้องมีขนาดมากกว่าหรือเท่ากับ :value กิโลไบต์',
        'numeric' => ':attribute ต้องมากกว่าหรือเท่ากับ :value',
        'string' => ':attribute ต้องมีความยาวมากกว่าหรือเท่ากับ :value ตัวอักษร',
    ],
    'hex_color' => ':attribute ต้องเป็นสีเลขฐานสิบหกที่ถูกต้อง',
    'image' => ':attribute ต้องเป็นรูปภาพ',
    'in' => ':attribute ที่เลือกไม่ถูกต้อง',
    'in_array' => ':attribute ไม่มีอยู่ใน :other',
    'integer' => ':attribute ต้องเป็นจำนวนเต็ม',
    'ip' => ':attribute ต้องเป็น IP address ที่ถูกต้อง',
    'ipv4' => ':attribute ต้องเป็น IPv4 address ที่ถูกต้อง',
    'ipv6' => ':attribute ต้องเป็น IPv6 address ที่ถูกต้อง',
    'json' => ':attribute ต้องเป็น JSON string ที่ถูกต้อง',
    'list' => ':attribute ต้องเป็นรายการ',
    'lowercase' => ':attribute ต้องเป็นตัวพิมพ์เล็ก',
    'lt' => [
        'array' => ':attribute ต้องมีน้อยกว่า :value รายการ',
        'file' => ':attribute ต้องมีขนาดน้อยกว่า :value กิโลไบต์',
        'numeric' => ':attribute ต้องน้อยกว่า :value',
        'string' => ':attribute ต้องมีความยาวน้อยกว่า :value ตัวอักษร',
    ],
    'lte' => [
        'array' => ':attribute ต้องไม่มีมากกว่า :value รายการ',
        'file' => ':attribute ต้องมีขนาดน้อยกว่าหรือเท่ากับ :value กิโลไบต์',
        'numeric' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value',
        'string' => ':attribute ต้องมีความยาวน้อยกว่าหรือเท่ากับ :value ตัวอักษร',
    ],
    'mac_address' => ':attribute ต้องเป็น MAC address ที่ถูกต้อง',
    'max' => [
        'array' => ':attribute ต้องไม่มีมากกว่า :max รายการ',
        'file' => ':attribute ต้องไม่เกิน :max กิโลไบต์',
        'numeric' => ':attribute ต้องไม่เกิน :max',
        'string' => ':attribute ต้องไม่เกิน :max ตัวอักษร',
    ],
    'max_digits' => ':attribute ต้องไม่เกิน :max หลัก',
    'mimes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'mimetypes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'min' => [
        'array' => ':attribute ต้องมีอย่างน้อย :min รายการ',
        'file' => ':attribute ต้องมีขนาดอย่างน้อย :min กิโลไบต์',
        'numeric' => ':attribute ต้องมีค่าอย่างน้อย :min',
        'string' => ':attribute ต้องมีความยาวอย่างน้อย :min ตัวอักษร',
    ],
    'min_digits' => ':attribute ต้องมีอย่างน้อย :min หลัก',
    'missing' => ':attribute ต้องไม่มี',
    'missing_if' => ':attribute ต้องไม่มีเมื่อ :other เป็น :value',
    'missing_unless' => ':attribute ต้องไม่มีเว้นแต่ :other เป็น :value',
    'missing_with' => ':attribute ต้องไม่มีเมื่อมี :values',
    'missing_with_all' => ':attribute ต้องไม่มีเมื่อมี :values ทั้งหมด',
    'multiple_of' => ':attribute ต้องเป็นจำนวนคูณของ :value',
    'not_in' => ':attribute ที่เลือกไม่ถูกต้อง',
    'not_regex' => 'รูปแบบ :attribute ไม่ถูกต้อง',
    'numeric' => ':attribute ต้องเป็นตัวเลข',
    'password' => [
        'letters' => 'รหัสผ่านต้องมีตัวอักษรอย่างน้อยหนึ่งตัว',
        'mixed' => 'รหัสผ่านต้องมีทั้งตัวพิมพ์ใหญ่และตัวพิมพ์เล็กอย่างน้อยหนึ่งตัว',
        'numbers' => 'รหัสผ่านต้องมีตัวเลขอย่างน้อยหนึ่งตัว',
        'symbols' => 'รหัสผ่านต้องมีสัญลักษณ์พิเศษอย่างน้อยหนึ่งตัว',
        'uncompromised' => 'รหัสผ่านนี้ปรากฏในข้อมูลที่รั่วไหล กรุณาเลือกรหัสผ่านอื่น',
    ],
    'present' => ':attribute ต้องมีอยู่',
    'present_if' => ':attribute ต้องมีอยู่เมื่อ :other เป็น :value',
    'present_unless' => ':attribute ต้องมีอยู่เว้นแต่ :other เป็น :value',
    'present_with' => ':attribute ต้องมีอยู่เมื่อมี :values',
    'present_with_all' => ':attribute ต้องมีอยู่เมื่อมี :values ทั้งหมด',
    'prohibited' => ':attribute ต้องห้าม',
    'prohibited_if' => ':attribute ต้องห้ามเมื่อ :other เป็น :value',
    'prohibited_unless' => ':attribute ต้องห้ามเว้นแต่ :other อยู่ใน :values',
    'prohibits' => ':attribute ห้าม :other ให้มีอยู่',
    'regex' => 'รูปแบบ :attribute ไม่ถูกต้อง',
    'required' => 'กรุณากรอก :attribute',
    'required_array_keys' => ':attribute ต้องมีรายการสำหรับ: :values',
    'required_if' => 'กรุณากรอก :attribute เมื่อ :other เป็น :value',
    'required_if_accepted' => 'กรุณากรอก :attribute เมื่อ :other ได้รับการยอมรับ',
    'required_if_declined' => 'กรุณากรอก :attribute เมื่อ :other ถูกปฏิเสธ',
    'required_unless' => 'กรุณากรอก :attribute เว้นแต่ :other อยู่ใน :values',
    'required_with' => 'กรุณากรอก :attribute เมื่อมี :values',
    'required_with_all' => 'กรุณากรอก :attribute เมื่อมี :values ทั้งหมด',
    'required_without' => 'กรุณากรอก :attribute เมื่อไม่มี :values',
    'required_without_all' => 'กรุณากรอก :attribute เมื่อไม่มี :values ทั้งหมด',
    'same' => ':attribute และ :other ต้องตรงกัน',
    'size' => [
        'array' => ':attribute ต้องมี :size รายการ',
        'file' => ':attribute ต้องมีขนาด :size กิโลไบต์',
        'numeric' => ':attribute ต้องเป็น :size',
        'string' => ':attribute ต้องมีความยาว :size ตัวอักษร',
    ],
    'starts_with' => ':attribute ต้องเริ่มต้นด้วย: :values',
    'string' => ':attribute ต้องเป็นข้อความ',
    'timezone' => ':attribute ต้องเป็นเขตเวลาที่ถูกต้อง',
    'unique' => ':attribute นี้ถูกใช้งานแล้ว',
    'uploaded' => 'การอัปโหลด :attribute ล้มเหลว',
    'uppercase' => ':attribute ต้องเป็นตัวพิมพ์ใหญ่',
    'url' => ':attribute ต้องเป็น URL ที่ถูกต้อง',
    'ulid' => ':attribute ต้องเป็น ULID ที่ถูกต้อง',
    'uuid' => ':attribute ต้องเป็น UUID ที่ถูกต้อง',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'อีเมล',
        'password' => 'รหัสผ่าน',
        'password_confirmation' => 'การยืนยันรหัสผ่าน',
        'first_name' => 'ชื่อ',
        'last_name' => 'นามสกุล',
        'phone' => 'เบอร์โทรศัพท์',
        'address' => 'ที่อยู่',
        'province' => 'จังหวัด',
        'district' => 'เขต/อำเภอ',
        'postal_code' => 'รหัสไปรษณีย์',
        'bio' => 'แนะนำตัว',
        'id_card_image' => 'รูปบัตรประชาชน',
        'degree_level' => 'ระดับการศึกษา',
        'field_of_study' => 'สาขาวิชา',
        'institution' => 'สถาบันการศึกษา',
        'gpa' => 'GPA',
        'subject_name' => 'ชื่อวิชา',
        'hourly_rate' => 'อัตราค่าสอน',
        'description' => 'รายละเอียด',
        'has_teaching_experience' => 'ประสบการณ์สอน',
        'teaching_experience_years' => 'จำนวนปีประสบการณ์',
        'work_experience' => 'ประสบการณ์ทำงาน',
        'additional_info' => 'ข้อมูลเพิ่มเติม',
        'accept_terms' => 'ข้อกำหนดและเงื่อนไข',
        'accept_privacy' => 'นโยบายความเป็นส่วนตัว',
    ],

];
