<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 p-3 table-responsive tb" id="load">
<?php 
    $sql = "SELECT * FROM land_agent 
    JOIN area ON land_agent.land_agent_location = area.area_id"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class= 'table table-light border align-middle text-center table-bordered tabel-responsive'; >";
        echo "<tr> 
                <th class='col'>Name</th> 
                <th class='col'>Area</th>
                <th class='col'>Contact</th>
                <th class='col'>Agent Photo</th>";
                if($_SESSION['role']==1){
                echo "<th class='col' colspan=3>Action</th>";
                }
            echo "</tr>"; 
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>$row[land_agent_name]</td>
                <td>$row[area_name]</td>
                <td>$row[land_agent_contact]</td>
                <td>";
                     if($row['agent_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/agent/$row[agent_img]'/>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image"/>';
                   }
                   if($_SESSION['role']==1){
                 echo "</td>
                  
                <td><a type='button' href=agentupdate.php?id=$row[land_agent_id] class='btn nav-link'><i class='fa-regular fa-pen-to-square fa-xl'></i></a></td>
                <td><a class='btn ' href=agentdelete.php?id=$row[land_agent_id]><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a></td>
            <tr>
            
            
            
            ";}
        };
    
        echo "</table>";
    } else {
        echo "No data found.";
    }
?>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Agent Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            $sql = "SELECT * FROM land_agent"; 
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
<?php
    echo $id=$row['land_agent_id'];
    $sql = "SELECT * FROM land_agent where land_agent_id = $id"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<div class=" container bg">
<div class="col-md-12 ">
  <form method="post" class="col-md-12 bg-light mt-3 pdiv" enctype="multipart/form-data">
  <div class="p-3"> 
  <div >
      <label for="land" class="form-label mt-3">Agent Name</label>
      <input type="text" class="form-control mb-1 in" id="land" name="aname" value="<?= $row['land_agent_name']?>">
      <input type="hidden" class="form-control mb-1 in" id="land" name="id" value="<?= $row['land_agent_id']?>">
    </div>
    <div >
      <label for="larea" class="form-label">Agent Location</label>
      <input type="text" class="form-control mb-1 in" id="larea" name="aarea" value="<?= $row['land_agent_location']?>">
    </div>
    <div >
      <label for="larea" class="form-label">Agent Contact</label>
      <input type="text" class="form-control mb-1 in" id="larea" name="acontact" value="<?= $row['land_agent_contact']?>">
    </div>
    <div>
      <label for="formFile" class="form-label">Upload Land Photos</label>
      <input class="form-control" type="file" id="formFile" name="pic">
  </div>
    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
  </form>
</div>
</div>
</div>
</div>

<?php
if(isset($_POST['sub'])){
    $id = $_POST['id'];
  $aname=$_POST['aname'];
  $aarea=$_POST['aarea'];
  $acontact=$_POST['acontact'];
  $image=$_FILES['pic'];

$sql = "UPDATE land_agent SET land_agent_name='$aname', land_agent_location='$aarea' , land_agent_contact='$acontact'
WHERE land_agent_id=$id";
if ($conn->query($sql) === TRUE) {
      header('Location: agent.php');
    }else{
      echo "User image update failed.";
    }

    if($image['name']!=''){
        $imageName='user_'.time().'_'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    
        $updateImg="UPDATE land_agent SET agent_img='$imageName' WHERE land_agent_id='$id'";
        if($conn->query($updateImg) === TRUE){
          move_uploaded_file($image['tmp_name'],'../../dist/images/agent/'.$imageName);
          header('Location: agent.php');
        }else{
          echo "User image update failed.";
        }
      }
    } else {

}
?>
      </div>
    </div>
  </div>
</div>