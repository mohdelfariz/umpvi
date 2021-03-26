<?php
    require_once "database/config.php";

    $id= $_GET['id'];

    $query = "UPDATE penalty SET PENALTY_STATUS = '1' WHERE PENALTY_ID = '$id'";

    $result = mysqli_query($link,$query) or die ("Could not execute query in paidpenalty.php");

		if($result){
		echo "<script type= 'text/javascript'> window.location='adminpenalty.php'</script>";
		}
?>