<?php session_start();
include("../../includes/db.php");


  $id = $_POST["id"];
  $sql = "SELECT * FROM property 
  where property_id = $id"; 
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>


<div class="col-md-12  container d-flex justify-content-center bg">
 <div class="col-md-12">
 <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class=" p-3">
    <div>
      <label for="name" class="form-label mt-3">Customar Name</label>
      <input type="text" class="form-control mb-1 in" id="bname" name="bname">
    </div>
    <?php if($_SESSION['role']==1){?>
    <div>
    <label for="larea" class="form-label"> Area</label>
      <select class="form-select form-select-sm in mb-1" id="booking_area" aria-label=".form-select-sm example" disabled>
      <option selected>Select Area</option>
        <?php
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>" <?php if($rows['area_id']==$row['property_location']){echo 'selected';}?>> 
          <?php echo$rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
<?php } ?>
<?php if($_SESSION['role']==2 || $_SESSION['role']==3){?>
    <div>
    <label for="larea" class="form-label"> Area</label>
      <select class="form-select form-select-sm in mb-1" id="booking_area" aria-label=".form-select-sm example" disabled>
      <option selected>Select Area</option>
        <?php
        $loc = $_SESSION['loc'];
         $sql = "SELECT * FROM area"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['area_id'];?>" <?php if($row['property_location']==$rows['area_id']){echo 'selected';};?>> 
          <?php echo$rows['area_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <?php } ?>

    <div>
      <label for="bkarea" class="form-label">Address</label>
      <input type="text" class="form-control mb-1 in" id="barea" >
    </div>

    <div>
      <label for="bcost" class="form-label">Price</label>
      <input type="text" class="form-control mb-1 in" id="bcost"  value="<?=$row['property_cost']?>" disabled>
    </div>

    <div>
      <label for="bcost" class="form-label">Contact</label>
      <input type="text" class="form-control mb-1 in"  id="Customar_con">
    </div>

    <div>
    <label for="larea" class="form-label">Select An Apratment</label>
    <select class="form-select form-select-sm in mb-1" id="property_id" aria-label=".form-select-sm example" disabled>
      <option selected>Open this select menu</option>
        <?php
         $sql = "SELECT * FROM property"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['property_id'];?>" <?php if($row['property_id']==$id){echo "selected";}?>><?php echo$row['property_name'];?></option>
          <?php }?>
      </select>
    </div>
    <!-- <?php if($_SESSION['role']==2){?>
        <div>
        <label for="larea" class="form-label">Select An Apratment</label>
        <select class="form-select form-select-sm in mb-1" id="property_id" aria-label=".form-select-sm example">
          <option selected>Open this select menu</option>
            <?php
            $loc = $_SESSION['loc'];
            $sql = "SELECT * FROM property
            where $loc = property.property_location"; 
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
              <option value= "<?php echo$row['property_id'];?>" <?php if($row['property_id']==$id){echo "selected";}?>><?php echo$row['property_name'];?></option>
              <?php }?>
          </select>
        </div>
    <?php } ?> -->
    <div>
    <label for="larea" class="form-label">Booking Type</label>
    <select class="form-select form-select-sm in mb-1" id="booking" aria-label=".form-select-sm example">
      <option selected>Please Select Your Booking Type</option>
        <?php
         $sql = "SELECT * FROM booking_type"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['bt_id'];?>"><?php echo$row['btype'];?></option>
          <?php }?>
      </select>
    </div>

    <div>
    <label for="larea" class="form-label">Payment Type</label>
    <select class="form-select form-select-sm in mb-1" id="Payment" aria-label=".form-select-sm example">
      <option selected>Please Select Your Payment Type</option>
        <?php
         $sql = "SELECT * FROM payment"; 
         $result = $conn->query($sql);
         while ($row = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo$row['pay_id'];?>"><?php echo$row['payname'];?></option>
          <?php }?>
      </select>
    </div>
    <div class="mb-3">
  </div>
    <button  class="btn btn-secondary " id="sub">Submit</button>
    <a  type="button"  href="landview.php" class="btn btn-secondary float-end">View All land</a>
  </form>
 </div>
 </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<Script>
  $(document).ready(function(){
    $("#sub").click(function(e){
      e.preventDefault();
      $.ajax({
        url:"ajxbooking.php",
				type:"POST",
				data:{
          bname:$("#bname").val(),
          booking_area:$("#booking_area").val(),
          barea:$("#barea").val(),
          bcost:$("#bcost").val(),
          Customar_con:$("#Customar_con").val(),
          property_id:$("#property_id").val(),
          booking:$("#booking").val(),
          Payment:$("#Payment").val(),

        },
				success: function(data){
					Swal.fire(
          'submission Success',
          '',
          'success'
        )
				}
  });
    })
  })
</Script>