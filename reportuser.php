<?php

require_once "database/config.php";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=umpcommunityreport.csv');

$output = fopen('php://output', 'w');
$query = "SELECT USER_NAME, USER_MATRIC, USER_EMAIL, USER_PHONE, USER_DEPT, USER_POINT FROM user ORDER BY USER_POINT DESC";

fputcsv($output, array('USER_NAME', 'USER_MATRIC', 'USER_EMAIL', 'USER_PHONE', 'USER_DEPT', 'USER_POINT'));

$rows = mysqli_query($link, $query);

while($row = mysqli_fetch_assoc($rows)) 
    fputcsv($output, $row);

?>