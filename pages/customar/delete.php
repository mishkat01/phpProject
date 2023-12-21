<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM customer WHERE customer_id = $id"; 
    $result = $conn->query($sql);
    header('location:view_all_costomar.php');
?>