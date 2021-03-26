<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Sticker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
		table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #dddddd;
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even) {
	  background-color: #dddddd;
	}
	
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
	  background-color: skyblue ;
	  color: Black;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}
	
	input[type=reset] {
	  width: 100%;
	  background-color: skyblue ;
	  color: black;
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
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li><a href="adminhome.php">Dashboard</a></li>
		<li><a href="admincommunity.php">UMP Community</a></li>
		<li class="active"><a href="adminsticker.php">Vehicle Stickers</a></li>
		<li><a href="adminpenalty.php">Penalty</a></li>
		<li><a href="core/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" style="background-color:skyblue ">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>UMPvi Admin Panel</h2>
      <ul class="nav nav-pills nav-stacked">
		<li><a href="adminhome.php">Dashboard</a></li>
		<li><a href="admincommunity.php">UMP Community</a></li>
		<li class="active"><a href="adminsticker.php">Vehicle Stickers</a></li>
		<li><a href="adminpenalty.php">Penalty</a></li>
		<li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
	<div class="col-sm-9"   style="background-color:skyblue ">
      <div class="well">
        <h1>Vehicle Stickers</h1>
      </div>

        <div class="col-sm-13">
          <div class="well"  ">
            <h4>Total of Registered Vehicle</h4>
			<?php
			session_start();

			include("database/config.php");
			
			$sql = "SELECT * FROM vehicle WHERE VEHICLE_STATUS = '1'";
		 
			$mysqliStatus = $link->query($sql);
		 
			$rows_count_value = mysqli_num_rows($mysqliStatus);
		 
			echo "". $rows_count_value; 
		 	?>
          </div>
        </div>

        <div class="col-sm-13">
          <div class="well">
		  <h2>All Vehicle</h2><br>

		  <table>
				<tr>
					<th>Plate No.</th>
					<th>Type</th>
					<th>Brand</th>
                    <th>Color</th>
                    <th>Vehicle Grant</th>
                    <th>Action</th>
                    
				</tr>
            <?php

				$query = "SELECT * FROM vehicle WHERE VEHICLE_STATUS = '1'";
				$result = mysqli_query($link,$query);
				
				if (mysqli_num_rows($result) > 0){
					// output data of each row
					while($row = mysqli_fetch_array($result)){
					$VEHICLE_ID = $row["VEHICLE_ID"];
					$VEHICLE_PLATE = $row["VEHICLE_PLATE"];
					$VEHICLE_TYPE = $row["VEHICLE_TYPE"];
					$VEHICLE_BRAND = $row["VEHICLE_BRAND"];
					$VEHICLE_COLOR = $row["VEHICLE_COLOR"];
					
					echo "<tr>
					<td>" . $VEHICLE_PLATE. "</td>
					<td>" . $VEHICLE_TYPE. "</td>
					<td>" . $VEHICLE_BRAND. "</td>
                    <td>" . $VEHICLE_COLOR. "</td>
                    <td><button><a href=images/>Show Image</a></button></td>
					<td><button><a href=adminupdatevehicle.php?id=".$row['VEHICLE_ID'].">Update</a></button>
					<button><a href=deletevehicle.php?id=".$row['VEHICLE_ID'].">Delete</a></button></td>";		
					}
				}else{
					echo "<tr>
					<td colspan=6>
					0 results
					</td>
					</tr>";
				}

				?>
				</table>
          </div>

		  <div class="col-sm-13">
          <div class="well">
		  <h2>Vehicle Stickers Approval</h2><br>

		  	<table>
				<tr>
					<th>Plate No.</th>
					<th>Type</th>
					<th>Brand</th>
					<th>Color</th>
					<th>Vehicle Grant</th>
					<th>Action</th>
				</tr>
            <?php

				$query = "SELECT * FROM vehicle WHERE VEHICLE_STATUS = '0'";
				$result = mysqli_query($link,$query);
				
				if (mysqli_num_rows($result) > 0){
					// output data of each row
					while($row = mysqli_fetch_array($result)){
					$VEHICLE_ID = $row["VEHICLE_ID"];
					$VEHICLE_PLATE = $row["VEHICLE_PLATE"];
					$VEHICLE_TYPE = $row["VEHICLE_TYPE"];
					$VEHICLE_BRAND = $row["VEHICLE_BRAND"];
					$VEHICLE_COLOR = $row["VEHICLE_COLOR"];
					
					echo "<tr>
					<td>" . $VEHICLE_PLATE. "</td>
					<td>" . $VEHICLE_TYPE. "</td>
					<td>" . $VEHICLE_BRAND. "</td>
                    <td>" . $VEHICLE_COLOR. "</td>
                    <td><button><a href=images/>Show Image</a></button></td>
					<td><button><a href=approvesticker.php?id=".$row['VEHICLE_ID'].">Approve</a></button>
					<button><a href=deletevehicle.php?id=".$row['VEHICLE_ID'].">Delete</a></button></td>";		
					}
				}else{
					echo "<tr>
					<td colspan=6>
					No result
					</td>
					</tr>";
				}
				$link->close();
				?>
				</table>
          </div>

    </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>