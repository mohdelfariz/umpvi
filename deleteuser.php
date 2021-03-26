<?php
    require_once "database/config.php";

    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE USER_ID = '$id'";

    $result = mysqli_query($link,$query) or die ("Could not execute query in deleteuser.php");

		if($result){
		echo "<script type= 'text/javascript'> window.location='admincommunity.php'</script>";
		}
?>