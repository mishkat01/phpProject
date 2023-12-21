<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM p_contactor WHERE land_agent_id = $id"; 
    $result = $conn->query($sql);
    header('location:dev.php');
?>