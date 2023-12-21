<?php
include("../../includes/db.php");
    echo $lname=$_POST['lname'];
    echo $larea=$_POST['larea'];
    echo $lcost=$_POST['lcost'];
    echo $lme=$_POST['lme'];
    echo $status=$_POST['status'];
    echo $agent=$_POST['agent'];
if(!empty($lname)&& !empty($larea)&& !empty($lcost)&& !empty($status) && !empty($agent)){
   $sql ="INSERT INTO land (land_name,land_area,land_cost,ls_id,land_agent_id,lme ) VALUES('$lname','$larea','$lcost','$status','$agent','$lme')";
  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>