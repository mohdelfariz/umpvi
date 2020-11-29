<?php

require_once "database/config.php";

extract($_POST);

$query = "INSERT INTO user VALUES('', '$USER_NAME', '$USER_MATRIC', '$USER_EMAIL', '$USER_PASSWORD', '$USER_PHONE', '$USER_DEPT', '1000')";

if (mysqli_query($link, $query))
  {
    echo "<script type='text/javascript'> window.location='admincommunity.php' </script>";
  }
else
  {
    echo "Error: ". $query . "<br>" . mysqli_error($link);
  }

?>