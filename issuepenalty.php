<?php
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$STICKER_ID = $USER_MATRIC = $VEHICLE_PLATE = $PENALTY_TIME = $PENALTY_DATE = $PENALTY_DETAILS = $POINT_ID = $ADMIN_USERNAME = $ADMIN_PASSWORD = "";
$STICKER_IDerr = $USER_MATRICerr = $VEHICLE_PLATEerr = $PENALTY_TIMEerr = $PENALTY_DATEerr = $PENALTY_DETAILSerr = $POINT_IDerr = $ADMIN_USERNAMEerr = $ADMIN_PASSWORDerr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    $STICKER_ID = trim($_POST["STICKER_ID"]);
	if(empty($STICKER_ID)){
        $STICKER_IDerr = "Please enter valid sticker ID.";
	}
        
    $VEHICLE_PLATE = trim($_POST["VEHICLE_PLATE"]);
	if(empty($VEHICLE_PLATE)){
        $VEHICLE_PLATEerr = "Please enter vehicle plate no.";
    }
    
    $USER_MATRIC = trim($_POST["USER_MATRIC"]);
	if(empty($USER_MATRIC)){
        $USER_MATRICerr = "Please enter owner matric no.";
	}

    $PENALTY_TIME = trim($_POST["PENALTY_TIME"]);
	if(empty($PENALTY_TIME)){
        $PENALTY_TIMEerr = "Please enter current time.";
	}
    
    $PENALTY_DATE = trim($_POST["PENALTY_DATE"]);
	if(empty($PENALTY_DATE)){
        $PENALTY_DATEerr = "Please enter today's date.";
	}
    
    $PENALTY_DETAILS = trim($_POST["PENALTY_DETAILS"]);
    if(empty($PENALTY_DETAILS)){
        $PENALTY_DETAILSerr = "Please enter valid email.";
    } 

    $POINT_ID = trim($_POST["POINT_ID"]);
	if(empty($POINT_ID)){
        $POINT_IDerr = "Please enter point ID.";
	}
    
    $ADMIN_USERNAME = trim($_POST["ADMIN_USERNAME"]);
    if(empty($ADMIN_USERNAME)){
        $ADMIN_USERNAMEerr = "Please enter admin username";
    } else{
        // Prepare a select statement
        $sql = "SELECT ADMIN_ID FROM admin WHERE USERNAME = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["ADMIN_USERNAME"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 0){
                    $ADMIN_USERNAMEerr = "There are no administrator with this username!";
                } 
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
}

    // Validate password
    $ADMIN_PASSWORD = trim($_POST["ADMIN_PASSWORD"]);
    if(empty($ADMIN_PASSWORD)){
        $ADMIN_PASSWORDerr = "Please enter a password.";     
    } elseif(strlen(trim($_POST["ADMIN_PASSWORD"])) < 6){
        $ADMIN_PASSWORDerr = "Password must have atleast 6 characters.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ADMIN_ID FROM admin WHERE PASSWORD = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_password);
            
            // Set parameters
            $param_password = trim($_POST["ADMIN_PASSWORD"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 0){
                    $ADMIN_PASSWORDerr = "Wrong password!";
                } 
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
}
    
    
    // Check input errors before inserting in database
    if(empty($STICKER_IDerr) && empty($USER_MATRICerr) && empty($VEHICLE_PLATEerr) && empty($PENALTY_TIMEerr) && empty($PENALTY_DATEerr) && empty($PENALTY_DETAILSerr) && empty($POINT_IDerr) && empty($ADMIN_USERNAMEerr) && empty($ADMIN_PASSWORDerr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO penalty (STICKER_ID, USER_MATRIC, VEHICLE_PLATE, PENALTY_TIME, PENALTY_DATE, PENALTY_DETAILS, POINT_ID) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_STICKER_ID, $param_USER_MATRIC, $param_VEHICLE_PLATE, $param_PENALTY_TIME, $param_PENALTY_DATE, $param_PENALTY_DETAILS, $param_POINT_ID);
            
            // Set parameters
            $param_STICKER_ID = $STICKER_ID;
            $param_USER_MATRIC = $USER_MATRIC;
			$param_VEHICLE_PLATE = $VEHICLE_PLATE;
			$param_PENALTY_TIME = $PENALTY_TIME;
			$param_PENALTY_DATE = $PENALTY_DATE;
			$param_PENALTY_DETAILS = $PENALTY_DETAILS;
            $param_POINT_ID = $POINT_ID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");

                // Close statement
                mysqli_stmt_close($stmt);
            } else{
				echo mysqli_error($link);
                echo "Something went wrong. Please try again later.";
            }
        }   
    }
    // Close connection
    mysqli_close($link);
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMPvi Penalty Issue</title>
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
    <script>
    function myfunction(){
        alert("Penalty issued successfully.");
    }
    </script>
    <table align="center" style="width:80%">
    <td width="60%">
        <div class="container page-styling">
        <div class="header-wrapper">
        <div class="site-name">
        <h1>UMP Vehicle Tracking System</h1>
