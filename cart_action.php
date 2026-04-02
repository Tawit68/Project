<?php
session_start();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action == 'add' && !empty($id)) {

    if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = array(); }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
} 

if ($action == 'remove' && !empty($id)) {

    unset($_SESSION['cart'][$id]);
}


header("Location: cart.php");
exit();
?>