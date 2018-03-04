<?php

//CABECERA 
//CABECERA 
ini_set("session.cookie_lifetime","2700");
ini_set("session.gc_maxlifetime","2700");
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

$usuario = strtoupper($_POST["usuario"]);
$nombre =  strtoupper($_POST["nombre"]);
$apellido =  strtoupper($_POST["apellido"]);  
$password = $_POST["password2"];
$cargo1 = $_POST["cargo1"];
$cargo2 = $_POST["cargo2"];
$cargo3 = $_POST["cargo3"];
$tipousuario = $_POST["tipousuario"];
$fechaingreso=date("Y-m-d");
?>




<?php
//INSERT EN LA BD


$sql2="select usuario from usuario where usuario = '$usuario'";

if ($result=mysqli_query($con,$sql2))
  {
	  	$tra= mysqli_fetch_array($result);
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);

  mysqli_free_result($result);
  }
  
  else{}

if($rowcount > 0 )
{

 echo "<script type = 'text/javascript'>
	alert('Usuario Existente');
	 window.location='nuevousuario.php';
	</script>";
}


else{

$sql="
INSERT INTO usuario(usuario, nombre,apellido, password, idtipousuario,idcargo1,idcargo2,idcargo3,fechaingreso) VALUES ('$usuario','$nombre','$apellido','$password',$tipousuario,$cargo1,$cargo2,$cargo3,'$fechaingreso')";
$res=mysqli_query($con,$sql);


/*
$sql2 = "SELECT MAX(idincidencias) AS id FROM incidencias";
$query = mysqli_query($con,$sql2)or die('Fallo en la consulta');
$tra= mysqli_fetch_array($query);

$id = $tra["id"];
$fecha = date("Y-m-d");


$usuario = $_SESSION["usuario"];
$sql3 = "insert into logincidencias(usuario,accion,fecha,idincidencias) values 
		 ('$usuario','ingresar usuario', '$fecha',null)";
$res2=mysqli_query($con,$sql3);

*/



if($res == true)
{
	
		echo "<script>
	swal({
  title: '',
  text: 'Usuario Ingresado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";
 
}
else{
		
	echo "<script>
	swal({
  title: '',
  text: 'Fallo al Ingresar, contactese con el Administrador del Sistema',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";

}



}
?>


		
	


