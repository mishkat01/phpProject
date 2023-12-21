<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>
<div class="col-md-10 table-responsive p-3">
<?php 
    $sql = "SELECT * FROM suplier 
    natural join metarial"; 

    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>suplier Name</th> 
                    <th>suplier Contatc</th>
                    <th>suplier Email</th>
                    <th>Shop Name </th>
                    <th>Price</th>
                    <th>Total Paid</th>
                    <th>Total Due</th>
                    <th>metarial</th>
                    <th>Date</th>
                    <!-- <th>Photo</th> -->
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['sup_name']?></td>
                <td><?=$row['sup_contact_no']?></td>
                <td><?=$row['sup_email']?></td>
                <td><?= $row['tamount']?></td>
                <td><?= $row['metarial_price']?></td>
                <td><?= $row['tpaid']?></td>
                <td><?php echo ($row['metarial_price'] - $row['tpaid'])?></td>
                <td><?=$row['metarial_name']?></td>
                <td><?=$row['purse_date']?></td>
                <!-- <td>
                     <?php if($row['land_img']!=''){ 
                    // echo "<img height='50' src='../../dist/images/land/$row[land_img]'>";
                   }else{ 
                    //  echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }
                   ?>
                </td> -->
                <td>

                  <a class='btn nav-link' href='supupdatedata.php?id=<?=$row['sup_id']?>'>
                  <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                   </td>
                
                <td>
                  <a class='btn nav-link' href='Delete.php?id=<?=$row['sup_id']?>'>
                  <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                </td>
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>
