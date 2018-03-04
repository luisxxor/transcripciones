 <?
 
 ini_set("session.cookie_lifetime","30000"); 
  ini_set("session.gc_maxlifetime","30000"); 
   session_start(); 
    require_once ('conexion.php'); 
	 if($_SESSION["usuario"] == "") 
		   
		   {   	   
		    return header("Location: index.php");  		  
		   }  
			 

			 ?> 
<body>
<head>
<script src="/transcripciones/sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/transcripciones/sweet/dist/sweetalert.css"></link>
</head>
</body>
<?php

include_once("../conexion.php");
//obtenemos el archivo .csv
$tipo = $_FILES['archivo']['type'];
 
$tamanio = $_FILES['archivo']['size'];
 
$archivotmp = $_FILES['archivo']['tmp_name'];
 
//cargamos el archivo
$lineas = file($archivotmp);
 
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;
 
//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea)
{ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea 
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0) 
   { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ; */
       $datos = explode(";",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
       //usamos la función utf8_encode para leer correctamente los caracteres especiales
       $idprocedimiento = utf8_encode($datos[0]);
       $fechacliente = date("Y-m-d", utf8_encode(strtotime(($datos[1]))));
       $nombrearchivo = $datos[2];
	   $duracion = utf8_encode($datos[3]);
	   $cliente = utf8_encode($datos[4]);
	   
	   
	   $sql1 = "SELECT * FROM `procedimiento` WHERE `idprocedimiento`='$idprocedimiento'"; 

if ($result=mysqli_query($con,$sql1))
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
	alert('El codigo $idprocedimiento, ya existe, favor revisar');
	</script>";
	
	$res = false;
}
else 
{ 



     $sql = "INSERT INTO `procedimiento`(`idprocedimiento`, `fechacliente`, `nombrearchivo`, `duracion`,`cliente`,tiempotr1,tiempotr2,tiempotr3,tiempotr4,tiempotr5,tiempotr6,
	 
	 tiempotc1,tiempotc2,tiempotc3,tiempotc4,tiempotc5,tiempotc6,tiempopp1,tiempopp2,tiempopp3,tiempopp4,tiempopp5,tiempopp6,fechainterna1,fechainterna2,fechainterna3)
	 VALUES('$idprocedimiento','$fechacliente','$nombrearchivo',$duracion,'$cliente',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'0000-00-00','0000-00-00','0000-00-00')";

	$res= mysqli_query($con,$sql);
	
$fecha2 = date("Y-m-d H:i:s");
$usuario = $_SESSION["usuario"];
$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Agrega Planificacion','$usuario','$fecha2','$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

}
       //guardamos en base de datos la línea leida
     
 
       //cerramos condición
   }
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}


if($res == true)
{
	
		echo "<script>
	swal({
  title: '',
  text: 'Archivo Importado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";
 
}
	if($res == false)
{
	
		echo "<script>
	swal({
  title: '',
  text: 'Error al Importar',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='/transcripciones/index/index.php';   }, 1000);
        </script>";
 
}


?>