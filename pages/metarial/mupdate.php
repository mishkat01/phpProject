<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>
<?php
    $id=$_GET['id'];
    $sql = "SELECT * FROM metarial where metarial_id = $id"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-10  container d-flex justify-content-center  ">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="metaril" class="form-label mt-3">Metarials Name</label>
      <input type="hidden" class="form-control mb-1 in" id="metaril" name="id" value="<?= $row['metarial_id']?>">
      <input type="text" class="form-control mb-1 in" id="metaril" name="mname" value="<?= $row['metarial_name']?>">
    </div>
    <div>
      <label for="mlist" class="form-label">Quantity</label>
      <input type="text" class="form-control mb-1 in" id="mlist" name="mquantity" value="<?= $row['mquantity']?>">
    </div>
    <div>
    <label for="larea" class="form-label">Unit of Measurement</label>
      <select class="form-select form-select-sm in mb-1" name="uom" aria-label=".form-select-sm example">
      <option selected>Select Form Here </option>
        <?php
         $sql = "SELECT * FROM unit_om"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['u_id'];?>" <?php if($rows['u_id']==$row['u_id']){echo 'selected';};?>> 
          <?php echo$rows['u_name'];?>
        </option>
          <?php }?>
      </select>
    </div>

    <div>
      <label for="mprice" class="form-label">Total Cost</label>
      <input type="text" class="form-control mb-1 in" id="price" name="tcost" value="<?= $row['metarial_price']?>">
      
    </div>
    <div>
    <label for="larea" class="form-label">Suplier</label>
      <select class="form-select form-select-sm in mb-1" name="sup" aria-label=".form-select-sm example">
      <option selected>select a suplier</option>
        <?php
         $sql = "SELECT * FROM suplier"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$rows['sup_id'];?>" <?php if($rows['sup_id']==$row['sup_id']){echo 'selected';};?>><?php echo$rows['sup_name'];?></option>
          <?php }?>
      </select>
    </div>
    <button type="submit" class="btn btn-secondary mt-3" name="sub">Submit</button>
  </form>
 </div>
 </div>
</div>
<?php
if(isset($_POST['sub'])){
  $id=$_POST['id'];
  $mname=$_POST['mname'];
  $mquantity=$_POST['mquantity'];
  $uom=$_POST['uom'];
  $tcost=$_POST['tcost'];
  $sup=$_POST['sup'];
  
if(!empty($mname)&& !empty($mquantity)&& !empty($uom)&& !empty($tcost) && !empty($sup)){
  $sql = "UPDATE metarial SET metarial_name='$mname', mquantity='$mquantity' , metarial_price='$tcost' , sup_id = '$sup',
  u_id  = '$uom'  WHERE metarial_id=$id";
  if ($conn->query($sql) === TRUE) {
    header('location:mview.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>