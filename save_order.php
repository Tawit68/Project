<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['customer_id'])) {
    $cid = $_POST['customer_id'];
    $aid = $_POST['address_id'];
    $oid = "ORD" . date("His"); 

    try {

        $check = $conn->prepare("SELECT customer_id FROM customers WHERE customer_id = ?");
        $check->execute([$cid]);
        
        if ($check->rowCount() > 0) {

            $sql = "INSERT INTO orders (order_id, customer_id, address_id) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$oid, $cid, $aid]);

            unset($_SESSION['cart']);

            echo "<script>alert('สั่งซื้อสำเร็จ $oid'); window.location='order.php';</script>";
        } else {

            echo "<h3>ไม่สามารถบันทึกได้ </h3>";
            echo "<a href='index.php'>กลับไปลงทะเบียนลูกค้าก่อน</a>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ไม่พบข้อมูลการสั่งซื้อ";
}
?>