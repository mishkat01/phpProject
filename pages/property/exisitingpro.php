<?php
include("../../includes/db.php");
  echo $pname=$_POST['pname'];
  echo $plocetion=$_POST['ploname'];
  echo $pcost=$_POST['pconame'];
  echo $selling_p=$_POST['selling_p'];
  echo $agent=$_POST['agent'];
  echo $status=$_POST['status'];
  // $image=$_FILES['pic'];
  // $imageName='';
  // if($image['name']!=''){
  //   $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  // }
if(!empty($pname)&& !empty($plocetion)&& !empty($pcost)){
  $sql ="INSERT INTO property (property_name,property_location,property_cost,ls_id,selling_p,agent ) VALUES('$pname',' $plocetion','$pcost','$status','$selling_p','$agent')";
  if ($conn->query($sql) === TRUE) {
      echo "hi";
  } else {
  }
}
?>