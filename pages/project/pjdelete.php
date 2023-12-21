<?php
include('../../includes/db.php');
    $id=$_GET['id'];
    $sql = "DELETE FROM project WHERE project_id = $id"; 
    $result = $conn->query($sql);
    header('location:pjview.php');
?>