<?php
require_once "database/config.php";

extract ($_POST);
$id = $_GET['id'];

$query = "UPDATE vehicle SET VEHICLE_PLATE = '$VEHICLE_PLATE', VEHICLE_TYPE = '$VEHICLE_TYPE', VEHICLE_BRAND = '$VEHICLE_BRAND', VEHICLE_COLOR = '$VEHICLE_COLOR' WHERE VEHICLE_ID = '$id'";

$result = mysqli_query($link,$query) or die ("Could not execute query in updatevehicle.php");

if($result){
 echo "<script type = 'text/javascript'> window.location='adminsticker.php' </script>";
}

?>