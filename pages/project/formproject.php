<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>

<div class="col-md-10  container d-flex justify-content-center  ">
 <div class="col-md-3"></div>
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="pjname" class="form-label mt-3">Project Name</label>
      <input type="text" class="form-control mb-1 in" id="pjname" name="pjname">
    </div>
    <div>
    <label for="larea" class="form-label">Project location</label>
      <select class="form-select form-select-sm in mb-1" name="pjloname" id="areaid" aria-label=".form-select-sm example">
      <option selected>Select Your Area Area</option>
        <?php
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>"> 
          <?php echo $rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div>
      <label for="pjprice" class="form-label">Project Buget</label>
      <input type="text" class="form-control mb-1 in" id="pjprice" name="pjpname">
    </div>
    <div>
      <label for="pjprice" class="form-label">Invested</label>
      <input type="text" class="form-control mb-1 in" id="pjprice" name="spened">
    </div>
    <div>
    <label for="larea" class="form-label">Status</label>
      <select class="form-select form-select-sm in mb-1" name="status" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM project_status"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['ps_id'];?>"><?php echo$row['p_status'];?></option>
          <?php }?>
      </select>
    </div>
    <div>
    <label for="larea" class="form-label">Developer</label>
      <select class="form-select form-select-sm in mb-1" id ="dev" name="dev" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="sub">Submit</button>
  </form>
 </div>
 </div>
 <div class="col-md-3"></div>
</div>
<script>
$(document).ready(function(){
$("#areaid").change(function(){
  $.ajax({
        url:"ajxdev.php",
				type:"post",
				data:{"areaid":$(this).val()},
				success: function(data){
					$("#dev").html(data);
				}
  });
});
});
</script>

<?php
if(isset($_POST['sub'])){
  $pjname=$_POST['pjname'];
  $pjlocetion=$_POST['pjloname'];
  $pjprice=$_POST['pjpname'];
  $spened=$_POST['spened'];
  $status=$_POST['status'];
  $dev=$_POST['dev'];

if(!empty($pjname)&& !empty($pjlocetion)&& !empty($pjprice)){
  $sql ="INSERT INTO project (project_name,project_location,project_price,spened,ps_id,pc_id)
   VALUES('$pjname','$pjlocetion','$pjprice','$spened','$status','$dev')";
  if ($conn->query($sql) === TRUE) {
  header('location:pjview.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>