<?php
ini_set("session.cookie_lifetime","1200");
ini_set("session.gc_maxlifetime","1200");
session_start();
require_once 'conexion.php';
if($_SESSION["usuario"] == ""){
	
header("Location: index.php");
}
?>
<body>
<head>
<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
</head>
</body>


<?php
if($_SESSION["usuario"] == "" || $_SESSION["tipousuario"] != "ADMINISTRADOR")
 {
	 
	  echo "<script type = 'text/javascript'>
	alert('Debes ser administrador');
		window.location='index.php';
	</script>";
	
	 
 }


header('Content-Type: text/html; charset=UTF-8');


$idusuario = $_GET['idusuario'];
if(isset($_GET["idusuario"])){
$sql = "delete from usuario where idusuario = '$idusuario' ";
$res=mysqli_query($con,$sql) or die(mysql_error());








/*
$sql2 = "SELECT MAX(idincidencias) AS id FROM incidencias";
$query = mysqli_query($con,$sql2)or die('Fallo en la consulta');
$tra= mysqli_fetch_array($query);

$id = $tra["id"];

$fecha = date("Y-m-d");
$usuario = $_SESSION["usuario"];
$sql3 = "insert into logincidencias(usuario,accion,fecha) values 
		 ('$usuario','borrar usuario', '$fecha')";
$res2=mysqli_query($con,$sql3);
*/

if($res == true){
	
	
		
		echo "<script>
	swal({
  title: '',
  text: 'Registro Borrado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/listadorusuarios/index.php';   }, 1000);
        </script>";
}

else{
		
		echo "<script>
	swal({
  title: '',
  text: 'Fallo al Borrar, contactese con el Administrador del sistema',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/listadorusuarios/index.php';   }, 1000);
        </script>";
}




}
?>