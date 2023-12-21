<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>

<div class="col-md-10 table-responsive p-3">

<?php 
    $sql = "SELECT * FROM project natural join project_status
    JOIN area ON project.project_location = area.area_id
    "; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-light align-middle text-center table-bordered'>
        <thead>";
        echo "<tr> 
                <th>Name</th> 
                <th>Location</th>
                <th>Project Buget</th>
                <th>Already Spend</th>
                <th>Status</th>

                <th colspan='2'>Action</th>
            </tr>
            </thead>
            "; 
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>
            <tr>
                <td>$row[project_name]</td>
                <td>$row[area_name]</td>
                <td>$row[project_price]</td>
                <td>$row[spened]</td>
                <td>$row[p_status]</td>
                <td><a class='btn' href='pjupdate.php?id=$row[project_id]'><i class='fa-regular fa-pen-to-square fa-xl'></i> </a></td>
                <td><a class='btn' href='pjdelete.php?id=$row[project_id]'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a></td>
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
