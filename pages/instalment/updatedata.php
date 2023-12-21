<?php include('../../includes/conf.php');
  get_header();
  get_side();

    $userid = $_GET['id'];
    $sql = "SELECT * FROM instalment where instal_id = $userid"; // land id check or change
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-10  container d-flex justify-content-center bg">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="lno" class="form-label mt-3">Appilier Name</label>
      <input type="text" class="form-control mb-1 in" id="lno" name="appname" value=<?=$row['appname']?>>
      <input type="hidden" class="form-control mb-1 in" id="lno" name="id" value=<?=$row['instal_id']?>>
    </div>
    <div>
      <label for="lno" class="form-label">Down Payment</label>
      <input type="text" class="form-control mb-1 in" id="lno" name="downp" value=<?=$row['downp']?>>
    </div>
    <div>
    <label for="larea" class="form-label">Percentage</label>
    <select class="form-select form-select-sm in mb-1" name="ins_per" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM ins_type"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['ins_id'];?>" <?php if($rows['ins_id']==$row['ins_per']){echo "selected";}?>><?php echo$rows['ins_name'];?></option>
          <?php }?>
      </select>
    </div>

    <div>
    <label for="larea" class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" name="agent" aria-label=".form-select-sm example">
      <option selected>Select Agent</option>
        <?php
         $sql = "SELECT * FROM land_agent"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['land_agent_id'];?>" <?php if($rows['land_agent_id']==$row['agent']){echo "selected";}?>> 
          <?php echo$rows['land_agent_name'];?>
        </option>
          <?php }?>
      </select>
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Appilication Form</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div>
    <button type="submit" class="btn btn-secondary " name="sub">Submit</button>
    <a  type="button"  href="landview.php" class="btn btn-secondary float-end">View All land</a>
  </form>
 </div>
 </div>
</div>
 
<?php
if(isset($_POST['sub'])){
  $id=$_POST['id'];
  $appname=$_POST['appname'];
  $downp=$_POST['downp'];
  $ins_per=$_POST['ins_per'];
  $agent=$_POST['agent'];
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }
if(!empty($appname)&& !empty($downp)&& !empty($ins_per)&& !empty($agent) && !empty($image)){

  $sql = "UPDATE instalment SET appname='$appname', downp='$downp' , ins_per='$ins_per' , agent= '$agent',
  from_pic = '$imageName'  WHERE instal_id=$id";

  // $sql ="INSERT INTO instalment (appname,downp,ins_per ,agent,from_pic ) 
  // VALUES('$appname','$downp','$ins_per','$agent','$imageName')";


  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
    header("location:loanview.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>

