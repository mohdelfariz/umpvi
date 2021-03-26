<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["userloggedin"]) || $_SESSION["userloggedin"] !== true){
    header("location: index.php");
    exit;
}

// Include config file
include("database/config.php");
$id = $_SESSION['USER_ID'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMPvi Points</title>
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
include 'includes/banner.php';
?>
<center>
<div class="wrapper">
    <div class="main-title">
        <ul class="grid effect-8" id="grid">
        <h1>LATEST EVENTS</h1>
    </div>

    <div class="well">
    <table>
				<tr>
					<th><h4>Your current point as today:<h4></th>
				</tr>
     <?php
		$query = "SELECT * FROM user WHERE USER_ID = '$id'";
		$result = mysqli_query($link,$query);
				
		if (mysqli_num_rows($result) > 0){
		// output data of each row
		while($row = mysqli_fetch_array($result)){
		//$USER_ID = $row["USER_ID"];
		//$USER_NAME = $row["USER_NAME"];
		//$USER_MATRIC = $row["USER_MATRIC"];
		//$USER_EMAIL = $row["USER_EMAIL"];
        //$USER_PHONE = $row["USER_PHONE"];
        //$USER_DEPT = $row["USER_DEPT"];
        $USER_POINT = $row["USER_POINT"];
					
					echo "<tr>
					<td><h3>" . $USER_POINT. "<h3></td>";
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
</div>   

</div>
</div><!-- /container -->

<?php
	include 'includes/footer.php';
?>
  
</body>
</html>