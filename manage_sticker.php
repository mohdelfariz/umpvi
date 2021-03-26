<!DOCTYPE html>
<html>
<title>UMP Vehicle Tracking System (UMPvi)</title>
<body>
<?php
    $error = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){

    }

    //Initiate connection to the database
    $con = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

    //To select the database for UMPvi
    mysqli_select_db($con, "umpvidb") or die (mysqli_error());

    //To select all the registration data to generate QR
    $sql = "SELECT * FROM sticker WHERE id=(SELECT max(id) FROM sticker)";
    
    //We save the data into an array
    $stickerData = mysqli_query($con, $sql);
    $sticker = mysqli_fetch_array($stickerData);

    //We close the connection to database
    mysqli_close($con);

    ?>

    <h1> UMP Vehicle Tracking System (UMPvi) <h1>
    <?php 
        echo $sticker["STICKER_ID"];
        echo $sticker["USER_ID"];
        echo $sticker["VEHICLE_ID"];
        echo $sticker["USER_TYPE"];
        echo $sticker["VEHICLE_TYPE"];
        ?>


</body>

</html>