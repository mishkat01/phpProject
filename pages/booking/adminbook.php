<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 table-responsive p-3">
<?php 
    $id=$_SESSION['loc'];
    $sql = "SELECT *
            FROM booking
                NATURAL JOIN booking_type
                JOIN property ON property.property_id = booking.property_id
                JOIN payment ON payment.pay_id = booking.payment
            WHERE payment = 2 AND booking_area = $id;
    
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
                    <th>Contact</th>
                    <th>Payment</th>
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
                <td><?=$row['Customar_con']?></td>
                <td><?=$row['payname']?></td>
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php } else{
            echo "<h1>No Property avaiable for You right Now</h1>";
        }
                
        ?>