<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>
<style>
    .scrl{
        overflow:auto;
        height:100vh;
        overflow-y: scroll;
    }
    .scrl::-webkit-scrollbar {
        display: none;
    }

    .scrl {
    -ms-overflow-style: none; 
    scrollbar-width: none; 
    }
</style>
<div class="col-md-10 p-3 table-responsive tb scrl">
    <h1 class="text-center">Agents Details</h1>
<?php 
    $sql = "SELECT * FROM land_agent 
    JOIN area ON land_agent.land_agent_location = area.area_id"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class= 'table table-light border align-middle text-center table-bordered tabel-responsive'; >";
        echo "<tr> 
                <th class='col'>Name</th> 
                <th class='col'>Area</th>
                <th class='col'>Contact</th>
                <th class='col'>Agent Photo</th>";
            echo "</tr>"; 
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>$row[land_agent_name]</td>
                <td>$row[area_name]</td>
                <td>$row[land_agent_contact]</td>
                <td>";
                     if($row['agent_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/agent/$row[agent_img]'/>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image"/>';
                   }
                   if($_SESSION['role']==1){
                 echo "</td>
            <tr>
            
            
            
            ";}
        };
    
        echo "</table>";
    } else {
        echo "No data found.";
    }
?>
<h1 class="text-center m-5">Developers Details</h1>
<?php 
    $sql = "SELECT * FROM p_contactor 
    JOIN area ON p_contactor.land_agent_location = area.area_id"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class= 'table table-light border align-middle text-center table-bordered tabel-responsive'; >";
        echo "<tr> 
                <th class='col'>Developer Name</th> 
                <th class='col'>Developer Area</th>
                <th class='col'>Developer Contact</th>
                <th class='col'>Developer Photo</th>
            </tr>"; 
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>$row[land_agent_name]</td>
                <td>$row[area_name]</td>
                <td>$row[land_agent_contact]</td>
                <td>";
                     if($row['agent_img']!=''){ 
                    echo "<img height='50' src='../../dist/images/agent/$row[agent_img]'/>";
                   }else{ 
                     echo '<img height="50" src="../../dist/images/pic/avatar.png" alt="Image"/>';
                   }

                 echo "</td>
            <tr>
            
            
            
            ";
        };
    
        echo "</table>";
    } else {
        echo "No data found.";
    }
    ?>
<h1 class="text-center m-5">Suplier Details</h1>
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
                <td><?= $row['tpaids']?></td>
                <td><?php echo ($row['metarial_price'] - $row['tpaids'])?></td>
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
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>
