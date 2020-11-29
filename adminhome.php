<?php

session_start();
      
include("database/config.php");
//connect to database

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
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
      <a class="navbar-brand" href="#">UMPvi</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		    <li class="active"><a href="adminhome.php">Dashboard</a></li>
        <li><a href="admincommunity.php">UMP Community</a></li>
        <li><a href="adminsticker.php">Vehicle Stickers</a></li>
        <li><a href="adminpenalty.php">Penalty</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" style="background-color:skyblue;">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>UMPvi Admin Panel</h2>
      <ul class="nav nav-pills nav-stacked">
		    <li class="active"><a href="adminhome.php">Dashboard</a></li>
        <li><a href="admincommunity.php">UMP Community</a></li>
        <li><a href="adminsticker.php">Vehicle Stickers</a></li>
        <li><a href="adminpenalty.php">Penalty</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9" style="background-color:skyblue ">
      <div class="well">
        <h1>Welcome, Administrator!</h1>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Total UMP Community</h4>
			<?php
			$sql = "SELECT * FROM user";
		 
			$mysqliStatus = $link->query($sql);
		 
			$rows_count_value = mysqli_num_rows($mysqliStatus);
		 
			echo "". $rows_count_value; 
		  ?>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Registered Vehicle</h4>
      <?php
			$sql = "SELECT * FROM vehicle WHERE VEHICLE_STATUS = '1'";
		 
			$mysqliStatus = $link->query($sql);
		 
			$rows_count_value = mysqli_num_rows($mysqliStatus);
		 
			echo "". $rows_count_value; 
		  ?>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pending Registration</h4>
      <?php
			$sql = "SELECT * FROM vehicle WHERE VEHICLE_STATUS = '0'";
		 
			$mysqliStatus = $link->query($sql);
		 
			$rows_count_value = mysqli_num_rows($mysqliStatus);
		 
			echo "". $rows_count_value; 
		  ?>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Penalties Issued</h4>
      <?php
			$sql = "SELECT * FROM penalty";
		 
			$mysqliStatus = $link->query($sql);
		 
			$rows_count_value = mysqli_num_rows($mysqliStatus);
		 
			echo "". $rows_count_value; 
		  ?>
          </div>
        </div>
      </div>
      

      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Download Report</h4>
            <ul class="nav nav-pills nav-stacked">
            <li><a href="reportuser.php"> Registered UMP Community</a></li>
            <li><a href="reportvehicle.php"> Registered Vehicle</a></li>
            <li><a href="reportpenalty.php"> Paid Penalty</a></li>
            <li><a href="reportpendingpenalty.php"> Pending Penalty</a></li>

      
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

</body>
</html>
