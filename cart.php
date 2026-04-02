<?php 
session_start();
include 'connect.php';


$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : '';
$address_id = isset($_SESSION['address_id']) ? $_SESSION['address_id'] : '';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ตะกร้าสินค้า</title>
</head>
<body>

    <h2>รายการอาหารที่เลือกไว้</h2>
    <p>

    </p>

    <?php if (!empty($_SESSION['cart'])) { ?>
        <table border="1" cellspacing="0" cellpadding="10" width="80%">
            <tr bgcolor="#dddddd">
                <th>ชื่อเมนูอาหาร</th>
                <th>ราคา )</th>
                <th>จำนวน</th>
                <th>จัดการ</th>
            </tr>
            <?php
            foreach ($_SESSION['cart'] as $id => $qty) {
                // ดึงข้อมูลจากตาราง menus มาแสดง
                $stmt = $conn->prepare("SELECT * FROM menus WHERE menu_id = ?");
                $stmt->execute([$id]);
                $item = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($item) {
            ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td align="center"><?php echo number_format($item['price'], 2); ?></td>
                <td align="center"><?php echo $qty; ?></td>
                <td align="center">
                    <a href="cart_action.php?action=remove&id=<?php echo $id; ?>" 
                       onclick="return confirm('ยืนยันการลบ')">
                       [ ลบ ]
                    </a>
                </td>
            </tr>
            <?php } } ?>
        </table>

        <br>
        <form action="save_order.php" method="POST">
            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
            <input type="hidden" name="address_id" value="<?php echo $address_id; ?>">
            
            <button type="submit" style="padding: 10px 20px; cursor: pointer;">
                ยืนยันการสั่งซื้อ
            </button>
        </form>

    <?php } else { ?>
        <p>ไม่มีสินค้าในตะกร้า <a href="order.php">กลับไปเลือกเมนู</a></p>
    <?php } ?>

    <p><a href="order.php">กลับหน้าเลือกเมนูอาหาร</a></p>

</body>
</html>