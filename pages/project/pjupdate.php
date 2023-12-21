<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>
<?php
    $id=$_GET['id'];
    $sql = "SELECT * FROM project where project_id = $id"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-10  container d-flex justify-content-center  ">
 <div class="col-md-3"></div>
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="pjname" class="form-label mt-3">Project Name</label>
      <input type="text" class="form-control mb-1 in" id="pjname" name="pjname" value="<?=$row['project_name']?>">
      <input type="hidden" class="form-control mb-1 in" id="id" name="id" value="<?=$row['project_id']?>">
    </div>
    <div>
    <label for="larea" class="form-label">Project location</label>
      <select class="form-select form-select-sm in mb-1" name="pjloname" aria-label=".form-select-sm example">
      <option selected>Select Your Area Area</option>
        <?php
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>" <?php if($rows['area_id']==$row['project_location']){echo 'selected';};?>> 
          <?php echo$rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div>
      <label for="pjprice" class="form-label">Project Buget</label>
      <input type="text" class="form-control mb-1 in" id="pjprice" name="pjpname" value="<?=$row['project_price']?>">
    </div>
    <div>
      <label for="pjprice" class="form-label">Invested</label>
      <input type="text" class="form-control mb-1 in" id="pjprice" name="spened" value="<?=$row['spened']?>">
    </div>
    <div>
    <label for="larea" class="form-label">Status</label>
      <select class="form-select form-select-sm in mb-1" name="status" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM project_status"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['ps_id'];?>" <?php if($rows['ps_id']==$row['ps_id']){echo 'selected';};?>>
            <?php echo $rows['p_status'];?></option>
          <?php }?>
      </select>
    </div>
    <div>
    <label for="larea" class="form-label">Developer</label>
      <select class="form-select form-select-sm in mb-1" name="dev" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM p_contactor"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['land_agent_id'];?>" <?php if($rows['land_agent_id']==$row['pc_id']){echo 'selected';};?>>
            <?php echo $rows['land_agent_name'];?>
          </option>
          <?php }?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3" name="sub">Submit</button>
  </form>
 </div>
 </div>
 <div class="col-md-3"></div>
</div>

<?php
if(isset($_POST['sub'])){
    $pjname=$_POST['pjname'];
    $id=$_POST['id'];
    $pjlocetion=$_POST['pjloname'];
    $pjprice=$_POST['pjpname'];
    $spened=$_POST['spened'];
    $status=$_POST['status'];
    $dev=$_POST['dev'];

  if(!empty($pjname)&& !empty($pjlocetion)&& !empty($pjprice)&& !empty($status) && !empty($dev)){
    $sql = "UPDATE project SET project_name=' $pjname', project_location='$pjlocetion' , project_price='$pjprice' , spened='$spened', ps_id='$status',pc_id='$dev' WHERE project_id=$id";
  if ($conn->query($sql) === TRUE) {
    header("location:pjview.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>

