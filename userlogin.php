<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["userloggedin"]) && $_SESSION["userloggedin"] === true){
    header("location: userhome.php");
    exit;
}
 
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    $email = trim($_POST["email"]);
    if(empty($email)){
        $email_err = "Please enter Email.";
    } 
    
    // Check if password is empty
    $password = trim($_POST["password"]);
    if(empty($password)){
        $password_err= "Please enter your password.";
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT USER_ID, USER_NAME, USER_MATRIC, USER_EMAIL, USER_PASSWORD, USER_PHONE, USER_DEPT, USER_POINT FROM user WHERE USER_EMAIL = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $name, $matric, $email, $hpassword, $phone, $dept, $point);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password === $hpassword){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["userloggedin"] = true;
                            $_SESSION["USER_ID"] = $id;
                            $_SESSION["USER_NAME"] = $name; 
                            $_SESSION["USER_MATRIC"] = $matric;  
                            $_SESSION["USER_EMAIL"] = $email;  
                            $_SESSION["USER_PASSWORD"] = $password;  
                            $_SESSION["USER_PHONE"] = $phone;  
                            $_SESSION["USER_DEPT"] = $dept;   
                            $_SESSION["USER_POINT"] = $point;                          
                            
                            // Redirect user to welcome page
                            header("location: userhome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password entered is invalid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        if($stmt = mysqli_prepare($link, $sql));
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
td.big {
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
<title>UMP Vehicle Tracking System (UMPvi)</title>
</head>
	<body>
		<div class="container page-styling">
		<div class="header-wrapper">
			<div class="site-name"  onclick="location.href='index.php';" >
			<h1>UMP VEHICLE TRACKING SYSTEM</h1>
			</div>
<?php	
include 'includes/navbar.php';
?>
	<div class="menu">
		<div class="navbar">
		</div>
	</div>
	
<div class="main-title">
	<ul class="grid effect-8" id="grid">
		<h1>User Login</h1>
    </ul>
</div>
<center>
<div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="userregister.php">Sign up now</a>.</p>
        </form>
    </div>  
</center>

</div>
</div><!-- /container -->
<?php
include 'includes/footer.php';
?>
</body>
</html>