<?php

//CABECERA 
ini_set("session.cookie_lifetime","1200");
ini_set("session.gc_maxlifetime","1200");
session_start();
require_once 'conexion.php';	

?>
<body>
<head>
<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
</head>
</body>
<?php 

//VARIABLES
$idusuario = $_GET["idusuario"];
if (isset($_POST["usuario"]))
				{
				$usuario = strtoupper($_POST["usuario"]); 
				}
				
				else{
					
					 $sqlusuario = "select usuario from usuario where idusuario = $idusuario";
					 $queryusuario = mysqli_query($con,$sqlusuario)or die('Fallo en la consulta'); 
				     $trausuario= mysqli_fetch_array($queryusuario); 
					 
					 
					 $usuario = $trausuario["usuario"];

				}
$password2 = $_POST["password2"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];

?>

<body>
<head>
<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
</head>
</body>


<?php
//UPDATE EN LA BD



$sql = "UPDATE usuario 
		SET 
		nombre = '$nombre',
		apellido = '$apellido',
			usuario = '$usuario',
			password = '$password2'
			where idusuario = $idusuario";


$res=mysqli_query($con,$sql);


/*
$fecha = date("Y-m-d");

$sql2 = "SELECT MAX(idincidencias) AS id FROM incidencias";
$query = mysqli_query($con,$sql2)or die('Fallo en la consulta');
$tra= mysqli_fetch_array($query);

$id = $tra["id"];

$usuario = $_SESSION["usuario"];
$sql3 = "insert into logincidencias(usuario,accion,fecha) values 
		 ('$usuario','edicion usuario', '$fecha')";
$res2=mysqli_query($con,$sql3);


*/

if($res ==true){
	
if($_SESSION["tipousuario"] == "USUARIO"){
		
		echo "<script>
	swal({
  title: '',
  text: 'Registro Editado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/listadorvistausuarios/index.php';   }, 1000);
        </script>";
}

else{
	
			echo "<script>
	swal({
  title: '',
  text: 'Registro Editado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";
	
}
	
	
}
else{
	

	
	
	
	echo "<script>
	swal({
  title: '',
  text: 'Fallo al Editar, contatese con el Administrador del Sistema',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";


	
}

?>



