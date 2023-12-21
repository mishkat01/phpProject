<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 table-responsive p-3">

<?php 
    $sql = "SELECT * FROM project"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-light align-middle text-center table-bordered'>
        <thead>";
        echo "<tr> 
                <th>Name</th> 
                <th>Location</th>
                <th>Price</th>
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
                <td>$row[project_name]</td>
                <td>$row[project_location]</td>
                <td>$row[project_price]</td>
                <td>....</td>
                <td>....</td>
                <td>";
                //      if($row['land_img']!=''){ 
                //     echo "<img height='50' src='../../dist/images/land/$row[land_img]'>";
                //    }else{ 
                //      echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                //    }

                 echo 
                "</td>
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
