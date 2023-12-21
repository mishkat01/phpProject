<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<?php
include("../../includes/db.php");

$id = $_POST['pname'];
$sql = "SELECT * FROM project 
Join area on area.area_id=project.project_location

WHERE project_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<div id="rak"></div>

<label for="larea" class="form-label">Apartment Area</label>
    <select class="form-select form-select-sm in mb-1" name="ploname" id="ploname">
      <option class="form-select form-select-sm in mb-1" value="<?=$row['area_id']?>"><?=$row['area_name']?></option>

      </select>
    </div>
    <div>
      <label for="pcost" class="form-label">Apartment Total Cost</label>
      <input type="text" class="form-control mb-1 in" id="pconame" name="ploname" value="<?=$row['project_price']?>" disabled>
      <input type="text" class="form-control mb-1 in" id="project_name" value="<?=$row['project_name']?>" disabled>
</div>

    <div>
      <label for="pcost" class="form-label">Selling Price</label>
      <input type="text" class="form-control mb-1 in" id="selling_p" name="selling_p">
    </div>

    <div>
    <label for="larea" class="form-label">Agent</label>
      <select class="form-select form-select-sm in mb-1" id="agents" name="agent" aria-label=".form-select-sm example">
      <option selected>Select Agent</option>
      <?php
         $sql = "SELECT * FROM land_agent where land_agent_location= $row[project_location]"; 
         $result = $conn->query($sql);
         while ($rows = $result->fetch_assoc()) {
        ?>
          <option value= "<?php echo $rows['land_agent_id'];?>"> 
          <?php echo$rows['land_agent_name'];?>
        </option>
          <?php }?>
      </select>
    </div>
    <div>
    <label for="larea" class="form-label">Availability</label>
    <select class="form-select form-select-sm in mb-1" id="status" aria-label=".form-select-sm example">
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
      <input class="form-control" type="file" id='pic'>
  </div>
    <button type="submit" class="btn btn-secondary" name="sub" id="sub">Submit</button>
    <a  type="button"  href="propertyview.php" class="btn btn-secondary float-end">View All Proparty</a>
  </form>
 </div>
 </div>
</div>
<div class="bg-danger" id="msg" style="display:none;">
    submitting
</div>
<script>
  $(document).ready(function(){
    $('#sub').click(function(e){
      e.preventDefault();
        $("#msg").show();
        $.ajax({
        url:"exisitingpro.php",
        type:"post",
        data:{
          
          "ploname":$("#ploname").val(),
          "pname":$("#project_name").val(),
          "pconame":$("#pconame").val(),
          "selling_p":$("#selling_p").val(),
          "agent":$("#agents").val(),
          "status":$("#status").val(),
          "pic":$("#pic").val(),
        },
        success: function(data){
        $("#msg").hide();
        Swal.fire(
          'Update Success',
          '',
          'success'
        )

      }
      });
      
    });

  });
</script>

