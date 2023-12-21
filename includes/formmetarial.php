<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10  container d-flex justify-content-center  ">
 <div class="col-md-3"></div>
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="metaril" class="form-label mt-3">Metarials Name</label>
      <input type="text" class="form-control mb-1 in" id="metaril" name="mname">
    </div>
    <div>
      <label for="mlist" class="form-label">Metarial Listing</label>
      <input type="text" class="form-control mb-1 in" id="mlist" name="mliname">
    </div>
    <div>
      <label for="mprice" class="form-label">Metarial Pricing</label>
      <input type="text" class="form-control mb-1 in" id="mprice" name="mpname">
    </div>
    <div>
    <label for="larea" class="form-label">Status</label>
      <select class="form-select form-select-sm in mb-1" name="status" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM land_status"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['ls_id'];?>"><?php echo$row['is_name'];?></option>
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
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $row['land_agent_id'];?>"> 
          <?php echo$row['land_agent_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div>
    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
  </form>
 </div>
 </div>
 <div class="col-md-3"></div>
</div>

<?php
if(isset($_POST['sub'])){
  $mname=$_POST['mname'];
  $mlisting=$_POST['mliname'];
  $mprice=$_POST['mpname'];
  $status=$_POST['status'];
  $agent=$_POST['agent'];
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }
if(!empty($mname)&& !empty($mlisting)&& !empty($mprice)&& !empty($status) && !empty($agent)){
  $sql ="INSERT INTO metarial (metarial_name,metarial_listing,metarial_price,ls_id,land_agent_id,land_img ) VALUES('$mname',' $mlisting','$mprice','$status','$agent','$imageName')";
  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>