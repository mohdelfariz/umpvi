<?php
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$vehicleplate = $vehicletype = $vehiclebrand = $vehiclecolor = $email = $password = $confirm_password = "";
$vehicleplate_err = $vehicletype_err = $vehiclebrand_err = $vehiclecolor_err = $email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate plate no.
    $vehicleplate = trim($_POST["VEHICLE_PLATE"]);
	if(empty($vehicleplate)){
        $vehicleplate_err = "Please enter valid plate number.";
	} else{
        // Prepare a select statement
        $sql = "SELECT VEHICLE_ID FROM vehicle WHERE VEHICLE_PLATE = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_vehicleplate);
            
            // Set parameters
            $param_vehicleplate = trim($_POST["VEHICLE_PLATE"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $vehicleplate_err = "This vehicle have been registered.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // No need due to radiobox 
    $vehicletype = trim($_POST["VEHICLE_TYPE"]);
	if(empty($vehicletype)){
        $vehicletype_err = "Please choose vehicle type.";
	}
    
    $vehiclebrand = trim($_POST["VEHICLE_BRAND"]);
	if(empty($vehiclebrand)){
        $vehiclebrand_err = "Please enter vehicle brand.";
	}
    
    $vehiclecolor = trim($_POST["VEHICLE_COLOR"]);
	if(empty($vehiclecolor)){
        $vehiclecolor_err = "Please enter vehicle color.";
	}
    
    // Check input errors before inserting in database
    if(empty($vehicleplate_err) && empty($vehicletype_err) && empty($vehiclebrand_err) && empty($vehiclecolor_err)){
        
        // Prepare an insert statement
        $image = $_FILES['image']['name'];
        $target = "images/".basename($image);

        $sql = "INSERT INTO vehicle (VEHICLE_PLATE, VEHICLE_TYPE, VEHICLE_BRAND, VEHICLE_COLOR) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_vehicleplate, $param_vehicletype, $param_vehiclebrand, $param_vehiclecolor);
            
            // Set parameters
			$param_vehicleplate = $vehicleplate;
			$param_vehicletype = $vehicletype;
			$param_vehiclebrand = $vehiclebrand;
			$param_vehiclecolor = $vehiclecolor;
            $param_image = $image;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: userviewsticker.php");
            } else{
				echo mysqli_error($link);
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMPvi Vehicle Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body	{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
	td.big 	{
		line-height: 200%;
		}
	.button {
		font-weight: bold;
		font-size: 120%;
		text-transform: uppercase;
		width: 150px;
		}	
	p {
		font-size: 200%;
		text-transform: uppercase;
	}
    </style>
<?php
	include 'includes/header.php';
?>
</head>
<body>
  
  <table align="center" style="width:80%">
      <td width="60%">
      <div class="container page-styling">
          <div class="header-wrapper">
          <div class="site-name">
              <h1>UMP VEHICLE TRACKING SYSTEM</h1>
          </div>
<?php	
	include 'includes/usernavbar.php';
?>
<center>
    <div class="wrapper">
        <div class="main-title">
		<ul class="grid effect-8" id="grid">
		<h1>Vehicle Registration</h1>
    		</ul>
	</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($vehicleplate_err)) ? 'has-error' : ''; ?>">
                <label>Vehicle Plate Number</label>
                <input type="text" name="VEHICLE_PLATE" class="form-control" value="<?php echo $vehicleplate; ?>">
                <span class="help-block"><?php echo $vehicleplate_err; ?></span>
            </div>  
	        <div class="form-group <?php echo (!empty($vehicletype_err)) ? 'has-error' : ''; ?>">
                <label>Vehicle Type</label>
                <input type="text" name="VEHICLE_TYPE" class="form-control" value="<?php echo $vehicletype; ?>">
                <span class="help-block"><?php echo $vehicletype_err; ?></span>
            </div>  
	        <div class="form-group <?php echo (!empty($vehiclebrand_err)) ? 'has-error' : ''; ?>">
                <label>Vehicle Brand</label>
                <input type="text" name="VEHICLE_BRAND" class="form-control" value="<?php echo $vehiclebrand; ?>">
                <span class="help-block"><?php echo $vehiclebrand_err; ?></span>
            </div> 
	        <div class="form-group <?php echo (!empty($vehiclecolor_err)) ? 'has-error' : ''; ?>">
                <label>Vehicle Color</label>
                <input type="text" name="VEHICLE_COLOR" class="form-control" value="<?php echo $vehiclecolor; ?>">
                <span class="help-block"><?php echo $vehiclecolor_err; ?></span>
            </div> 
            <div class="form-group">
                <label>Vehicle Grant</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>  
	</div>
    </center>
</td>
</table>

</div><!-- /container -->
<?php
	include 'includes/footer.php';
?>
  
</body>
</html>