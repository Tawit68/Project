<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cid   = $_POST['customer_id'];
    $fname = $_POST['Firstname'];
    $lname = $_POST['Lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {

        $sql = "INSERT INTO customers (customer_id, Firstname, Lastname, email, phone) 
                VALUES (:cid, :fname, :lname, :email, :phone)";
        
        $stmt = $conn->prepare($sql);
        

        $stmt->execute([
            ':cid'   => $cid,
            ':fname' => $fname,
            ':lname' => $lname,
            ':email' => $email,
            ':phone' => $phone
        ]);


        header("Location: address.php?customer_id=" . urlencode($cid));
        exit(); 

    } catch(PDOException $e) {
    
        echo "<script>
                alert('เกิดข้อผิดพลาด: " . addslashes($e->getMessage()) . "');
                window.history.back();
              </script>";
    }
}
?>