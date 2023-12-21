<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();

    $userid = $_GET['id'];
    $sql = "SELECT * FROM suplier natural join metarial
    where sup_id = $userid"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-10  container d-flex justify-content-center bg-light ">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="supli" class="form-label mt-3">Suplier Name</label>
      <input type="text" class="form-control mb-1 in" id="supli" name="sname" value="<?=$row['sup_name']?>">
      <input type="hidden" class="form-control mb-1 in" id="supli" name="id" value="<?=$row['sup_id']?>">
    </div>
    <div>
      <label for="conta" class="form-label">Contact No</label>
      <input type="text" class="form-control mb-1 in" id="conta" name="coname" value="<?=$row['sup_contact_no']?>">
    </div>
    <div>
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control mb-1 in" id="email" name="ename" value="<?=$row['sup_email']?>">
    </div>

    <div>
      <label for="email" class="form-label">Shop Name</label>
      <input type="text" class="form-control mb-1 in" id="tpaid" name="tamount" value="<?=$row['tamount']?>">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Total Paid</label>
      <input type="text" class="form-control mb-1 in" id="tpaid" name="tpaid" value="<?=$row['tpaid']?>">
    </div>

    <!-- <div class="mb-3">
      <label for="formFile" class="form-label">Upload Suplier Photos</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div> -->
    <button type="submit" class="btn btn-secondary" name="sub">Submit</button>
    <a  type="button"  href="viewformsuplier.php" class="btn btn-secondary float-end">suplier detais</a>
  </form>
 </div>
 </div>
</div>
<?php
if(isset($_POST['sub'])){
  $sup_id=$_POST['id'];
  $sup_name=$_POST['sname'];
  $sup_contact_no=$_POST['coname'];
  $sup_email=$_POST['ename'];
  $tamount=$_POST['tamount'];
  $tpaid=$_POST['tpaid'];
  $image=$_FILES['pic'];
  $imageName='';
  if($image['name']!=''){
    $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  }
if(!empty($sup_name)&& !empty($sup_contact_no)&& !empty($sup_email)){
  $sql = "UPDATE suplier SET sup_name='$sup_name', sup_contact_no='$sup_contact_no' , sup_email='$sup_email' , tamount= '$tamount',
  tpaid = '$tpaid'  WHERE sup_id=$sup_id";
  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
    header("location:viewformsuplier.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
?>

