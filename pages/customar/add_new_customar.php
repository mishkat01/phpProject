<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-12  container d-flex justify-content-center bg-light ">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="prop" class="form-label mt-3">Customer Name</label>
      <input type="text" class="form-control mb-1 in" id="prop" name="cos-name">
    </div>
    <div>
      <label for="ploc" class="form-label">Customer Email </label>
      <input type="text" class="form-control mb-1 in" id="ploc" name="email">
    </div>
    <div>
      <label for="pcost" class="form-label">Customer Contact</label>
      <input type="text" class="form-control mb-1 in" id="pcost" name="contact">
    </div>
    <div>
      <label for="larea" class="form-label">National ID</label>
      <input type="text" class="form-control mb-1 in" id="cid" name="national_id">
    </div>
    <div>
      <label for="larea" class="form-label">Total Amount</label>
      <input type="text" class="form-control mb-1 in" id="camount" name="amount">
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
          <option value= "<?php echo $row['ls_id'];?>"><?php echo $row['is_name'];?></option>
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

<?php

if(isset($_POST['sub'])){
    $cos_name=$_POST['cos-name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $national_id=$_POST['national_id'];
    $amount=$_POST['amount'];
    $status=$_POST['status'];
    $image=$_FILES['pic'];
     $imageName='';
     if($image['name']!=''){
        $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    }
    if(!empty($cos_name) && !empty($email) && !empty($contact) && !empty($national_id) && !empty($amount) && !empty($status)){
    
    $sql="INSERT INTO customer (customer_name,customer_email,customer_contact,national_id,total_amount,status,customer_img) VALUES('$cos_name','$email','$contact','$national_id','$amount','$status','$imageName')";
    $query=$conn->query($sql);
        if ( $query){
            move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
            echo "uploaded Successful";
        } else {
            echo "Not uploaded";
        }
    }
}
?>