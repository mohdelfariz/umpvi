<?php
session_start();

include("database/config.php");

$idURL = $_GET['id'];

$query = "SELECT * FROM vehicle WHERE VEHICLE_ID = '$idURL'";
$result = mysqli_query($link,$query) or die ("Could not execute query in adminupdatevehicle.php");

if (mysqli_num_rows($result) > 0){
	// output data of each row
	while($row = mysqli_fetch_array($result)){
		$VEHICLE_PLATE = $row['VEHICLE_PLATE'];
		$VEHICLE_TYPE = $row['VEHICLE_TYPE'];
		$VEHICLE_BRAND = $row['VEHICLE_BRAND'];
		$VEHICLE_COLOR = $row['VEHICLE_COLOR'];
		$VEHICLE_STATUS = $row['VEHICLE_STATUS'];
	}
}



//@mysql_free_result($result);
?><!DOCTYPE html>
<html>
<style>
	input[type=text], select {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	input[type=submit] {
	  width: 100%;
	  background-color: black ;
	  color: White;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}
	
	input[type=reset] {
	  width: 100%;
	  background-color: Black ;
	  color: White;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	input[type=submit]:hover {
	  background-color: grey;
	}
	input[type=reset]:hover {
	  background-color: grey;
	}
</style>
<body  style="background-color:skyblue">
		<div class="col-sm-12">
          <div class="well">
		  <h2>Update Vehicle</h2><br>
		  <table>
            <form method="post" action="updatevehicle.php?id=<?php echo $idURL ?>">
				<label for="VEHICLE_PLATE">Vehicle Plate No.</label>
				<input type="text" name="VEHICLE_PLATE" value=<?php echo $VEHICLE_PLATE?>><br>

				<label for="VEHICLE_TYPE">Type</label>
				<input type="text" name="VEHICLE_TYPE" value=<?php echo $VEHICLE_TYPE?>><br>

				<label for="VEHICLE_BRAND">Brand</label>
				<input type="text" name="VEHICLE_BRAND" value=<?php echo $VEHICLE_BRAND?>>

				<label for="VEHICLE_COLOR">Color</label>
				<input type="text" name="VEHICLE_COLOR" value=<?php echo $VEHICLE_COLOR?>>
			  
				<input type="submit" name="Save" value="Submit" onclick="myfunction()">
				<input type="submit" value="Back" onclick="history.back()">
				<br>
				<br>
				</form>
			</table>
          </div>
        </div>

<script>
    function myfunction(){
        alert("Record updated successfully.");
    }
</script>
</body>
</html>
		