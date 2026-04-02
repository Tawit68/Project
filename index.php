<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
</head>
<body>
    <h2>แบบฟอร์มเพิ่มข้อมูลลูกค้า</h2>
    <form action="insert.php" method="post">
        ID ลูกค้า: <input type="text" name="customer_id" maxlength="10" required><br><br>
        ชื่อ: <input type="text" name="Firstname" required><br><br>
        นามสกุล: <input type="text" name="Lastname" required><br><br>
        อีเมล: <input type="email" name="email" required><br><br>
        โทรศัพท์: <input type="text" name="phone" maxlength="20"><br><br>
        <button type="submit">บันทึกข้อมูล</button>
    </form>
</body>
</html>