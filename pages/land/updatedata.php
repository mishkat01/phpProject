<?php include('../../includes/conf.php');

    $userid = $_POST['userid'];
    $sql = "SELECT * FROM land where land_id = $userid"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-12 container d-flex justify-content-center bg-light">
<form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label class="form-label mt-3">Land Name</label>
      <input type="text" class="form-control mb-1 in" id="lname" name="lname" value=" <?=$row['land_name']?>">
      <input type="hidden" class="form-control mb-1 in" id="lid" name="lname" value=" <?=$row['land_id']?>">
    </div>
    <div>
    <label class="form-label">Project location</label>
      <select class="form-select form-select-sm in mb-1" name="larea" id="areaid" aria-label=".form-select-sm example">
      <option selected>Select Your Area Area</option>
        <?php
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>" <?php if ($rows['area_id']==$row['land_area']){echo "selected";}?>> 
          <?php echo $rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div>
      <label  class="form-label">Land Cost</label>
      <input type="text" class="form-control mb-1 in" id="lcost" name="lcost" value=" <?=$row['land_cost']?> ">
    </div>

    <div>
      <label class="form-label">land measurement</label>
      <input type="text" class="form-control mb-1 in" id="lme" name="lme" value=" <?=$row['lme']?> ">
    </div>

    <div>
    <label  class="form-label">Status</label>
    <select class="form-select form-select-sm in mb-1" id="status" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM land_status limit 2"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['ls_id'];?>" <?php if($rows['ls_id'] == $row['ls_id']){echo 'selected';}?> ><?php echo$rows['is_name'];?></option>
          <?php }?>
      </select>
    </div>
    <div >
    <label  class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" name="agent" id="dev" aria-label=".form-select-sm example">
      <option>Select Agent</option>
      <?php
         $sql = "SELECT * FROM land_agent"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['land_agent_id'];?>" <?php if($rows['land_agent_id'] == $row['land_agent_id']){echo 'selected';}?> >
          <?php echo$rows['land_agent_name'];?></option>
        <?php }?>
      </select>
    </div>
    <div class="mb-3">
      <label  class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="pic" name='pic'>
  </div>
    <button type="button" class="btn btn-secondary " id="sub">Submit</button>

  </form>
 </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

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

$("#sub").click(function(){
  var a =$("#lname").val();
  $.ajax({
        url:"lupajx.php",
				type:"POST",
				data:{
          "lname":$("#lname").val(),
          "lid":$("#lid").val(),
          "larea":$("#areaid").val(),
          "lcost":$("#lcost").val(),
          "lme":$("#lme").val(),
          "status":$("#status").val(),
          "agent":$("#dev").val(),
        
        },
				success: function(data){
          Swal.fire(
          'Update Success',
          '',
          'success'
        )
        
					
				}
  });
})



});
</script>





