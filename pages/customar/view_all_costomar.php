<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 table-responsive p-3">
<?php 
    $sql = "SELECT * FROM customer join land_status on land_status.ls_id = customer.status"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Customer Name</th> 
                    <th>Customer Email</th>
                    <th>Customer Contact</th>
                    <th>National Id</th>
                    <th>Total Amount</th>
                    <th>Availability</th>
                    <th>Photo</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['customer_name']?></td>
                <td><?=$row['customer_email']?></td>
                <td><?=$row['customer_contact']?></td>
                <td><?=$row['national_id']?></td>
                <td><?=$row['total_amount']?></td>
                <td><?=$row['is_name']?></td>
                <td>
                     <?php if($row['customer_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/land/$row[customer_img]'>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }
                   ?>
                </td>
                <td>

                  <a class='btn nav-link' href='update_customer.php?id=<?=$row['customer_id']?>'>
                  <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                   </td>
                
                <td>
                  <a class='btn nav-link' href='Delete.php?id=<?=$row['customer_id']?>'>
                  <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                </td>
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>
