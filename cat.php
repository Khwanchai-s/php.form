<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลจาก Text File</title>
</head>
<body>
    <?php
    // ชื่อไฟล์ที่ต้องการอ่าน
    $filename = 'แมวยอดนิยม.txt';

    // ตรวจสอบว่าไฟล์มีอยู่หรือไม่
    if (file_exists($filename)) {
        // อ่านเนื้อหาในไฟล์
        $content = file_get_contents($filename);

        // แสดงชื่อไฟล์เป็นหัวข้อ
        echo "<h1>" . htmlspecialchars($filename) . "</h1>";

        // แสดงเนื้อหาไฟล์เป็นข้อความใน <p>
        echo "<p>" . nl2br(htmlspecialchars($content)) . "</p>";
    } else {
        // กรณีที่ไฟล์ไม่พบ
        echo "<h1>ไม่พบไฟล์: " . htmlspecialchars($filename) . "</h1>";
        echo "<p>กรุณาตรวจสอบชื่อไฟล์หรือที่อยู่ของไฟล์</p>";
    }
    ?>
</body>
</html>
