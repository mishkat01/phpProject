<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 table-responsive p-3">

<?php 
$id=$_SESSION['loc'];
$agent = $_SESSION['id'];
    $sql = "SELECT p.property_name, p.property_location,p.land_img, p.property_cost, p.ls_id, ls.is_name, ar.area_name,p.agent
    FROM property p
    NATURAL JOIN land_status ls
    JOIN area ar ON p.property_location = ar.area_id
    WHERE p.ls_id = 3 AND ar.area_id = $id AND p.agent=$agent
    ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Property Name</th> 
                    <th>Property Area</th>
                    <th>Selling Price</th>
                    <th>Your Profit</th>
                    <th>Availability</th>
                    <th>Photo</th>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['property_name']?></td>
                <td><?=$row['area_name']?></td>
                <td><?=$row['property_cost']?></td>
                <td><?=$row['property_cost'] * 0.1 ?></td>
                <td><?=$row['is_name']?></td>
                <td>
                     <?php if($row['land_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/land/$row[land_img]'>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }
                   ?>
                
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>
