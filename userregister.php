<?php
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$USER_NAME = $USER_MATRIC = $USER_EMAIL = $USER_PASSWORD = $USER_PHONE = $USER_DEPT = $confirm_password = "";
$USER_NAMEerr = $USER_MATRICerr = $USER_EMAILerr = $USER_PASSWORDerr = $USER_PHONEerr = $USER_DEPTerr = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    $USER_NAME = trim($_POST["USER_NAME"]);
	if(empty($USER_NAME)){
        $USER_NAMEerr = "Please enter full name.";
	}
        
    $USER_MATRIC = trim($_POST["USER_MATRIC"]);
	if(empty($USER_MATRIC)){
        $USER_MATRICerr = "Please enter matric ID.";
	}

    $USER_DEPT = trim($_POST["USER_DEPT"]);
	if(empty($USER_DEPT)){
        $USER_DEPTerr = "Please enter department.";
	}
    
    $USER_PHONE = trim($_POST["USER_PHONE"]);
	if(empty($USER_PHONE)){
        $USER_PHONEerr = "Please enter phone number.";
	}
    
    $USER_EMAIL = trim($_POST["USER_EMAIL"]);
    if(empty($USER_EMAIL)){
        $USER_EMAILerr = "Please enter valid email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT USER_ID FROM user WHERE USER_EMAIL = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["USER_EMAIL"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This Email have been registered.";
                } 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    $USER_PASSWORD = trim($_POST["USER_PASSWORD"]);
    if(empty($USER_PASSWORD)){
        $USER_PASSWORDerr = "Please enter a password.";     
    } elseif(strlen(trim($_POST["USER_PASSWORD"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    }
    
    // Validate confirm password
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($confirm_password)){
        $confirm_password_err = "Please confirm password.";     
    } else{
        if(empty($USER_PASSWORDerr) && ($USER_PASSWORD != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($USER_NAMEerr) && empty($USER_MATRICerr) && empty($USER_EMAILerr) && empty($USER_PHONEerr) && empty($USER_DEPTerr) && empty($USER_PASSWORDerr) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (USER_NAME, USER_MATRIC, USER_EMAIL, USER_PASSWORD, USER_PHONE, USER_DEPT) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_USER_NAME, $param_USER_MATRIC, $param_USER_EMAIL, $param_USER_PASSWORD, $param_USER_PHONE, $param_USER_DEPT);
            
            // Set parameters
			$param_USER_NAME = $USER_NAME;
			$param_USER_MATRIC = $USER_MATRIC;
			$param_USER_EMAIL = $USER_EMAIL;
			$param_USER_PASSWORD = $USER_PASSWORD;
			$param_USER_PHONE = $USER_PHONE;
            $param_USER_DEPT = $USER_DEPT;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: userlogin.php");
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
    <title>UMPvi Registration</title>
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
        <h1>UMP Vehicle Tracking System</h1>
</div>
<?php	
	include 'includes/navbar.php';
?>
<center>
    <div class="wrapper">
        <div class="main-title">
		<ul class="grid effect-8" id="grid">
		<h1>Registration</h1>
    		</ul>
	</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($USER_NAMEerr)) ? 'has-error' : ''; ?>">
                <label>Full Name</label>
                <input type="text" name="USER_NAME" class="form-control" value="<?php echo $USER_NAME; ?>">
                <span class="help-block"><?php echo $USER_NAMEerr; ?></span>
            </div>  
	        <div class="form-group <?php echo (!empty($USER_MATRICerr)) ? 'has-error' : ''; ?>">
                <label>Matric ID</label>
                <input type="text" name="USER_MATRIC" class="form-control" value="<?php echo $USER_MATRIC; ?>">
                <span class="help-block"><?php echo $USER_MATRICerr; ?></span>
            </div>  
	        <div class="form-group <?php echo (!empty($USER_PHONEerr)) ? 'has-error' : ''; ?>">
                <label>Phone Number</label>
                <input type="text" name="USER_PHONE" class="form-control" value="<?php echo $USER_PHONE; ?>">
                <span class="help-block"><?php echo $USER_PHONEerr; ?></span>
            </div> 
	        <div class="form-group <?php echo (!empty($USER_DEPTerr)) ? 'has-error' : ''; ?>">
                <label>Department</label>
                <input type="text" name="USER_DEPT" class="form-control" value="<?php echo $USER_DEPT; ?>">
                <span class="help-block"><?php echo $USER_DEPTerr; ?></span>
            </div> 
      	    <div class="form-group <?php echo (!empty($USER_EMAILerr)) ? 'has-error' : ''; ?>">
                <label>Email Address</label>
                <input type="email" name="USER_EMAIL" class="form-control" value="<?php echo $USER_EMAIL; ?>" >
                <span class="help-block"><?php echo $USER_EMAILerr; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($USER_PASSWORDerr)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="USER_PASSWORD" class="form-control" value="<?php echo $USER_PASSWORD; ?>">
                <span class="help-block"><?php echo $USER_PASSWORDerr; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="userlogin.php">Login here</a>.</p>
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