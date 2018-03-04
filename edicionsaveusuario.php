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
$usuario = strtoupper($_POST["usuario"]);
$password2 = $_POST["password2"];
$idtipousuario = $_POST["tipousuario"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$idcargo1 = $_POST["cargo1"];
$idcargo2 = $_POST["cargo2"];
$idcargo3 = $_POST["cargo3"];
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
		idcargo1 = '$idcargo1',
		idcargo2 = '$idcargo2',
		idcargo3 = '$idcargo3',
			usuario = '$usuario',
			password = '$password2',
			idtipousuario = $idtipousuario
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
	
	
		
		echo "<script>
	swal({
  title: '',
  text: 'Registro Editado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='listadorusuarios/index.php';   }, 1000);
        </script>";
	
	
	
}
else{
	

	
	/*
	
	echo "<script>
	swal({
  title: '',
  text: 'Fallo al Editar, contatese con el Administrador del Sistema',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='listadorusuarios/index.php';   }, 1000);
        </script>";
	
	*/
	
}

?>



