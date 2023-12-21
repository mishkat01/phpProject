<?php include('../../includes/conf.php');
  get_header();
  get_side();


    $userid = $_GET['id'];
    $sql = "SELECT * FROM customer where customer_id = $userid"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="col-md-12  container d-flex justify-content-center bg-light ">
 <div class="col-md-4">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="prop" class="form-label mt-3">Customer Name</label>
      <input type="text" class="form-control mb-1 in" id="prop" name="cos_name" value="<?= $row['customer_name']?>">
      <input type="hidden" class="form-control mb-1 in"  name="customer_id" value="<?= $row['customer_id']?>">
    </div>
    <div>
      <label for="ploc" class="form-label">Customer Email </label>
      <input type="text" class="form-control mb-1 in" id="ploc" name="email" value="<?= $row['customer_email']?>">
    </div>
    <div>
      <label for="pcost" class="form-label">Customer Contact</label>
      <input type="text" class="form-control mb-1 in" id="pcost" name="contact" value="<?= $row['customer_contact']?>">
    </div>
    <div>
      <label for="larea" class="form-label">National ID</label>
      <input type="text" class="form-control mb-1 in" id="cid" name="national_id" value="<?= $row['national_id']?>">
    </div>
    <div >
      <label for="larea" class="form-label">Total Amount</label>
      <input type="text" class="form-control mb-1 in" id="larea" name="amount" value="<?= $row['total_amount']?>">
</div>
    <div>
    <label for="larea" class="form-label">Status</label>
      <select class="form-select form-select-sm in mb-1" name="status" aria-label=".form-select-sm example">
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
    <div class="mb-3">
      <label for="formFile" class="form-label">Upload Customer Photos</label>
      <input class="form-control" type="file" id="formFile" name='pic'>
  </div>
    <button type="submit" class="btn btn-secondary" name="sub">Submit</button>
    <a  type="button"  href="view_all_customar.php" class="btn btn-secondary float-end">View All Proparty</a>
  </form>
 </div>
 </div>
</div>

<?php
    if(isset($_POST['sub'])){
        $id=$_POST['customer_id'];
        $name=$_POST['cos_name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $national_id=$_POST['national_id'];
        $amount=$_POST['amount'];
        $status=$_POST['status'];
        $image=$_FILES['pic'];

    $sql = "UPDATE customer SET customer_name='$name', customer_email='$email' , customer_contact='$contact' , national_id= '$national_id',
    total_amount = '$amount', status='$status'  WHERE customer_id=$id";
    if ($conn->query($sql) === TRUE) {
            header('Location:view_all_costomar.php');
        }else{
            echo "User image update failed.";
        }

    if($image['name']!=''){
        $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

        $updateImg="UPDATE customer SET land_img='$imageName' WHERE customer_id='$id'";
        if($conn->query($updateImg) === TRUE){
        move_uploaded_file($image['tmp_name'],'../../dist/images/land/'.$imageName);
         header('Location:view_all_costomar.php');
        }else{
        echo "User image update failed.";
        }
    }
    } else {

    } 
  ?>