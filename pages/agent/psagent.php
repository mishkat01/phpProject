<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 p-3 table-responsive tb">
<?php 
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM land_agent 
    JOIN area ON land_agent.land_agent_location = area.area_id
    where land_agent_id = $id"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<div class="container d-flex justify-content-center text-center rak align-items-center">
    <div class="col-md-6 vh-50">
        
        <h1>
            welcome Mr. <?= $row['land_agent_name']?> <br>
            <?php
                date_default_timezone_set('UTC');
                $offset = 6; 
                $utc_time = time() + ($offset * 3600);

                $formatted_time = gmdate('h:i A', $utc_time); 
                $formatted_date = gmdate('F j, Y', $utc_time); 

                echo " It's : $formatted_time\n <br>"; 
                echo " TodaY: $formatted_date\n";
            ?>

        </h1>
    </div>

    <div class="col-md-6">
    <?php 
        $sql = "SELECT p.property_name, p.property_location,p.land_img, p.property_cost, p.ls_id, ls.is_name, ar.area_name
        FROM property p
        NATURAL JOIN land_status ls
        JOIN area ar ON p.property_location = ar.area_id
        WHERE p.ls_id = 3
        ";
        $result = $conn->query($sql);
        $rows = $result->fetch_assoc()
    ?>
        <div class="card" style="width: 18rem;">
        <?php 
                                if($row['agent_img']!=''){ 
                                    echo "<img class='img-fluid rounded-start' height='250' src='../../dist/images/agent/$row[agent_img]'/>";
                                }else{ 
                                    echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image"/>';
                                }
                        ?>
        <div class="card-body">
            <h5 class="card-title">Agent Details</h5>
            <p class="card-text">
                Name : <?= $row['land_agent_name']?><br>
                Contact : <?= $row['land_agent_contact']?><br>
                Agent Area : <?= $row['area_name']?>
                
        </p>
        </div>
        
        <div class="card-body">
        <p>Avaiable Booking And Property</p>
            <a class="btn btn-success" href="../property/avaiablepro.php" class="card-link">Property</a>
            <a class="btn btn-success" href="../booking/adminbook.php" class="card-link">Booking</a>
        </div>
        </div>
        </div>
</div>




       
                <!-- <td><a type='button' href=agentupdate.php?id=$row[land_agent_id] class='btn nav-link'><i class='fa-regular fa-pen-to-square fa-xl'></i></a></td>
                <td><a class='btn ' href=agentdelete.php?id=$row[land_agent_id]><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a></td> -->