</div>
<?php	
	include 'includes/navbar.php';
?>
<center>
    <div class="wrapper">
        <div class="main-title">
		<ul class="grid effect-8" id="grid">
		<h1>Issue Penalty [ADMIN]</h1>
    		</ul>
	</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($STICKER_IDerr)) ? 'has-error' : ''; ?>">
                <label>Sticker ID</label>
                <input type="text" name="STICKER_ID" class="form-control" value="<?php echo $STICKER_ID; ?>">
                <span class="help-block"><?php echo $STICKER_IDerr; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($USER_MATRICerr)) ? 'has-error' : ''; ?>">
                <label>Owner Matric No.</label>
                <input type="text" name="USER_MATRIC" class="form-control" value="<?php echo $USER_MATRIC; ?>">
                <span class="help-block"><?php echo $USER_MATRICerr; ?></span>
            </div>   
	        <div class="form-group <?php echo (!empty($VEHICLE_PLATEerr)) ? 'has-error' : ''; ?>">
                <label>Vehicle Plate No.</label>
                <input type="text" name="VEHICLE_PLATE" class="form-control" value="<?php echo $VEHICLE_PLATE; ?>">
                <span class="help-block"><?php echo $VEHICLE_PLATEerr; ?></span>
            </div>  
	        <div class="form-group <?php echo (!empty($PENALTY_TIMEerr)) ? 'has-error' : ''; ?>">
                <label>Penalty Time</label>
                <input type="time" name="PENALTY_TIME" class="form-control" value="<?php echo $PENALTY_TIME; ?>">
                <span class="help-block"><?php echo $PENALTY_TIMEerr; ?></span>
            </div> 
	        <div class="form-group <?php echo (!empty($PENALTY_DATEerr)) ? 'has-error' : ''; ?>">
                <label>Penalty Date</label>
                <input type="date" name="PENALTY_DATE" class="form-control" value="<?php echo $PENALTY_DATE; ?>">
                <span class="help-block"><?php echo $PENALTY_DATEerr; ?></span>
            </div> 
      	    <div class="form-group <?php echo (!empty($PENALTY_DETAILSerr)) ? 'has-error' : ''; ?>">
                <label>Penalty Details</label>
                <input type="text" name="PENALTY_DETAILS" class="form-control" value="<?php echo $PENALTY_DETAILS; ?>" >
                <span class="help-block"><?php echo $PENALTY_DETAILSerr; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($POINT_IDerr)) ? 'has-error' : ''; ?>">
                <label>Points To Deduct</label>
                <input type="text" name="POINT_ID" class="form-control" value="<?php echo $POINT_ID; ?>">
                <span class="help-block"><?php echo $POINT_IDerr; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($ADMIN_USERNAMEerr)) ? 'has-error' : ''; ?>">
                <label>Admin Username</label>
                <input type="text" name="ADMIN_USERNAME" class="form-control" value="<?php echo $ADMIN_USERNAME; ?>" required>
                <span class="help-block"><?php echo $ADMIN_USERNAMEerr; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($ADMIN_PASSWORDerr)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="text" name="ADMIN_PASSWORD" class="form-control" value="<?php echo $ADMIN_PASSWORD; ?>">
                <span class="help-block"><?php echo $ADMIN_PASSWORDerr; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" onclick="myfunction()">
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