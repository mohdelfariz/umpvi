<?php
require_once "database/config.php";

extract ($_POST);
$id = $_GET['id'];

$query = "UPDATE user SET USER_POINT = '$USER_POINT' WHERE USER_MATRIC = '$id'";

$result = mysqli_query($link,$query) or die ("Could not execute query in edit.php");

if($result){
 echo "<script type = 'text/javascript'> window.location='adminpenalty.php' </script>";
}

?>