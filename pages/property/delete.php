<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM property WHERE property_id = $id"; 
    $result = $conn->query($sql);
    header('Location: propertyview.php');
?>