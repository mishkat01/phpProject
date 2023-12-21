<?php
include("../../includes/db.php");
   $bname=$_POST['bname'];
   $booking_area=$_POST['booking_area'];
  $barea=$_POST['barea'];
  $bcost=$_POST['bcost'];
  $Customar_con=$_POST['Customar_con'];
  $property_id=$_POST['property_id'];
  $booking=$_POST['booking'];
  $Payment=$_POST['Payment'];

if(!empty($bname)&& !empty($barea)&& !empty($bcost)&& !empty($property_id) && !empty($booking)){
  $sql ="INSERT INTO booking (bkng_name,booking_area,bkng_area,bkng_cost,Customar_con,property_id,bt_id,Payment ) VALUES('$bname','$booking_area','$barea','$bcost','$Customar_con','$property_id','$booking','$Payment')";
  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>