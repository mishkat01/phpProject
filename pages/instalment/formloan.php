<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10  container d-flex justify-content-center bg">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="lno" class="form-label mt-3">Appilier Name</label>
      <input type="text" class="form-control mb-1 in" id="lno" name="appname">
    </div>
    <div>
      <label for="lno" class="form-label">Payment</label>
      <input type="text" class="form-control mb-1 in" id="lno" name="downp">
    </div>
    <div>
    <label for="larea" class="form-label">Percentage</label>
    <select class="form-select form-select-sm in mb-1" name="ins_per" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM ins_type"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['ins_id'];?>"><?php echo$row['ins_name'];?></option>
          <?php }?>
      </select>
    </div>

    <div>
    <label for="larea" class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" name="agent" aria-label=".form-select-sm example">
      <option selected>Select Agent</option>
        <?php
        $loc = $_SESSION['loc'];
         $sql = "SELECT * FROM land_agent where user_id=2"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $row['land_agent_id'];?>" <?php if($loc==$row['land_agent_location']){echo "selected";}?>> 
          <?php echo$row['land_agent_name'];?>
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
  $sql ="INSERT INTO instalment (appname,downp,ins_per ,agent,from_pic ) 
  VALUES('$appname','$downp','$ins_per','$agent','$imageName')";
  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>