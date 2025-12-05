@extends('Tutor_layout')

@section('title', 'คำประกาศเกี่ยวกับความเป็นส่วนตัว | EngBuddy')

@section('content')
<style>
  .privacy-page { padding: 40px 20px; background: #f5f7fa; min-height: 100vh; }
  .privacy-container { max-width: 900px; margin: 0 auto; background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); }
  .privacy-title { text-align: center; margin-bottom: 30px; }
  .privacy-title h1 { font-size: 30px; color: #1e3a5f; margin-bottom: 10px; font-weight: 700; }
  .privacy-content { line-height: 1.85; color: #333; font-size: 16.5px; }
  .privacy-content h2 { font-size: 22px; color: #1e3a5f; margin-top: 32px; margin-bottom: 15px; font-weight: 700; }
  .privacy-content h3 { font-size: 18px; color: #34495e; margin-top: 20px; margin-bottom: 10px; }
  .privacy-content p { margin-bottom: 15px; }
  .privacy-content ul, .privacy-content ol { margin-left: 30px; margin-bottom: 15px; }
  .privacy-content li { margin-bottom: 8px; }
  .privacy-content table { width: 100%; border-collapse: collapse; margin: 20px 0; }
  .privacy-content table td { border: 1px solid #ddd; padding: 12px; vertical-align: top; }
  .privacy-content table td:first-child { font-weight: 500; background: #f8f9fa; width: 40%; }
</style>

<div class="privacy-page">
  <div class="privacy-container">
    <div class="privacy-title">
      <h1>คำประกาศเกี่ยวกับความเป็นส่วนตัว (Privacy Notice)</h1>
    </div>

    <div class="privacy-content">

      <p>
        คำประกาศเกี่ยวกับความเป็นส่วนตัว (“ประกาศ”) ฉบับนี้จัดทำขึ้นโดย
        <strong>EngBuddy – English Tutor Platform Thailand</strong>
        เพื่อให้ท่านเข้าใจถึงรูปแบบการเก็บรวบรวม ใช้เปิดเผย และปกป้องข้อมูลส่วนบุคคลของผู้ใช้บริการทุกประเภท
        ไม่ว่าจะเป็น <strong>ติวเตอร์ ผู้เรียน หรือผู้ปกครอง</strong> ตามที่กำหนดไว้ในพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 (PDPA)
      </p>

      <p>
        การเข้าใช้งานเว็บไซต์หรือแพลตฟอร์มของเรา ถือว่าท่านได้อ่านและยอมรับประกาศนี้แล้ว
      </p>

      <h2>1. ฐานกฎหมายในการประมวลผลข้อมูลส่วนบุคคล</h2>

      <p>EngBuddy ประมวลผลข้อมูลส่วนบุคคลบนพื้นฐานดังนี้</p>

      <ul>
        <li><strong>การปฏิบัติตามสัญญา</strong> – สำหรับการให้บริการ จัดหาติวเตอร์ การจองคลาส และการชำระเงิน</li>
        <li><strong>ความยินยอม</strong> – กรณีข้อมูลอ่อนไหว เช่น เพศ อายุ ระดับการศึกษา ที่จำเป็นต่อการจับคู่ติวเตอร์ให้เหมาะสม</li>
        <li><strong>ประโยชน์โดยชอบธรรม</strong> – เช่น การพัฒนาระบบ การวิเคราะห์การใช้งาน การรักษาความปลอดภัย</li>
        <li><strong>หน้าที่ตามกฎหมาย</strong> – เช่น การบันทึกธุรกรรมหรือข้อมูลที่จำเป็นสำหรับการตรวจสอบ</li>
      </ul>

      <h2>2. วัตถุประสงค์การเก็บรวบรวมข้อมูลส่วนบุคคล</h2>
      <p>ข้อมูลส่วนบุคคลของท่านใช้เพื่อวัตถุประสงค์ต่อไปนี้:</p>

      <ol>
        <li>การยืนยันตัวตนก่อนเข้าใช้งานระบบ</li>
        <li>การสร้างบัญชีผู้เรียนและติวเตอร์</li>
        <li>การจับคู่ติวเตอร์ที่เหมาะสมตามเพศ อายุ ระดับภาษา และความต้องการของผู้เรียน</li>
        <li>การติดต่อสื่อสารระหว่างผู้เรียน–ติวเตอร์–ทีมงาน</li>
        <li>การตรวจสอบ ป้องกัน และติดตามการกระทำผิดกฎหมายหรือพฤติกรรมอันไม่เหมาะสม</li>
        <li>การปรับปรุงคุณภาพบริการและประสบการณ์ใช้งาน</li>
        <li>การจัดเก็บประวัติการเรียนและการทำธุรกรรมบนแพลตฟอร์ม</li>
      </ol>

      <h2>3. ข้อมูลส่วนบุคคลที่เราเก็บรวบรวม</h2>

      <h3>3.1 แหล่งข้อมูลที่ได้รับ</h3>

      <table>
        <tr>
          <td><strong>แหล่งข้อมูล</strong></td>
          <td><strong>รายการข้อมูลส่วนบุคคล</strong></td>
        </tr>
        <tr>
          <td>1. ลงทะเบียนผ่านเว็บไซต์ EngBuddy</td>
          <td>ชื่อ นามสกุล ชื่อเล่น เบอร์โทร อีเมล รูปโปรไฟล์ เพศ อายุ ที่อยู่ Line ID</td>
        </tr>
        <tr>
          <td>2. เอกสารยืนยันตัวตนจากติวเตอร์</td>
          <td>สำเนาบัตรประชาชน วุฒิการศึกษา ประวัติการเรียนหรือการทำงาน</td>
        </tr>
        <tr>
          <td>3. ข้อมูลพฤติกรรมการใช้งาน</td>
          <td>IP Address, Cookie Data, Device ID, Browser Log, แอคชันบนระบบ</td>
        </tr>
      </table>

      <h3>3.2 จุดประสงค์การใช้ข้อมูล</h3>

      <table>
        <tr>
          <td><strong>วัตถุประสงค์</strong></td>
          <td><strong>ข้อมูลส่วนบุคคลที่ใช้</strong></td>
        </tr>
        <tr>
          <td>1. การสร้างและยืนยันบัญชีผู้ใช้</td>
          <td>ชื่อ เบอร์โทร อีเมล ที่อยู่ Line ID</td>
        </tr>
        <tr>
          <td>2. การจับคู่ติวเตอร์–ผู้เรียน</td>
          <td>เพศ อายุ ระดับภาษา รูปภาพ ความต้องการเรียน</td>
        </tr>
        <tr>
          <td>3. ความปลอดภัยและการตรวจสอบ</td>
          <td>IP Address, Device Logs, เอกสารยืนยันตัวตน</td>
        </tr>
        <tr>
          <td>4. การติดต่อสื่อสารและการสนับสนุนลูกค้า</td>
          <td>ชื่อ เบอร์โทร Line ID</td>
        </tr>
      </table>

      <p><strong>หมายเหตุ:</strong> ข้อมูลเพศ/อายุที่ถือว่าอ่อนไหวจะถูกใช้เฉพาะกรณีจำเป็น เช่น การจับคู่ติวเตอร์เพศเดียวเพื่อความปลอดภัยของผู้เรียนเด็ก</p>

      <h2>4. การเปิดเผยข้อมูลต่อบุคคลที่สาม</h2>

      <p>EngBuddy จะเปิดเผยข้อมูลเฉพาะกรณีที่จำเป็นและเหมาะสมเท่านั้น เช่น:</p>

      <ul>
        <li>ให้ติวเตอร์เพื่อการติดต่อและนัดหมายสอน</li>
        <li>ให้ผู้เรียนหรือผู้ปกครองเพื่อประเมินความเหมาะสมของโปรไฟล์ติวเตอร์</li>
        <li>ผู้ให้บริการระบบชำระเงิน (Payment Gateway)</li>
        <li>ผู้ให้บริการระบบโฮสติ้งหรือระบบคลาวด์</li>
        <li>หน่วยงานรัฐในกรณีมีข้อกำหนดตามกฎหมาย</li>
      </ul>

      <h2>5. สิทธิของเจ้าของข้อมูลตาม PDPA</h2>

      <p>ท่านมีสิทธิ์ดังต่อไปนี้:</p>

      <ul>
        <li>สิทธิขอเข้าถึงและขอสำเนาข้อมูล</li>
        <li>สิทธิขอแก้ไขข้อมูลให้ถูกต้อง</li>
        <li>สิทธิย้ายข้อมูล (Data Portability)</li>
        <li>สิทธิคัดค้านการประมวลผล</li>
        <li>สิทธิขอระงับหรือจำกัดการประมวลผล</li>
        <li>สิทธิถอนความยินยอม</li>
        <li>สิทธิขอลบข้อมูลเมื่อไม่มีความจำเป็นต้องใช้</li>
      </ul>

      <h2>6. การรักษาความมั่นคงปลอดภัย</h2>

      <p>
        EngBuddy ดำเนินงานด้วยมาตรการรักษาความปลอดภัยทั้งด้านเทคนิคและการบริหารจัดการ เช่น การเข้ารหัสข้อมูล การจำกัดสิทธิ์เข้าถึง และการบันทึกการใช้งาน เพื่อป้องกันการสูญหาย การเข้าถึงโดยไม่ได้รับอนุญาต รวมถึงการใช้งานผิดวัตถุประสงค์
      </p>

      <h2>7. ช่องทางการติดต่อ EngBuddy</h2>
      <p>หากท่านต้องการใช้สิทธิ์ภายใต้ PDPA หรือต้องการสอบถามข้อมูลเพิ่มเติม สามารถติดต่อได้ที่:</p>

      <p>
        <strong>EngBuddy – English Tutor Platform Thailand</strong><br>
        <strong>โทร:</strong> 085-318-7722<br>
        <strong>อีเมล:</strong> support@engbuddy.com<br>
        <strong>TikTok:</strong> @engbuddy<br>
        <strong>Website:</strong> https://engbuddy.com
      </p>

    </div>
  </div>
</div>

@endsection
