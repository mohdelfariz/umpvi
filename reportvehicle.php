<?php

require_once "database/config.php";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=vehiclereport.csv');

$output = fopen('php://output', 'w');
$query = "SELECT VEHICLE_PLATE, VEHICLE_TYPE, VEHICLE_BRAND, VEHICLE_COLOR FROM vehicle WHERE VEHICLE_STATUS = '1'";

fputcsv($output, array('VEHICLE_PLATE', 'VEHICLE_TYPE', 'VEHICLE_BRAND', 'VEHICLE_COLOR'));

$rows = mysqli_query($link, $query);

while($row = mysqli_fetch_assoc($rows)) 
    fputcsv($output, $row);

?>