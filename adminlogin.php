<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] === true){
    header("location: adminhome.php");
    exit;
}
 
// Include config file
//require_once "core/database/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    $username = trim($_POST["username"]);
    if(empty($username)){
        $username_err = "Please enter Username.";
    } 
    
    // Check if password is empty
    $password = trim($_POST["password"]);
    if(empty($password)){
        $password_err= "Please enter Password.";
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
		if($username === "azam"){
			if($password === "azam123"){
				// Password is correct, so start a new session
				session_start();
				
				// Store data in session variables
				$_SESSION["adminloggedin"] = true;
				$_SESSION["USER_ID"] = $id;
				$_SESSION["USER_NAME"] = $name; 
				$_SESSION["USER_MATRIC"] = $matric;  
				$_SESSION["USER_EMAIL"] = $email;  
				$_SESSION["USER_PASSWORD"] = $password;  
				$_SESSION["USER_PHONE"] = $phone;  
				$_SESSION["USER_DEPT"] = $dept;                             
				
				// Redirect user to welcome page
				header("location: adminhome.php");
			} else{
				// Display an error message if password is not valid
				$password_err = "The password entered is invalid.";
			}
		} else {
			// Display an error message if username doesn't exist
			$email_err = "Invalid Username.";
		}
    } else{
        echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
//mysqli_close($link);
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
			<h1>UMP Vehicle Tracking System</h1>
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
		<h1>Admin Login</h1>
    </ul>
</div>
<center>
<div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Admin Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Admin Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>  
</center>

</div>
</div><!-- /container -->
<?php
include 'includes/footer.php';
?>
	