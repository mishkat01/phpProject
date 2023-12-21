<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10  container d-flex justify-content-center bg">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="land" class="form-label mt-3">Land Name</label>
      <input type="text" class="form-control mb-1 in" id="lname" name="lname">
    </div>
    <div>
    <label for="larea" class="form-label">Project location</label>
      <select class="form-select form-select-sm in mb-1" name="larea" id="areaid" aria-label=".form-select-sm example">
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
      <label for="larea" class="form-label">Land Cost</label>
      <input type="text" class="form-control mb-1 in" id="lcost" name="lcost">
    </div>

    <div>
      <label for="larea" class="form-label">land measurement</label>
      <input type="text" class="form-control mb-1 in" id="lme" name="lme">
    </div>

    <div>
    <label for="larea" class="form-label">Status</label>
    <select class="form-select form-select-sm in mb-1" id ="status" name="status" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM land_status limit 2"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['ls_id'];?>"><?php echo$row['is_name'];?></option>
          <?php }?>
      </select>
    </div>
    <div>
    <label for="larea" class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" name="agent" id ="dev" aria-label=".form-select-sm example">
      <option selected>Select Agent</option>
        
      </select>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div>
    <button type="button" class="btn btn-secondary " id="sub">Submit</button>
    <a  type="button"  href="landview.php" class="btn btn-secondary float-end">View All land</a>
    <p id="msg" class="text-center" style="display:none;">Uploading Data</p>
  </form>
 </div>
 </div>
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

$("#sub").click(function(e){
  e.preventDefault();
  $("#msg").show();
  $.ajax({
        url:"upload.php",
				type:"POST",
				data:{
          "lname":$("#lname").val(),
          "larea":$("#areaid").val(),
          "lcost":$("#lcost").val(),
          "lme":$("#lme").val(),
          "status":$("#status").val(),
          "agent":$("#dev").val(),
        },
				success: function(data){
          $("#msg").hide(),
          Swal.fire(
          'Submission Success',
          '',
          'success'
        )
					
				}
  });
})
});
</script>

<?php
// if(isset($_POST['sub'])){
//   $lname=$_POST['lname'];
//   $larea=$_POST['larea'];
//   $lcost=$_POST['lcost'];
//   $lme=$_POST['lme'];
//   $status=$_POST['status'];
//   $agent=$_POST['agent'];
//   $image=$_FILES['pic'];
//   $imageName='';
//   if($image['name']!=''){
//     $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
//   }
// if(!empty($lname)&& !empty($larea)&& !empty($lcost)&& !empty($status) && !empty($agent)){
//   $sql ="INSERT INTO land (land_name,land_area,land_cost,ls_id,land_agent_id,land_img,lme ) VALUES('$lname','$larea','$lcost','$status','$agent','$imageName','$lme')";
//   if ($conn->query($sql) === TRUE) {
//     move_uploaded_file($image['tmp_name'],'../../dist/images/agent/'.$imageName);
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
// }
// }
?>