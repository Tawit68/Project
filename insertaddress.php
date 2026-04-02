<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address_id = $_POST['address_id'];
    $customer_id = $_POST['customer_id'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $alleyl = $_POST['alleyl']; 
    $house_number = $_POST['house_number'];

    try {
        $sql = "INSERT INTO addresses (address_id, customer_id, district, province, alleyl, house_number) 
                VALUES ('$address_id', '$customer_id', '$district', '$province', '$alleyl', '$house_number')";
        
        $conn->exec($sql);

        echo "<script>
                alert('บันทึกที่อยู่เรียบร้อย! เชิญเลือกเมนูอาหารได้เลยครับ');
                window.location='order.php'; 
              </script>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>