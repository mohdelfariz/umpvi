<?php
require_once "database/config.php";

extract ($_POST);
$id = $_GET['id'];

$query = "UPDATE user SET USER_NAME = '$USER_NAME', USER_MATRIC = '$USER_MATRIC', USER_EMAIL = '$USER_EMAIL', USER_PASSWORD = '$USER_PASSWORD', USER_PHONE = '$USER_PHONE', USER_DEPT = '$USER_DEPT', USER_POINT = '$USER_POINT' WHERE USER_ID = '$id'";

$result = mysqli_query($link,$query) or die ("Could not execute query in edit.php");

if($result){
 echo "<script type = 'text/javascript'> window.location='admincommunity.php' </script>";
}

?>