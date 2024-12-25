<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
</head>
<body>
    <h2>กรอกข้อมูลนักเรียน</h2>
    <form method="POST" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"">
        <label for="firstname">ชื่อ นามสกุล:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="nickname">ชื่อเล่น:</label>
        <input type="text" id="nickname" name="nickname" required><br><br>
        
        <button type="submit">ส่งข้อมูล</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // รับข้อมูลจากฟอร์ม
        $firstname = htmlspecialchars($_POST['firstname']);
        $nickname = htmlspecialchars($_POST['nickname']);
        
        // สร้างข้อความเพื่อบันทึกในไฟล์
        $data = "$firstname $nickname\n";

        // เขียนข้อมูลลงในไฟล์ student.txt
        $file = 'student.txt';
        if (file_put_contents($file, $data, FILE_APPEND)) {
            echo "<p style='color: green;'>บันทึกข้อมูลเรียบร้อยแล้ว</p>";
        } else {
            echo "<p style='color: red;'>เกิดข้อผิดพลาดในการบันทึกข้อมูล</p>";
        }
    }
    echo "<h1>ข้อมูลนักศึกษา</h1>";
    
        $myfile = fopen("student.txt", "r") or die("Unable to open file!");
        // วนรอบด้วย While จนกว่าจะหมด หากหมดไฟล์แล้ว feof จะมีค่าเป็น true
        while(!feof($myfile)) {
        echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
    ?>
</body>
</html>
