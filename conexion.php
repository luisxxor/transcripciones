<?php 

//Establece la conexion

$con=mysqli_connect("localhost","root","","transcripciones");
mysqli_query($con,"SET NAMES 'utf8'");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
