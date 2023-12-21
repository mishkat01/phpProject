<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM metarial WHERE metarial_id = $id"; 
    $result = $conn->query($sql);
    header('location:mview.php');
?>