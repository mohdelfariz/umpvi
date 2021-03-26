<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["userloggedin"]) || $_SESSION["userloggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMPvi Home</title>
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
    td, th {
        text-align: center;
        padding: 10px;
    }
    </style>
<?php
	include 'includes/header.php';
?>
</head>

<body>
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
        <h1>Hi, <?php echo htmlspecialchars($_SESSION["USER_NAME"]); ?></h1>
    </div>  
</div>
</div>
</div><!-- /container -->

<?php
	include 'includes/footer.php';
?>
  
</body>
</html>