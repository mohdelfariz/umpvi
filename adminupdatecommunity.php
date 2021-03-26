<?php
session_start();

include("database/config.php");

$idURL = $_GET['id'];

$query = "SELECT * FROM user WHERE USER_ID = '$idURL'";
$result = mysqli_query($link,$query) or die ("Could not execute query in adminupdatecommunity.php");

if (mysqli_num_rows($result) > 0){
	// output data of each row
	while($row = mysqli_fetch_array($result)){
		$USER_NAME = trim($row['USER_NAME']);
		$USER_MATRIC = $row['USER_MATRIC'];
		$USER_EMAIL = $row['USER_EMAIL'];
		$USER_PASSWORD = $row['USER_PASSWORD'];
		$USER_PHONE = $row['USER_PHONE'];
        $USER_DEPT = $row['USER_DEPT'];
        $USER_POINT = $row['USER_POINT'];
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

<script>
    function myfunction(){
        alert("Record updated successfully.");
    }
    </script>
		<div class="col-sm-12">
          <div class="well">
		  <h2>Update UMP Community</h2><br>
		  <table>
            <form method="post" action="updatecommunity.php?id=<?php echo $idURL ?>">
				<label for="USER_NAME">Full Name</label>
				<input type="text" name="USER_NAME" value=<?php echo $USER_NAME?>><br>

				<label for="USER_MATRIC">Matric ID</label>
				<input type="text" name="USER_MATRIC" value=<?php echo $USER_MATRIC?>><br>

				<label for="USER_EMAIL">Email Address</label>
				<input type="text" name="USER_EMAIL" value=<?php echo $USER_EMAIL?> disable><br>

				<label for="USER_PASSWORD">Password</label>
				<input type="text" name="USER_PASSWORD" value=<?php echo $USER_PASSWORD?> readonly><br>
				
				<label for="USER_PHONE">Phone No.</label>
				<input type="text" name="USER_PHONE" value=<?php echo $USER_PHONE?>><br>
				
				<label for="USER_DEPT">Department</label>
                <input type="text" name="USER_DEPT" value=<?php echo $USER_DEPT?>><br>
                
                <label for="USER_POINT">Current Point</label>
				<input type="text" name="USER_POINT" value=<?php echo $USER_POINT?>><br>
			  
				<input type="submit" name="Submit" value="Save" onclick="myfunction()">
                <input type="submit" value="Back" onclick="history.back()">
                
				<br>
				<br>
				</form>
			</table>
          </div>
        </div>
</body>
</html>
		