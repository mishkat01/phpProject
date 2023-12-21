<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM instalment WHERE instal_id = $id"; 
    $result = $conn->query($sql);
    header('location:loanview.php');
?>