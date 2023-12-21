<?php include('../../includes/conf.php');

?>
<div class=" p-3">
<?php 

if(isset($_POST["input"])){
  $input = $_POST["input"];
}

$output="";
$limit_per_page = 2;

  $page = "";
  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  }

  $offset = ($page - 1) * $limit_per_page;

  
    $sql = "SELECT *
    FROM property
    NATURAL JOIN land_status
    JOIN area ON property.property_location = area.area_id
    order by property_id DESC
    LIMIT {$offset},{$limit_per_page}
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
                        <a class='btn nav-link' href='proupdatedata.php?id=<?=$row['property_id']?>'>
                        <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                    </td>
                    <!-- <td>
                      <a class='btn nav-link' href='Delete.php?id=<?=$row['property_id']?>'>
                      <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                    </td> -->
                <?php }?>

                <?php if($_SESSION['role'] == 1) { ?>
                    <td>
                        <a class='btn nav-link' href='proupdatedata.php?id=<?=$row['property_id']?>'>
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
        <?php 
                

$sql = "SELECT *
    FROM property
    NATURAL JOIN land_status
    JOIN area ON property.property_location = area.area_id
    ORDER BY property_id DESC";

$records = $conn->query($sql);
$totalRecords = $records->num_rows;

$total_pages = ceil($totalRecords/$limit_per_page);
$output .='<div id="pagination">';

    for($i=1; $i <= $total_pages; $i++){
      if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "";
      }
      $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
    }
    $output .='</div>';

    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>";
  }
?>
