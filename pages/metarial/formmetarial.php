<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>

<div class="col-md-10  container d-flex justify-content-center  ">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="metaril" class="form-label mt-3">Metarials Name</label>
      <input type="text" class="form-control mb-1 in" id="metaril" name="mname">
    </div>
    <div>
      <label for="mlist" class="form-label">Quantity</label>
      <input type="text" class="form-control mb-1 in" id="mlist" name="mquantity">
    </div>
    <div>
    <label for="larea" class="form-label">Unit of Measurement</label>
      <select class="form-select form-select-sm in mb-1" name="uom" aria-label=".form-select-sm example">
      <option selected>Select Form Here </option>
        <?php
         $sql = "SELECT * FROM unit_om"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $row['u_id'];?>"> 
          <?php echo$row['u_name'];?>
        </option>
          <?php }?>
      </select>
    </div>

    <div>
      <label for="mprice" class="form-label">Total Cost</label>
      <input type="text" class="form-control mb-1 in" id="price" name="tcost">
    </div>

    <div>
      <label for="mprice" class="form-label">Total Paid</label>
      <input type="text" class="form-control mb-1 in" id="paid" name="tpaid">
    </div>

    <div>
    <label for="larea" class="form-label">Suplier</label>
      <select class="form-select form-select-sm in mb-1" name="sup" aria-label=".form-select-sm example">
      <option selected>select a suplier</option>
        <?php
         $sql = "SELECT * FROM suplier"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['sup_id'];?>"><?php echo$row['sup_name'];?></option>
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
  $mname=$_POST['mname'];
  $mquantity=$_POST['mquantity'];
  $uom=$_POST['uom'];
  $tcost=$_POST['tcost'];
  $tpaid=$_POST['tpaid'];
  $sup=$_POST['sup'];
  
if(!empty($mname)&& !empty($mquantity)&& !empty($uom)&& !empty($tcost) && !empty($sup)){
  $sql ="INSERT INTO metarial (metarial_name,mquantity,u_id,metarial_price,sup_id,tpaids) VALUES('$mname',' $mquantity','$uom','$tcost','$sup','$tpaid')";
  if ($conn->query($sql) === TRUE) {
    // header('location:mview.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>