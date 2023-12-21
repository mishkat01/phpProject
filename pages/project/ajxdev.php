<?php
include("../../includes/db.php");
if(isset($_POST["areaid"])){
    $id=$_POST['areaid'];
    $sql = "SELECT * FROM p_contactor where land_agent_location = $id"; 
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
   
<option value=<?=$row['land_agent_id']?>> <?=$row['land_agent_name']?> </option>;

    <?php } }?>

