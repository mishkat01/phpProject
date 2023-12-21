<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 table-responsive">

<?php 
    $sql = "SELECT * FROM metarial"; 
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
                <td>$row[metarial_name]</td>
                <td>$row[metarial_listing]</td>
                <td>$row[metarial_price]</td>
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
                <td><a class='btn' href='mupdate.php?id=$row[metarial_id]' > <i class='fa-regular fa-pen-to-square fa-xl'></i> </a></td>
                <td><a class='btn' href='mdelete.php?id=$row[metarial_id]'><i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a></td>
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
