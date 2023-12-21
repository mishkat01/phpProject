<?php include('../../includes/conf.php');
  get_header();
  get_side();

    $userid = $_GET['id'];
    $sql = "SELECT * FROM booking where bking_id = $userid";  // id value name changes 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-10  container d-flex justify-content-center bg">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="name" class="form-label mt-3">Customar Name</label>
      <input type="text" class="form-control mb-1 in" id="name" name="bname" value="<?=$row['bkng_name']?>">
      <input type="hidden" class="form-control mb-1 in" id="name" name="bking_id" value="<?=$row['bking_id']?>">
    </div>
    <div>
      <label for="bkarea" class="form-label">Address</label>
      <input type="text" class="form-control mb-1 in" id="bkarea" name="barea" value="<?=$row['bkng_area']?>">
    </div>
    <div>
      <label for="bcost" class="form-label">Buget</label>
      <input type="text" class="form-control mb-1 in" id="bcost" name="bcost" value="<?=$row['bkng_cost']?>">
    </div>
    <div>
    <label for="larea" class="form-label">Select An Apratment</label>
    <select class="form-select form-select-sm in mb-1" name="property_id" aria-label=".form-select-sm example">
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM property"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?= $rows['property_id'];?>" <?php if($rows['property_id']==$row['property_id'])    {echo 'selected';};?>> 
              <?php echo$rows['property_name'];?>
         </option>

          <?php }?>
      </select>
    </div>

    <div>
    <label for="larea" class="form-label">Booking Type</label>
    <select class="form-select form-select-sm in mb-1" name="booking" aria-label=".form-select-sm example">
      <option selected>Please Select Your Booking Type</option>
        <?php
         $sql = "SELECT * FROM booking_type"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['bt_id'];?>" <?php if($rows['bt_id']==$row['bt_id'])    {echo 'selected';};?>><?php echo$rows['btype'];?></option>
          <?php }?>
      </select>
    </div>

    <div>
    <label for="larea" class="form-label">Payment Type</label>
    <select class="form-select form-select-sm in mb-1" name="Payment" aria-label=".form-select-sm example">
      <option selected>Please Select Your Payment Type</option>
        <?php
         $sql = "SELECT * FROM payment"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['pay_id'];?>" <?php if($rows['pay_id']==$row['Payment'])    {echo 'selected';};?>><?php echo$rows['payname'];?></option>
          <?php }?>
      </select>
    </div>
    <div class="mb-3">
  </div>
    <button type="submit" class="btn btn-secondary " name="sub">Submit</button>
    <a  type="button"  href="landview.php" class="btn btn-secondary float-end">View All land</a>
  </form>
 </div>
 </div>
</div>
<?php
if(isset($_POST['sub'])){
  $id=$_POST['bking_id'];
  $bname=$_POST['bname'];
  $barea=$_POST['barea'];
  $bcost=$_POST['bcost'];
  $property_id=$_POST['property_id'];
  $booking=$_POST['booking'];
  $Payment=$_POST['Payment'];

if(!empty($bname)&& !empty($barea)&& !empty($bcost)&& !empty($property_id) && !empty($booking)){
  $sql = "UPDATE booking SET bkng_name='$bname', bkng_area='$barea' , bkng_cost='$bcost' , property_id= '$property_id',
  bt_id = '$booking', Payment='$Payment'  WHERE bking_id=$id";

  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>

