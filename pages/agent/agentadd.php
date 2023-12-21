<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 container d-flex justify-content-center bg">
  <div class="col-md-4">
  <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
    <div class="p-3">
    <div >
      <label for="land" class="form-label mt-3">Agent Name</label>
      <input type="text" class="form-control mb-1 in" id="land" name="aname">
    </div>
    <div>
    <label for="larea" class="form-label">Agent Area</label>
      <select class="form-select form-select-sm in mb-1" name="aarea" aria-label=".form-select-sm example">
      <option selected>Select Agent Area</option>
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
      <label for="larea" class="form-label">Agent Contact</label>
      <input type="text" class="form-control mb-1 in" id="larea" name="acontact">
    </div>
    <div>
    <label for="larea" class="form-label">Role</label>
      <select class="form-select form-select-sm in mb-1" name="role" aria-label=".form-select-sm example">
      <option selected>Select Agent Role</option>
        <?php
         $sql = "SELECT * FROM user"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['id'];?>"> 
          <?php echo$rows['username'];?>
        </option>
          <?php }?>
      </select>
    </div>

    <div >
      <label for="land" class="form-label">username</label>
      <input type="text" class="form-control mb-1 in" id="land" name="user_name">
    </div>
    
    <div >
      <label for="land" class="form-label">password</label>
      <input type="text" class="form-control mb-1 in" id="land" name="password">
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Agent Photo</label>
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
  $role=$_POST['role'];
  $user_name=$_POST['user_name'];
  $password=$_POST['password'];
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }

if(!empty($user_name)&& !empty($password)&& !empty($role)){
  $sql ="INSERT INTO land_agent (land_agent_name,land_agent_location,land_agent_contact,agent_img,user_id,user_name,password) 
  VALUES('$aname','$aarea','$acontact','$imageName','$role','$user_name','$password')";
  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/agent/'.$imageName);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}




?>