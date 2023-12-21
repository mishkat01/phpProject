<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 p-3 table-responsive tb">
<?php 
    $sql = "SELECT * FROM p_contactor 
    JOIN area ON p_contactor.land_agent_location = area.area_id"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class= 'table table-light border align-middle text-center table-bordered tabel-responsive'; >";
        echo "<tr> 
                <th class='col'>Developer Name</th> 
                <th class='col'>Developer Area</th>
                <th class='col'>Developer Contact</th>
                <th class='col'>Developer Photo</th>
                <th class='col' colspan=3>Action</th>
            </tr>"; 
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

                 echo "</td>
                <td><a type='button' href=devupdate.php?id=$row[land_agent_id] class='btn nav-link'><i class='fa-regular fa-pen-to-square fa-xl'></i></a></td>
                <td><a class='btn ' href=devdelete.php?id=$row[land_agent_id]><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a></td>
            <tr>
            
            
            
            ";
        };
    
        echo "</table>";
    } else {
        echo "No data found.";
    }
?>
</div>