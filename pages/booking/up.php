<?php

if(isset($_POST['sub'])){
  $id=$_POST['land_id'];
  $lname=$_POST['lname'];
  $larea=$_POST['larea'];
  $lcost=$_POST['lcost'];
  $status=$_POST['status'];
  $agent=$_POST['agent'];
  $image=$_FILES['pic'];
  
  echo $id;
  $sql = "UPDATE land SET land_name='$lname', land_area='$larea' , land_cost='$lcost' , land_agent_id= '$agent',
  ls_id = '$status'  WHERE land_id=$id";
  if ($conn->query($sql) === TRUE) {
        header('Location: landview.php');
      }else{
        echo "User image update failed.";
      }
  
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

    $updateImg="UPDATE land SET land_img='$imageName' WHERE land_id='$id'";
    if($conn->query($updateImg) === TRUE){
      move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
      // header('Location:landview.php');
    }else{
      echo "User image update failed.";
    }
  }
} else {

} 
?>
