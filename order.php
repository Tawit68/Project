<?php 
session_start(); 
include 'connect.php'; 

$cart_count = 0;
if (isset($_SESSION['cart'])) {
    $cart_count = array_sum($_SESSION['cart']); 
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการเมนูอาหาร</title>
</head>
<body>

    <table width="100%" border="0">
        <tr>
            <td><h1>ร้านขนม software 68</h1></td>
            <td align="right">
                <a href="cart.php" style="font-size: 1.2em;">
                     ตะกร้าของฉัน (<?php echo $cart_count; ?>)
                </a>
            </td>
        </tr>
    </table>

    <hr>
    <h2 align="center">รายการเมนูขนมจีน</h2>

    <table border="1" cellspacing="0" cellpadding="10" align="center" width="80%">
        <tr bgcolor="#eeeeee">
            <th>รูปภาพ</th>
            <th>ชื่อเมนู</th>
            <th>ราคา (บาท)</th>
            <th>ดำเนินการ</th>
        </tr>

        <?php
        try {
            $stmt = $conn->query("SELECT * FROM menus");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td align="center">
                    <img src="images/<?php echo $row['photo']; ?>.jpg" width="100">
                </td>
                <td><?php echo $row['name']; ?></td>
                <td align="center"><?php echo number_format($row['price'], 2); ?></td>
                <td align="center">
                    <a href="cart_action.php?action=add&id=<?php echo $row['menu_id']; ?>">
                        [ กดสั่งซื้อ ]
                    </a>
                </td>
            </tr>
        <?php 
            }
        } catch(PDOException $e) {
            echo "<tr><td colspan='4'>Error: " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>

</body>
</html>