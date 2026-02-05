<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบค้นหาข้อมูลผู้เสียภาษี</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="search-container">
        <h2>ค้นหาข้อมูลของท่าน</h2>

        <label>เลขบัตรประชาชน 13 หลัก:</label>
        <input type="text" id="id_card" placeholder="กรอกเลขบัตรประชาชน" maxlength="13">

        <label>ระบุเดือนที่ต้องการ:</label>
        <select id="month">
            <option value="all">แสดงทุกเดือน</option>
            <?php 
            $thai_months = [
                1 => 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 
                'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ];
            for ($i = 1; $i <= 12; $i++) echo "<option value='$i-68'>{$thai_months[$i]}/2568</option>"; 
            ?>
        </select>

        <div class="button-group">
            <button type="button" class="btn-search" onclick="doSearch()">ค้นหาข้อมูล</button>
            <button type="button" class="btn-reset" onclick="doReset()">รีเซ็ต</button>
        </div>

        <div id="result_area" class="result-area">
            <p class="no-data">กรุณากรอกเลขบัตรและกดปุ่มค้นหา</p>
        </div>
    </div>

    <!-- Custom Script -->
    <!-- หรือถ้าต้องการใช้ CDN ให้เปิดบรรทัดด้านล่างแทนครับ -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="script/index.js"></script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>