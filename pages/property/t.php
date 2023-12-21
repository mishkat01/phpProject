<?php  session_start();
include("../../includes/db.php");
    $sql = "SELECT *
    FROM property
    NATURAL JOIN land_status
    JOIN area ON property.property_location = area.area_id
    JOIN land_agent ON land_agent.land_agent_id = property.agent
    order by property_id DESC
    "; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Property Name</th> 
                    <th>Property Area</th>
                    <th>Property Cost</th>
                    <th>Selling Price</th>
                    <th>Agent</th>
                    <th>Availability</th>
                    <th>Photo</th>
                    <th colspan='3'>Action</th>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['property_name']?></td>
                <td><?=$row['area_name']?></td>
                <td><?=$row['property_cost']?></td>
                <td><?=$row['selling_p']?></td>
                <td><?=$row['land_agent_name']?></td>
                <td><?=$row['is_name']?></td>
                
                <td>
                     <?php if($row['land_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/land/$row[land_img]'>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }
                   ?>
                </td>
                <!-- <td>

                  <button class='btn nav-link' class="btn btn-primary " id = "passingID" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?=$row['property_id']?>">
                  <i class='fa-regular fa-pen-to-square fa-xl'></i></button>
                   </td> -->

                   <?php if($_SESSION['loc'] == $row['property_location']) { ?>
                    <td>
                        <a class='btn nav-link click' data-id= "<?=$row['property_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                    </td>
                    <!-- <td>
                      <a class='btn nav-link' href='Delete.php?id=<?=$row['property_id']?>'>
                      <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                    </td> -->
                <?php }?>
                <td>
                        <a class='btn nav-link tap' data-id= "<?=$row['property_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModals">
                        <i class="fa-regular fa-square-plus fa-xl"></i></a>
                        
                    </td>

                <?php if($_SESSION['role'] == 1) { ?>
                    <!-- <td>
                        <a class='btn nav-link tap' data-id= "<?=$row['property_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-regular fa-square-plus fa-xl"></i></a>
                    </td> -->
                    <td>
                        <a class='btn nav-link click' data-id= "<?=$row['property_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                    </td>
                    <td>
                      <a class='btn nav-link' href='Delete.php?id=<?=$row['property_id']?>'>
                      <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                    </td>
                <?php }?>
                
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(document).ready(function(){
$(".click").click(function(){
  var id = $(this).attr('data-id');
  $.ajax({
        url:"proupdatedata.php",
				type:"post",
				data:{userid:id},
				success: function(data){
					$(".modal-body").html(data);
				}
  });
});
$(".tap").click(function(){
  var id = $(this).attr('data-id');
  var area = $("#area").val();
  $.ajax({
        url:"booking.php",
				type:"post",
				data:{id:id,area:area},
				success: function(data){
					$(".modal-bodys").html(data);
				}
  });
});
});
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Property</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Book Property</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-bodys">
        
      </div>
    </div>
  </div>
</div>