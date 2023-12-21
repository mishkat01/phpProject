<?php include('../../includes/conf.php');
include("../../includes/db.php");

    $userid = $_POST['userid'];
    $sql = "SELECT * FROM property 
    where property_id = $userid"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-12 container d-flex justify-content-center bg-light">
  <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class="p-3"> 
  <div>
      <label for="land" class="form-label mt-3">Land Name</label>
      <input type="text" class="form-control mb-1 in" id="pname" name="pname" value="<?= $row['property_name']?>" >
      <input type="hidden" class="form-control mb-1 in" id="property_id" name="property_id" value="<?= $row['property_id']?>">
    </div>
    <div>
    <label for="larea" class="form-label">Apartment Area</label>
      <select class="form-select form-select-sm in mb-1" name="ploname" id ="areaid" aria-label=".form-select-sm example" >
      <option selected>Select Your Area Area</option>
        <?php
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>" <?php if($rows['area_id']==$row['property_location']){echo 'selected';}?> > 
          <?php echo$rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div >
      <label for="larea" class="form-label">Land Cost</label>
      <input type="text" class="form-control mb-1 in" id="lcost" name="lcost" value="<?= $row['property_cost']?>" >
    </div>

    <div >
      <label for="larea" class="form-label">Selling Price</label>
      <input type="text" class="form-control mb-1 in" id="selling_p" name="selling_p" value="<?= $row['selling_p']?>">
    </div>


    <div >
    <label for="larea" class="form-label">Status</label>
      <select class="form-select form-select-sm in mb-1" name="status" id="status" aria-label=".form-select-sm example">
      <option >Open this select menu</option>
        <?php
         $sql = "SELECT * FROM land_status"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?=$rows['ls_id'];?>" <?php if($rows['ls_id']==$row['ls_id']){echo 'selected';}?>><?php echo$rows['is_name'];?></option>
          <?php }?>
      </select>
    </div>
    <div >
    <label for="larea" class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" name="agent" id="dev" aria-label=".form-select-sm example">
      <option>Select Agent</option>
      <?php
         $sql = "SELECT * FROM land_agent"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['land_agent_id'];?>" <?php if($rows['land_agent_id']==$row['agent']){echo 'selected';}?> > 
          <?php echo$rows['land_agent_name'];?>
        </option>
        <?php }?>
      </select>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div>
    
  <button type="button" class="btn btn-secondary" id="sub">Update</button>
<div class="f"></div>
  </form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  $.ajax({
        url:"ajaxdata.php",
				type:"POST",
				data:{

          "id":$("#property_id").val(),
          "pname":$("#pname").val(),
          "ploname":$("#areaid").val(),
          "lcost":$("#lcost").val(),
          "selling_p":$("#selling_p").val(),
          "status":$("#status").val(),
          "agent":$("#dev").val(),
        },
				success: function(data){
          
					Swal.fire(
          'submission Success',
          '',
          'success'
        )
        $(".t").load("t.php");
				}
  });
});
});
</script>

