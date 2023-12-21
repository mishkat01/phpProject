<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 container d-flex justify-content-center bg">
  <div class="col-md-4">
  <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
    <div class="p-3">
    <div >
      <label for="land" class="form-label mt-3">Developer Name</label>
      <input type="text" class="form-control mb-1 in" id="land" name="aname">
    </div>
    <div>
    <label for="larea" class="form-label">Developer Area</label>
      <select class="form-select form-select-sm in mb-1" name="aarea" aria-label=".form-select-sm example">
      <option selected>Select Developer Area</option>
        <?php
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>"> 
          <?php echo$rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div >
      <label for="larea" class="form-label">Developer Contact</label>
      <input type="text" class="form-control mb-1 in" id="larea" name="acontact">
    </div>
  
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Developer Photo</label>
      <input class="form-control" type="file" id="formFile" name="pic">
  </div>
    <button type="submit" class="btn btn-secondary" name="sub">Submit</button>
    <a  type="button"  href="agent.php" class="btn btn-secondary float-end">View All Agents</a>
  </form>
</div>
</div>
</div>
<?php
if(isset($_POST['sub'])){
  $aname=$_POST['aname'];
  $aarea=$_POST['aarea'];
  $acontact=$_POST['acontact'];
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }

if(!empty($aname)&& !empty($aarea)&& !empty($acontact)){
  $sql ="INSERT INTO p_contactor (land_agent_name,land_agent_location,land_agent_contact,agent_img) 
  VALUES('$aname','$aarea','$acontact','$imageName')";
  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/agent/'.$imageName);
    header("location:dev.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}




?>