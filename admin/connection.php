<?php
$dbconn = mysqli_connect("localhost","root","","ecommerce");

// Check connection
if (!$dbconn)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
?>
