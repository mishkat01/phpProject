<?php
include("../../includes/db.php");

 echo  $id=$_POST['id'];
  echo $pname=$_POST['pname'];
  echo $plocetion=$_POST['ploname'];
  echo $pcost=$_POST['lcost'];
  echo $selling_p=$_POST['selling_p'];
  echo $status=$_POST['status'];
  echo $agent=$_POST['agent'];
  // $image=$_FILES['pic'];

  $sql = "UPDATE property SET property_name='$pname', property_location='$plocetion',selling_p='$selling_p' , property_cost='$pcost' , agent='$agent', ls_id = '$status'  WHERE property_id=$id";
  if ($conn->query($sql) === TRUE) {
   
      }else{
        // echo "User image update failed.";
      }
  
  // if($image['name']!=''){
  //   $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

  //   $updateImg="UPDATE property SET land_img='$imageName' WHERE property_id='$id'";
  //   if($conn->query($updateImg) === TRUE){
  //     move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
  //     // header('Location:landview.php');
  //   }else{
  //     echo "User image update failed.";
  //   }
  // }

?>