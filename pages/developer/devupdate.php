<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<?php
    $id=$_GET['id'];
    $sql = "SELECT * FROM p_contactor where land_agent_id = $id"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<div class="col-md-12  container d-flex justify-content-center bg ">
<div class="col-md-4">
  <form method="post" class=" col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class="p-3"> 
    <div >
      <label for="land" class="form-label mt-3">Agent Name</label>
      <input type="text" class="form-control mb-1 in" id="land" name="aname" value="<?= $row['land_agent_name']?>">
      <input type="hidden" class="form-control mb-1 in" id="land" name="id" value="<?= $row['land_agent_id']?>">
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
          <option value= "<?php echo $rows['area_id'];?>" <?php if($rows['area_id']==$row['land_agent_location']){echo 'selected';}?>> 
          <?php echo$rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div >
      <label for="larea" class="form-label">Agent Contact</label>
      <input type="text" class="form-control mb-1 in" id="larea" name="acontact" value="<?= $row['land_agent_contact']?>">
    </div>
    <div class="mb-3 ">
      <label for="formFile" class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="formFile" name="pic">
  </div>
    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
  </form>
</div>
</div>

<?php
if(isset($_POST['sub'])){
    $id = $_POST['id'];
  $aname=$_POST['aname'];
  $aarea=$_POST['aarea'];
  $acontact=$_POST['acontact'];
  $image=$_FILES['pic'];

$sql = "UPDATE p_contactor SET land_agent_name='$aname', land_agent_location='$aarea' , land_agent_contact='$acontact'
WHERE land_agent_id=$id";
if ($conn->query($sql) === TRUE) {
      header('Location: dev.php');
    }else{
      echo "User image update failed.";
    }

    if($image['name']!=''){
        $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    
        $updateImg="UPDATE p_contactor SET agent_img='$imageName' WHERE land_agent_id='$id'";
        if($conn->query($updateImg) === TRUE){
          move_uploaded_file($image['tmp_name'],'../../dist/images/agent/'.$imageName);
          header("location:dev.php");
        }else{
          echo "User image update failed.";
        }
      }
    } else {

}
?>