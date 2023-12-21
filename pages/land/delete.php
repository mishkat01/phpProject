<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM land WHERE land_id = $id"; 
    $result = $conn->query($sql);
    header('location:ajxview.php');
?>