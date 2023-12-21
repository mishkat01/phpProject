<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 table-responsive p-3">
<?php 
    $sql = "SELECT * FROM land natural JOIN land_agent Natural JOIN land_status"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-light align-middle text-center table-bordered'>
        <thead>";
        echo "<tr> 
                <th>Name</th> 
                <th>Area</th>
                <th>Cost</th>
                <th>Agent</th>
                <th>Status</th>
                <th>Photo</th>
                <th colspan='2'>Action</th>
            </tr>
            </thead>
            "; 
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>
            <tr>
                <td>$row[land_name]</td>
                <td>$row[land_area]</td>
                <td>$row[land_cost]</td>
                <td>$row[land_agent_name]</td>
                <td>$row[is_name]</td>
                <td>";
                     if($row['land_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/land/$row[land_img]'>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }

                 echo 
                "</td>
                <td><a class='btn nav-link' href='updatedata.php?id=$row[land_id]' > <i class='fa-regular fa-pen-to-square fa-xl'></i> </a></td>
                <td><a class='btn nav-link' href='Delete.php?id=$row[land_id]'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a></td>
            <tr>
            
            
            </tbody>
            ";
        }
    
        echo "</table>";
    } else {
        echo "No data found.";
    }
?>
</div>