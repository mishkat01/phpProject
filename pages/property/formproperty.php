<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-12  container d-flex justify-content-center ">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="prop" class="form-label mt-3">Apartment Name</label>
      <input type="text" class="form-control mb-1 in" id="prop" name="pname">
    </div>
    <div>
    <label for="larea" class="form-label">Apartment Area</label>
      <select class="form-select form-select-sm in mb-1" name="ploname" id = "areaid" aria-label=".form-select-sm example">
      <option selected>Select Your Area Area</option>
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
    <div>
      <label for="pcost" class="form-label">Apartment Total Cost</label>
      <input type="text" class="form-control mb-1 in" id="pcost" name="pconame">
    </div>

    <div>
      <label for="pcost" class="form-label">Selling Price</label>
      <input type="text" class="form-control mb-1 in" id="pcost" name="selling_p">
    </div>

    <div>
    <label for="larea" class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" name="agent" id="dev" aria-label=".form-select-sm example">
      <option selected>Select Agent</option>
        
      </select>
    </div>
    <div>
    <label for="larea" class="form-label">Availability</label>
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
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div>
    <button type="submit" class="btn btn-secondary" name="sub">Submit</button>
    <a  type="button"  href="propertyview.php" class="btn btn-secondary float-end">View All Proparty</a>
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
});
</script>

<?php
if(isset($_POST['sub'])){
  $pname=$_POST['pname'];
  $plocetion=$_POST['ploname'];
  $pcost=$_POST['pconame'];
  $selling_p=$_POST['selling_p'];
  $agent=$_POST['agent'];
  $status=$_POST['status'];
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }
if(!empty($pname)&& !empty($plocetion)&& !empty($pcost)){
  $sql ="INSERT INTO property (property_name,property_location,property_cost,ls_id,land_img,selling_p,agent ) VALUES('$pname',' $plocetion','$pcost','$status','$imageName','$selling_p','$agent')";
  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);

    echo "hi";
  } else {
  }
}
}
?>