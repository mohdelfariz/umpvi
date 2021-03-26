<!DOCTYPE html>
<?php
// Include config file
require_once "database/config.php";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMPvi Sticker Registration</title>
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
    table {
        border: 1px solid black;
        border-collapse: collapse;
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
            <h1>UMP VEHICLE STICKER SYSTEM</h1>
        </div>
<?php	
include 'includes/usernavbar.php';
?>
<center>
<div class="wrapper">
    <div class="main-title">
        <ul class="grid effect-8" id="grid">
        <h1> Confirm Your Sticker </h1>
    </div>

    <div class="form-group">
        <label>One-Time Password (Matric ID and Plate No.)</label>
        <input type="password" placeholder="Example: CA17092-ST3226U" id="qr-data" class="form-control" onchange="generateQR()">
    </div>  

    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="View Sticker">
    </div>

    
</div>
    <div><h5>Note: View-only! Please go to Safety Department to receive your sticker.<h5></div>
    <div><br>
    <table width="500" border="0" cellpadding="5">
        <tr>
        <td align="center" valign="center">
        <img src="img/logoheader.jpg" alt="description here" />
        <br />
        <div id="qrcode" align="center" valign="center"></div>
        <br />
        <img src="img/logobottom.jpg" alt="description here" />
        <br />
        
        </td>
        </tr>
    </table>
    </div>
</div><!-- /container -->

<?php
	include 'includes/footer.php';
?>
  
</body>

<script src="js/qrcode.min.js"></script>

<script>
    var qrdata = document.getElementById('qr-data');
    var qrcode = new QRCode(document.getElementById('qrcode'));


    function generateQR()
    {
        var data = qrdata.value;
        qrcode.makeCode(data)
    }

</script>
</html>