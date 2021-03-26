<?php
    require_once "database/config.php";

    $id = $_GET['id'];
    $point = "SELECT POINT_ID FROM penalty WHERE USER_MATRIC = '$id'";

    $query = "UPDATE FROM user SET USER_POINT = '$point' WHERE USER_MATRIC LIKE '%$id'";

    $result = mysqli_query($link,$query) or die ("Could not execute query in deleteuser.php");

		if($result){
		echo "<script type= 'text/javascript'> window.location='admincommunity.php'</script>";
		}
?>