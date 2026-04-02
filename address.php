<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ส่วนที่ 2: ข้อมูลที่อยู่</title>
</head>
<body>
    <?php 

        $customer_id = $_GET['customer_id']; 
    ?>
    <h2>ขั้นตอนที่ 2: กรอกที่อยู่สำหรับลูกค้า ID: <?php echo $customer_id; ?></h2>
    
    <form action="insertaddress.php" method="post">
        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
        
        ID ที่อยู่: <input type="text" name="address_id" ><br><br>
        ตำบล/อำเภอ: <input type="text" name="district" ><br><br>
        จังหวัด: <input type="text" name="province" ><br><br>
        ซอย: <input type="text" name="alleyl"><br><br>
        บ้านเลขที่: <input type="text" name="house_number"><br><br>
        <button type="submit">บันทึกข้อมูลทั้งหมด</button>
    </form>
</body>
</html>