<?php include('../../includes/conf.php');
    $sql = "SELECT * FROM land NATURAL JOIN land_status
    JOIN land_agent ON land_agent.land_agent_id = land.land_agent_id
    JOIN area ON area.area_id = land.land_area    order by land_id desc
    
    "; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Name</th> 
                    <th>Area</th>
                    <th>Cost</th>
                    <th>Agent</th>
                    <th>Status</th>
                    <th>Land Measurement</th>
                    <th>Photo</th>
                    <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
                    <th colspan='2'>Action</th>
                    <?php }?>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['land_name']?></td>
                <td><?=$row['area_name']?></td>
                <td><?=$row['land_cost']?></td>
                <td><?=$row['land_agent_name']?></td>
                <td><?=$row['is_name']?></td>
                <td><?= $row['lme'] ?></td>
                <td>
                     <?php if($row['land_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/land/$row[land_img]'>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }
                   ?>
                </td>
                <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
                <td>
                <a class='btn nav-link id' data-id="<?=$row['land_id']?>"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class='fa-regular fa-pen-to-square fa-xl' ></i></a>
                </td>
                <td>
                  <a class='btn nav-link' href='Delete.php?id=<?=$row['land_id']?>'>
                  <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                </td>
                <?php }?>
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>
<script>
  $(document).ready(function(){
    $(".id").click(function(){
      var id = $(this).attr("data-id");
      $.ajax({
              url: 'updatedata.php',
              type: 'post',
              data: {userid: id},
              success: function(response){ 
             $('.modal-body').html(response); 
             $('#exampleModal').modal('show'); 
              }
            });
    });
  })
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>