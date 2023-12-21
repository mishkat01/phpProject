<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>

<div class="col-md-10 table-responsive p-3">

<?php 
    $sql = "SELECT * from metarial natural join  suplier natural join  unit_om

    -- // SELECT * FROM metarial
    -- // JOIN suplier ON metarial.sup_id = suplier.sup_id
    -- // JOIN unit_om ON metarial.u_id = unit_om.u_id
    "; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table table-light align-middle text-center table-bordered'>
        <thead>";
        echo "<tr> 
                <th>Metarials Name</th> 
                <th>Quantity</th>
                <th>Unit of Measurement</th>
                <th>Total Cost</th>
                <th>Suplier</th>
                <th>Date</th>
                <th colspan='2'>Action</th>
            </tr>
            </thead>
            "; 
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>
            <tr>
                <td>$row[metarial_name]</td>
                <td>$row[mquantity]</td>
                <td>$row[u_name]</td>
                <td>$row[metarial_price]</td>
                <td>$row[sup_name]</td>
                <td>$row[purse_date]</td>
                <td><a class='btn' href='mupdate.php?id=$row[metarial_id]'> <i class='fa-regular fa-pen-to-square fa-xl'></i> </a></td>
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
