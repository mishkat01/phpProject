<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 table-responsive p-3">
<?php 
    $sql = "SELECT * FROM booking  
    JOIN booking_type on booking_type.bt_id = booking.bt_id
    JOIN property ON property.property_id = booking.property_id
    JOIN payment ON payment.pay_id = booking.payment 
    ORDER BY booking.bking_id DESC
    "; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Customar Name</th> 
                    <th>Address</th>
                    <th>Buget</th>
                    <th>Apratment</th>
                    <th>Booking Type</th>
                    <th>Payment</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['bkng_name']?></td>
                <td><?=$row['bkng_area']?></td>
                <td><?=$row['bkng_cost']?></td>
                <td><?=$row['property_name']?></td>
                <td><?=$row['btype']?></td>
                <td><?=$row['payname']?></td>

                <?php if($_SESSION['loc'] == $row['booking_area']) { ?>
                    
                    <td>
                    <a class='btn nav-link' href='updatedata.php?id=<?=$row['bking_id']?>'>
                    <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                    </td>
                    
                    <td>
                    <a class='btn nav-link' href='Delete.php?id=<?=$row['bking_id']?>'>
                    <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                    </td>

                 <?php }?>

                 <?php if($_SESSION['role'] == 1) { ?>
                    <td>
                    <a class='btn nav-link' href='updatedata.php?id=<?=$row['bking_id']?>'>
                    <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                    </td>
                    
                    <td>
                    <a class='btn nav-link' href='Delete.php?id=<?=$row['bking_id']?>'>
                    <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                    </td>

                 <?php }?>
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>