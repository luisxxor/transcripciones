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
if($_SESSION["usuario"] == "" || $_SESSION["tipousuario"] != "administrador")
 {
	 
	  echo "<script type = 'text/javascript'>
	alert('Debes ser administrador');
		window.location='index.php';
	</script>";
	
	 
 }



header('Content-Type: text/html; charset=UTF-8');
$idprocedimiento = $_GET['idprocedimiento'];

if(isset($_GET["idprocedimiento"])){
$sql = "delete from procedimiento where idprocedimiento='$idprocedimiento'";
$res=mysqli_query($con,$sql) or die(mysql_error());


$fecha2 = date("Y-m-d H:i:s");
$usuario = $_SESSION["usuario"];
$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Borrar Planificacion','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);


if($res == true){
	

		echo "<script>
	swal({
  title: '',
  text: 'Registro Borrado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";
}

else{
		
		echo "<script>
	swal({
  title: '',
  text: 'Fallo al Borrar, contactese con el Administrador del sistema',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 2000);
        </script>";
}



}
?>
