<?php

require_once "database/config.php";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=pendingpenaltyreport.csv');

$output = fopen('php://output', 'w');
$query = "SELECT STICKER_ID, USER_MATRIC, VEHICLE_PLATE, PENALTY_TIME, PENALTY_DATE, PENALTY_DETAILS, POINT_ID FROM penalty WHERE PENALTY_STATUS = '0'";

fputcsv($output, array('STICKER_ID', 'USER_MATRIC', 'VEHICLE_PLATE', 'PENALTY_TIME', 'PENALTY_DATE', 'PENALTY_DETAILS', 'POINT_DEDUCTED'));

$rows = mysqli_query($link, $query);

while($row = mysqli_fetch_assoc($rows)) 
    fputcsv($output, $row);

?>