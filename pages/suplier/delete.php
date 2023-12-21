<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM suplier WHERE  sup_id= $id"; 
    $result = $conn->query($sql);
    header('Location: viewformsuplier.php');
?>