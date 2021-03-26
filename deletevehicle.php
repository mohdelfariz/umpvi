<?php
    require_once "database/config.php";

    $id = $_GET['id'];

    $query = "DELETE FROM vehicle WHERE VEHICLE_ID = '$id'";

    $result = mysqli_query($link,$query) or die ("Could not execute query in display.php");

		if($result){
		echo "<script type= 'text/javascript'> window.location='adminsticker.php'</script>";
		}
?>