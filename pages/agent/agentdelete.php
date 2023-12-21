<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM land_agent WHERE land_agent_id = $id"; 
    $result = $conn->query($sql);
    header('location:agent.php');
?>