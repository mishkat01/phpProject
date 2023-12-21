<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 table-responsive p-3">
<?php 
    $sql = "SELECT * FROM instalment 
    join ins_type on ins_type.ins_id = instalment.ins_per
    join land_agent on land_agent.land_agent_id = instalment.agent";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Appilier Name</th> 
                    <th>Total Payment</th>
                    <th>Percentage</th>
                    <th>Monthly(Per Month)</th>
                    <th>Total</th>
                    <th>Agent</th>
                    <th>Appilication Form</th>
                    <th>date</th>
                    <th colspan='2'>Action</th>

                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['appname']?></td>
                <td><?=$row['downp']?></td>
                <td value="<?=$row['ins_id']?>"><?=$row['ins_name']?></td>

                <td>
                  <?php echo $a=(($row['ins_rate'] * $row['downp'])*$row['ins_month'])/ $row['ins_month'];?> + 
                  <?php $c = $row['downp']/$row['ins_month'] ;
                        echo $d = number_format($c, 2);
                  ?>
                  
                  =
                  <?php $b = $a+ $row['downp']/$row['ins_month'];
                    echo $e = number_format($b, 2);
                  ?>
              </td>
    

                <td><?php echo $a*$row['ins_month']?></td>

                <td value="<?=$row['land_agent_id']?>"><?=$row['land_agent_name']?></td>

                <td>
                     <?php if($row['from_pic']!=''){ 
                    echo "<img height='50' src='../../dist/images/land/$row[from_pic]'>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image">';
                   }
                   ?>
                </td>
                
                <td><?=$row['apply_date']?></td>
                <?php if($_SESSION['id']==$row['land_agent_id']){?>
                <td>
                  <a class='btn nav-link' href='updatedata.php?id=<?=$row['instal_id']?>'>
                  <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                   </td>
                
                <td>
                  <a class='btn nav-link' href='Delete.php?id=<?=$row['instal_id']?>'>
                  <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                </td>
                <?php } ?>
                <?php if($_SESSION['role']==1){?>
                <!-- <td>
                  <a class='btn nav-link' href='updatedata.php?id=<?=$row['instal_id']?>'>
                  <i class='fa-regular fa-pen-to-square fa-xl'></i></a>
                   </td>
                
                <td>
                  <a class='btn nav-link' href='Delete.php?id=<?=$row['instal_id']?>'>
                  <i class='fa-solid fa-trash fa-xl' style='color: #ff0000;'></i></a>
                </td> -->
                <?php } ?>
                
            <tr>
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>