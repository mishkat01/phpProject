<?php
include("../../includes/db.php");
$id=$_POST['lid'];
$lname=trim($_POST['lname']);
$larea=$_POST['larea'];
$lcost=$_POST['lcost'];
$lme=$_POST['lme'];
$status=$_POST['status'];
$agent=$_POST['agent'];
//  echo $image=$_FILES['pic'];

  $sql = "UPDATE land SET land_name='$lname', land_area='$larea' , land_cost='$lcost' , land_agent_id= '$agent',
  ls_id = '$status', lme = '$lme'  WHERE land_id= $id";
  if ($conn->query($sql) === TRUE) {
        echo "ok";
      }else{
        echo "User image update failed.";
      }
  
  // if($image['name']!=''){
  //   $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

  //   $updateImg="UPDATE land SET land_img='$imageName' WHERE land_id='$id'";
  //   if($conn->query($updateImg) === TRUE){
  //     move_uploaded_file($image['tmp_name'],'../../dist/images/agent/'.$imageName);
  //     // header('Location:landview.php');
  //   }else{
  //     echo "User image update failed.";
  //   }
  // }

?>