<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div class="col-md-10 table-responsive p-3">

<?php 
    $sql = "SELECT *, DATEDIFF(CURDATE(), project.date_column) AS days_gone,
    PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM CURDATE()), EXTRACT(YEAR_MONTH FROM project.date_column)) AS months_gone,
    FLOOR(DATEDIFF(CURDATE(), project.date_column) / 365) AS years_gone
    FROM project
    JOIN project_status ON project.ps_id = project_status.ps_id
    JOIN p_contactor ON p_contactor.land_agent_location = project.project_location
    JOIN area ON project.project_location = area.area_id
    WHERE project.ps_id = 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-light align-middle text-center table-bordered'>
        <thead>";
        echo "<tr> 
                <th>Name</th> 
                <th>Location</th>
                <th>Project Buget</th>
                <th>Already Spend</th>
                <th>Contactor</th>
                <th>Status</th>
                <th>Days Gone</th>
            </tr>
            </thead>
            "; 
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>
            <tr>
                <td>$row[project_name]</td>
                <td>$row[area_name]</td>
                <td>$row[project_price]</td>
                <td>$row[spened]</td>
                <td>$row[land_agent_name]</td>
                <td>$row[p_status]</td>
                <td>$row[days_gone] Days <br>$row[months_gone] Months<br> $row[years_gone] Years</td>
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