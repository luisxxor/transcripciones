 <?php 
ini_set("session.cookie_lifetime","30000"); 
ini_set("session.gc_maxlifetime","30000"); 
session_start(); 
require_once ('conexion.php'); 

	 if($_SESSION["usuario"] == "") 
		   
		   {   
		   
		    return header("Location: index.php");  
			  
		   }  
		    
			 header('Content-Type: text/html; charset=UTF-8');


$usuario = $_SESSION["usuario"];

			 ?> 
			 
			 
<body>
<head>
<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
</head>
</body>	 
			 <?php
			 
				//CODIGO
			   $idprocedimiento = $_POST["idprocedimiento"];
			   
			   //DATOS IMPORTADOS
			   
			   $nombrearchivo =  $_POST["nombrearchivo"]; 
			   $duracion =  $_POST["duracion"];
			   $cliente =  trim($_POST["cliente"]);
			   $fechacliente =  $_POST["fechacliente"]; 
			   $fechacliente = date("Y-m-d", utf8_encode(strtotime(($fechacliente))));
			   
				//TRANSCRIPTORES
				$tr1 =  $_POST["tr1"]; 
				$tr2 =  $_POST["tr2"]; 
				$tr3 =  $_POST["tr3"]; 
				$tr4 =  $_POST["tr4"]; 
				$tr5 =  $_POST["tr5"]; 
				$tr6 =  $_POST["tr6"]; 
				
				//TIMECODERS
				
				$tc1 =  $_POST["tc1"]; 
				$tc2 =  $_POST["tc2"]; 
				$tc3 =  $_POST["tc3"]; 
				$tc4 =  $_POST["tc4"]; 
				$tc5 =  $_POST["tc5"]; 
				$tc6 =  $_POST["tc6"]; 
				
				//POSTPRODUCTORES
				
				$pp1 =  $_POST["pp1"]; 
				$pp2 =  $_POST["pp2"]; 
				$pp3 =  $_POST["pp3"]; 
				$pp4 =  $_POST["pp4"]; 
				$pp5 =  $_POST["pp5"]; 
				$pp6 =  $_POST["pp6"]; 
				
			//POSTPRODUCTORES DOS
				
				$ppdos1 =  $_POST["ppdos1"]; 
				$ppdos2 =  $_POST["ppdos2"]; 
				$ppdos3 =  $_POST["ppdos3"]; 
				$ppdos4 =  $_POST["ppdos4"]; 
				$ppdos5 =  $_POST["ppdos5"]; 
				$ppdos6 =  $_POST["ppdos6"]; 
				
				//FECHAS
				
				$fechainterna1 =  $_POST["fechainterna1"]; 
				//$fechainterna1 = date("Y-m-d", utf8_encode(strtotime(($fechainterna1))));
				
				$fechainterna2 =  $_POST["fechainterna2"]; 
				//$fechainterna2 = date("Y-m-d", utf8_encode(strtotime(($fechainterna2))));
				
				$fechainterna3 =  $_POST["fechainterna3"]; 
				//$fechainterna3 = date("Y-m-d", utf8_encode(strtotime(($fechainterna3))));
				
				$fechainterna4 =  $_POST["fechainterna4"]; 
				//$fechainterna3 = date("Y-m-d", utf8_encode(strtotime(($fechainterna3))));
				
				//TIEMPOS
				
				$tiempotr1 =  $_POST["tiempotr1"]; 
				$tiempotr2 =  $_POST["tiempotr2"];
				$tiempotr3 =  $_POST["tiempotr3"];	
				$tiempotr4 =  $_POST["tiempotr4"];
				$tiempotr5 =  $_POST["tiempotr5"];
				$tiempotr6 =  $_POST["tiempotr6"];	
				
				$tiempotc1 =  $_POST["tiempotc1"];
				$tiempotc2 =  $_POST["tiempotc2"]; 
				$tiempotc3 =  $_POST["tiempotc3"]; 
				$tiempotc4 =  $_POST["tiempotc4"]; 
				$tiempotc5 =  $_POST["tiempotc5"]; 
				$tiempotc6 =  $_POST["tiempotc6"];
				
				$tiempopp1 =  $_POST["tiempopp1"];
				$tiempopp2 =  $_POST["tiempopp2"]; 
				$tiempopp3 =  $_POST["tiempopp3"]; 
				$tiempopp4 =  $_POST["tiempopp4"]; 
				$tiempopp5 =  $_POST["tiempopp5"]; 
				$tiempopp6 =  $_POST["tiempopp6"]; 
				
				$tiempoppdos1 =  $_POST["tiempoppdos1"];
				$tiempoppdos2 =  $_POST["tiempoppdos2"]; 
				$tiempoppdos3 =  $_POST["tiempoppdos3"]; 
				$tiempoppdos4 =  $_POST["tiempoppdos4"]; 
				$tiempoppdos5 =  $_POST["tiempoppdos5"]; 
				$tiempoppdos6 =  $_POST["tiempoppdos6"]; 
				
				
				
				
				//Fecha de plazo y entrega
				$fecha_plazo_tr1=$_POST["fecha_plazo_tr1"]!="" ? '"'.$_POST["fecha_plazo_tr1"].'"' : 'NULL' ;
				$fecha_plazo_tr2=$_POST["fecha_plazo_tr2"]!="" ? '"'.$_POST["fecha_plazo_tr2"].'"' : 'NULL' ;
				$fecha_plazo_tr3=$_POST["fecha_plazo_tr3"]!="" ? '"'.$_POST["fecha_plazo_tr3"].'"' : 'NULL' ;
				$fecha_plazo_tr4=$_POST["fecha_plazo_tr4"]!="" ? '"'.$_POST["fecha_plazo_tr4"].'"' : 'NULL' ;
				$fecha_plazo_tr5=$_POST["fecha_plazo_tr5"]!="" ? '"'.$_POST["fecha_plazo_tr5"].'"' : 'NULL' ;
				$fecha_plazo_tr6=$_POST["fecha_plazo_tr6"]!="" ? '"'.$_POST["fecha_plazo_tr6"].'"' : 'NULL' ;
				
				$fecha_plazo_tc1=$_POST["fecha_plazo_tc1"]!="" ? '"'.$_POST["fecha_plazo_tc1"].'"' : 'NULL' ;
				$fecha_plazo_tc2=$_POST["fecha_plazo_tc2"]!="" ? '"'.$_POST["fecha_plazo_tc2"].'"' : 'NULL' ;
				$fecha_plazo_tc3=$_POST["fecha_plazo_tc3"]!="" ? '"'.$_POST["fecha_plazo_tc3"].'"' : 'NULL' ;
				$fecha_plazo_tc4=$_POST["fecha_plazo_tc4"]!="" ? '"'.$_POST["fecha_plazo_tc4"].'"' : 'NULL' ;
				$fecha_plazo_tc5=$_POST["fecha_plazo_tc5"]!="" ? '"'.$_POST["fecha_plazo_tc5"].'"' : 'NULL' ;
				$fecha_plazo_tc6=$_POST["fecha_plazo_tc6"]!="" ? '"'.$_POST["fecha_plazo_tc6"].'"' : 'NULL' ;
				
				$fecha_plazo_pp1=$_POST["fecha_plazo_pp1"]!="" ? '"'.$_POST["fecha_plazo_pp1"].'"' : 'NULL' ;
				$fecha_plazo_pp2=$_POST["fecha_plazo_pp2"]!="" ? '"'.$_POST["fecha_plazo_pp2"].'"' : 'NULL' ;
				$fecha_plazo_pp3=$_POST["fecha_plazo_pp3"]!="" ? '"'.$_POST["fecha_plazo_pp3"].'"' : 'NULL' ;
				$fecha_plazo_pp4=$_POST["fecha_plazo_pp4"]!="" ? '"'.$_POST["fecha_plazo_pp4"].'"' : 'NULL' ;
				$fecha_plazo_pp5=$_POST["fecha_plazo_pp5"]!="" ? '"'.$_POST["fecha_plazo_pp5"].'"' : 'NULL' ;
				$fecha_plazo_pp6=$_POST["fecha_plazo_pp6"]!="" ? '"'.$_POST["fecha_plazo_pp6"].'"' : 'NULL' ;
				
				$fecha_plazo_ppdos1=$_POST["fecha_plazo_ppdos1"]!="" ? '"'.$_POST["fecha_plazo_ppdos1"].'"' : 'NULL' ;
				$fecha_plazo_ppdos2=$_POST["fecha_plazo_ppdos2"]!="" ? '"'.$_POST["fecha_plazo_ppdos2"].'"' : 'NULL' ;
				$fecha_plazo_ppdos3=$_POST["fecha_plazo_ppdos3"]!="" ? '"'.$_POST["fecha_plazo_ppdos3"].'"' : 'NULL' ;
				$fecha_plazo_ppdos4=$_POST["fecha_plazo_ppdos4"]!="" ? '"'.$_POST["fecha_plazo_ppdos4"].'"' : 'NULL' ;
				$fecha_plazo_ppdos5=$_POST["fecha_plazo_ppdos5"]!="" ? '"'.$_POST["fecha_plazo_ppdos5"].'"' : 'NULL' ;
				$fecha_plazo_ppdos6=$_POST["fecha_plazo_ppdos6"]!="" ? '"'.$_POST["fecha_plazo_ppdos6"].'"' : 'NULL' ;
				
				
				
				
				$fecha_entrega_tr1=@$_POST["fecha_entrega_tr1"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tr2=@$_POST["fecha_entrega_tr2"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tr3=@$_POST["fecha_entrega_tr3"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tr4=@$_POST["fecha_entrega_tr4"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tr5=@$_POST["fecha_entrega_tr5"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tr6=@$_POST["fecha_entrega_tr6"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				
				$fecha_entrega_tc1=@$_POST["fecha_entrega_tc1"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tc2=@$_POST["fecha_entrega_tc2"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tc3=@$_POST["fecha_entrega_tc3"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tc4=@$_POST["fecha_entrega_tc4"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tc5=@$_POST["fecha_entrega_tc5"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_tc6=@$_POST["fecha_entrega_tc6"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				
				$fecha_entrega_pp1=@$_POST["fecha_entrega_pp1"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_pp2=@$_POST["fecha_entrega_pp2"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_pp3=@$_POST["fecha_entrega_pp3"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_pp4=@$_POST["fecha_entrega_pp4"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_pp5=@$_POST["fecha_entrega_pp5"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_pp6=@$_POST["fecha_entrega_pp6"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				
				$fecha_entrega_ppdos1=@$_POST["fecha_entrega_ppdos1"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_ppdos2=@$_POST["fecha_entrega_ppdos2"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_ppdos3=@$_POST["fecha_entrega_ppdos3"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_ppdos4=@$_POST["fecha_entrega_ppdos4"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_ppdos5=@$_POST["fecha_entrega_ppdos5"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				$fecha_entrega_ppdos6=@$_POST["fecha_entrega_ppdos6"]=="Si" ? '"'.date("Y-m-d H:i:s").'"' : 'NULL' ;
				
				
				
				
				
				//OTROS
				
				$estadocliente =  $_POST["estadocliente"];
				//$estadointerno =  $_POST["estadointerno"];  	
				//Si $_POST["estadointerno"] está disabled, el valor será NULL
				$estadointerno =  @$_POST["estadointerno"]=="" ? "NULL" : $_POST["estadointerno"]; 
				
				$fechaingreso = date('Y-m-d');
				if (isset($_POST["nota"]))
				{
				$nota = strtoupper($_POST["nota"]); 
				}
				
				else{
					
					
					
					 $sqlnota = "select observaciones from procedimiento where idprocedimiento = '$idprocedimiento'";
					 $querynota = mysqli_query($con,$sqlnota)or die('Fallo en la consulta'); 
				     $tranota= mysqli_fetch_array($querynota); 
					 
					 $nota = $tranota["observaciones"];
					 
				
				}
			
		

//COMPARACION y VALIDACION PARA EL LOG


 
 
 $sql2 = "SELECT idprocedimiento, nombrearchivo, duracion, cliente, fechacliente,
 idtranscriptor1, idtranscriptor2, idtranscriptor3, idtranscriptor4, idtranscriptor5, idtranscriptor6, tiempotr1, tiempotr2, tiempotr3, tiempotr4, tiempotr5, tiempotr6, 
 fechainterna1, idtimecoder1, idtimecoder2, idtimecoder3, idtimecoder4, idtimecoder5, idtimecoder6, 
 tiempotc1, tiempotc2, tiempotc3, tiempotc4, tiempotc5, tiempotc6, fechainterna2, 
 idpostproductor1, idpostproductor2, idpostproductor3, idpostproductor4, idpostproductor5, 
 idpostproductor6, 
 tiempopp1, tiempopp2, tiempopp3, tiempopp4, tiempopp5, tiempopp6, fechainterna3, 
  idpostproductordos1, idpostproductordos2, idpostproductordos3, idpostproductordos4, idpostproductordos5, 
 idpostproductordos6,tiempoppdos1, tiempoppdos2, tiempoppdos3, tiempoppdos4, tiempoppdos5, tiempoppdos6,fechainterna4,
 estadointerno, estadocliente,observaciones FROM procedimiento WHERE idprocedimiento = '$idprocedimiento'"; 
  $query = mysqli_query($con,$sql2)or die('Fallo en la consulta'); 
  $tra= mysqli_fetch_array($query); 

  //DATOS IMPORTADOS
  
  if($tra["nombrearchivo"] != $nombrearchivo)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Nombre de Archivo','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
   
  if($tra["duracion"] != $duracion)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Duracion','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
    if($tra["cliente"] != $cliente)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Duracion','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
      if($tra["fechacliente"] != $fechacliente)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Fecha de Cliente','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
  //TRANSCRIPTORES
  
  
        if($tra["idtranscriptor1"] != $tr1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Transcriptor 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtranscriptor2"] != $tr2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Transcriptor 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtranscriptor3"] != $tr3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Transcriptor 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtranscriptor4"] != $tr4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Transcriptor 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtranscriptor5"] != $tr5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Transcriptor 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtranscriptor6"] != $tr6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Transcriptor 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
  //TIMECODERS
  
    
        if($tra["idtimecoder1"] != $tc1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del TimeCoder 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtimecoder2"] != $tc2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del TimeCoder 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtimecoder3"] != $tc3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del TimeCoder 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtimecoder4"] != $tc4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del TimeCoder 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtimecoder5"] != $tc5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del TimeCoder 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idtimecoder6"] != $tc6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del TimeCoder 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
  
  
  //POSTPRODUCTORES
  
          if($tra["idpostproductor1"] != $pp1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductor2"] != $pp2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductor3"] != $pp3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductor4"] != $pp4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductor5"] != $pp5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductor6"] != $pp6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
  //POSTPRODUCTORES DOS
  
  
  
          if($tra["idpostproductordos1"] != $ppdos1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor Dos 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductordos2"] != $ppdos2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor Dos 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductordos3"] != $ppdos3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor Dos 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3); 

  }
  
  
          if($tra["idpostproductordos4"] != $ppdos4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor Dos 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductordos5"] != $ppdos5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor Dos 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
          if($tra["idpostproductordos6"] != $ppdos6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del PostProductor Dos 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
  
  
  
 //TIEMPOS
  
  
  
         if($tra["tiempotr1"] != $tiempotr1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo Transcriptor 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempotr2"] != $tiempotr2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo Transcriptor 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempotr3"] != $tiempotr3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo Transcriptor 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempotr4"] != $tiempotr4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo Transcriptor 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempotr5"] != $tiempotr5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo Transcriptor 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempotr6"] != $tiempotr6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo Transcriptor 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
	
	//TIEMPO TIMECODERS
	
	
	 
         if($tra["tiempotc1"] != $tiempotc1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo TimeCoder 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempotc2"] != $tiempotc2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo TimeCoder 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempotc3"] != $tiempotc3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");

$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo TimeCoder 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempotc4"] != $tiempotc4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo TimeCoder 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempotc5"] != $tiempotc5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo TimeCoder 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempotc6"] != $tiempotc6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo TimeCoder 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
	
	
	
	
		 
         if($tra["tiempopp1"] != $tiempopp1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempopp2"] != $tiempopp2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempopp3"] != $tiempopp3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");

$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempopp4"] != $tiempopp4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempopp5"] != $tiempopp5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempopp6"] != $tiempopp6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
  
  
  
  
  //tiempos POSTPRODUCTORES DOS
  
  
  	
	
		 
         if($tra["tiempoppdos1"] != $tiempoppdos1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor Dos 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempoppdos2"] != $tiempoppdos2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor Dos 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempoppdos3"] != $tiempoppdos3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");

$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor Dos 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	


         if($tra["tiempoppdos4"] != $tiempoppdos4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor Dos 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempoppdos5"] != $tiempoppdos5)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor Dos 5','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	

         if($tra["tiempoppdos6"] != $tiempoppdos6)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Tiempo PostProductor Dos 6','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
  
  
	
	
	//FECHAS
	
	
	        if($tra["fechainterna1"] != $fechainterna1)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Fecha Interna 1','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
	
	
	
		        if($tra["fechainterna2"] != $fechainterna2)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Fecha Interna 2','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
	
	
		        if($tra["fechainterna3"] != $fechainterna3)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Fecha Interna 3','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
  
  		        if($tra["fechainterna4"] != $fechainterna4)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Fecha Interna 4','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }
	//OTROS
	
			        if($tra["estadocliente"] != $estadocliente)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Estado Cliente','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
  
  
  
  			        if($tra["estadointerno"] != $estadointerno)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");


$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion del Estado Interno','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	  
	
	
	    if($tra["observaciones"] != $nota)
  {
	  
	$fecha2 = date("Y-m-d H:i:s");

$sql3 = "insert into log(accion,usuario,fecha,idprocedimiento) values 
		 ('Modificacion de la Nota','$usuario','$fecha2', '$idprocedimiento')";
$res2=mysqli_query($con,$sql3);

  }	 
	
	

			//CONSULTA UPDATE
				
	
	
				$sql = "
				
				
				UPDATE procedimiento SET
				
				nombrearchivo='$nombrearchivo',
				duracion=$duracion,
				cliente='$cliente',
				fechacliente='$fechacliente',
				idtranscriptor1=$tr1,
				idtranscriptor2=$tr2,
				idtranscriptor3=$tr3,
				idtranscriptor4=$tr4,
				idtranscriptor5=$tr5,
				idtranscriptor6=$tr6,
				tiempotr1=$tiempotr1,
				tiempotr2=$tiempotr2,
				tiempotr3=$tiempotr3,
				tiempotr4=$tiempotr4,
				tiempotr5=$tiempotr5,
				tiempotr6=$tiempotr6,
				fechainterna1='$fechainterna1',
				idtimecoder1=$tc1,
				idtimecoder2=$tc2,
				idtimecoder3=$tc3,
				idtimecoder4=$tc4,
				idtimecoder5=$tc5,
				idtimecoder6=$tc6,
				tiempotc1=$tiempotc1,
				tiempotc2=$tiempotc2,
				tiempotc3=$tiempotc3,
				tiempotc4=$tiempotc4,
				tiempotc5=$tiempotc5,
				tiempotc6=$tiempotc6,
				fechainterna2='$fechainterna2',
				idpostproductor1=$pp1,
				idpostproductor2=$pp2,
				idpostproductor3=$pp3,
				idpostproductor4=$pp4,
				idpostproductor5=$pp5,
				idpostproductor6=$pp6,
				tiempopp1=$tiempopp1,
				tiempopp2=$tiempopp2,
				tiempopp3=$tiempopp3,
				tiempopp4=$tiempopp4,
				tiempopp5=$tiempopp5,
				tiempopp6=$tiempopp6,
				fechainterna3='$fechainterna3',
				idpostproductordos1=$ppdos1,
				idpostproductordos2=$ppdos2,
				idpostproductordos3=$ppdos3,
				idpostproductordos4=$ppdos4,
				idpostproductordos5=$ppdos5,
				idpostproductordos6=$ppdos6,
				tiempoppdos1=$tiempoppdos1,
				tiempoppdos2=$tiempoppdos2,
				tiempoppdos3=$tiempoppdos3,
				tiempoppdos4=$tiempoppdos4,
				tiempoppdos5=$tiempoppdos5,
				tiempoppdos6=$tiempoppdos6,
				fechainterna4='$fechainterna4',
				estadointerno=$estadointerno,
				estadocliente=$estadocliente,
				fechaingreso = '$fechaingreso',
				observaciones = '$nota',
				
				
				
				fecha_plazo_tr1=$fecha_plazo_tr1,
				fecha_plazo_tr2=$fecha_plazo_tr2,
				fecha_plazo_tr3=$fecha_plazo_tr3,
				fecha_plazo_tr4=$fecha_plazo_tr4,
				fecha_plazo_tr5=$fecha_plazo_tr5,
				fecha_plazo_tr6=$fecha_plazo_tr6,
				
				fecha_plazo_tc1=$fecha_plazo_tc1,
				fecha_plazo_tc2=$fecha_plazo_tc2,
				fecha_plazo_tc3=$fecha_plazo_tc3,
				fecha_plazo_tc4=$fecha_plazo_tc4,
				fecha_plazo_tc5=$fecha_plazo_tc5,
				fecha_plazo_tc6=$fecha_plazo_tc6,
				
				fecha_plazo_pp1=$fecha_plazo_pp1,
				fecha_plazo_pp2=$fecha_plazo_pp2,
				fecha_plazo_pp3=$fecha_plazo_pp3,
				fecha_plazo_pp4=$fecha_plazo_pp4,
				fecha_plazo_pp5=$fecha_plazo_pp5,
				fecha_plazo_pp6=$fecha_plazo_pp6,
				
				fecha_plazo_ppdos1=$fecha_plazo_ppdos1,
				fecha_plazo_ppdos2=$fecha_plazo_ppdos2,
				fecha_plazo_ppdos3=$fecha_plazo_ppdos3,
				fecha_plazo_ppdos4=$fecha_plazo_ppdos4,
				fecha_plazo_ppdos5=$fecha_plazo_ppdos5,
				fecha_plazo_ppdos6=$fecha_plazo_ppdos6,
				
				
				
				
				
				
				fecha_entrega_tr1=if(fecha_entrega_tr1 is not null,fecha_entrega_tr1,$fecha_entrega_tr1),
				fecha_entrega_tr2=if(fecha_entrega_tr2 is not null,fecha_entrega_tr2,$fecha_entrega_tr2),
				fecha_entrega_tr3=if(fecha_entrega_tr3 is not null,fecha_entrega_tr3,$fecha_entrega_tr3),
				fecha_entrega_tr4=if(fecha_entrega_tr4 is not null,fecha_entrega_tr4,$fecha_entrega_tr4),
				fecha_entrega_tr5=if(fecha_entrega_tr5 is not null,fecha_entrega_tr5,$fecha_entrega_tr5),
				fecha_entrega_tr6=if(fecha_entrega_tr6 is not null,fecha_entrega_tr6,$fecha_entrega_tr6),
				
				fecha_entrega_tc1=if(fecha_entrega_tc1 is not null,fecha_entrega_tc1,$fecha_entrega_tc1),
				fecha_entrega_tc2=if(fecha_entrega_tc2 is not null,fecha_entrega_tc2,$fecha_entrega_tc2),
				fecha_entrega_tc3=if(fecha_entrega_tc3 is not null,fecha_entrega_tc3,$fecha_entrega_tc3),
				fecha_entrega_tc4=if(fecha_entrega_tc4 is not null,fecha_entrega_tc4,$fecha_entrega_tc4),
				fecha_entrega_tc5=if(fecha_entrega_tc5 is not null,fecha_entrega_tc5,$fecha_entrega_tc5),
				fecha_entrega_tc6=if(fecha_entrega_tc6 is not null,fecha_entrega_tc6,$fecha_entrega_tc6),
				
				fecha_entrega_pp1=if(fecha_entrega_pp1 is not null,fecha_entrega_pp1,$fecha_entrega_pp1),
				fecha_entrega_pp2=if(fecha_entrega_pp2 is not null,fecha_entrega_pp2,$fecha_entrega_pp2),
				fecha_entrega_pp3=if(fecha_entrega_pp3 is not null,fecha_entrega_pp3,$fecha_entrega_pp3),
				fecha_entrega_pp4=if(fecha_entrega_pp4 is not null,fecha_entrega_pp4,$fecha_entrega_pp4),
				fecha_entrega_pp5=if(fecha_entrega_pp5 is not null,fecha_entrega_pp5,$fecha_entrega_pp5),
				fecha_entrega_pp6=if(fecha_entrega_pp6 is not null,fecha_entrega_pp6,$fecha_entrega_pp6),
				
				fecha_entrega_ppdos1=if(fecha_entrega_ppdos1 is not null,fecha_entrega_ppdos1,$fecha_entrega_ppdos1),
				fecha_entrega_ppdos2=if(fecha_entrega_ppdos2 is not null,fecha_entrega_ppdos2,$fecha_entrega_ppdos2),
				fecha_entrega_ppdos3=if(fecha_entrega_ppdos3 is not null,fecha_entrega_ppdos3,$fecha_entrega_ppdos3),
				fecha_entrega_ppdos4=if(fecha_entrega_ppdos4 is not null,fecha_entrega_ppdos4,$fecha_entrega_ppdos4),
				fecha_entrega_ppdos5=if(fecha_entrega_ppdos5 is not null,fecha_entrega_ppdos5,$fecha_entrega_ppdos5),
				fecha_entrega_ppdos6=if(fecha_entrega_ppdos6 is not null,fecha_entrega_ppdos6,$fecha_entrega_ppdos6)


				
				WHERE 1=1
				and
				idprocedimiento = '$idprocedimiento'

				
				";
				$res=mysqli_query($con,$sql);
				



if($res ==true){
	
		echo "<script>
	swal({
  title: '',
  text: 'Registro Editado Exitosamente',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='index/index.php';   }, 1000);
        </script>";
	
	
}
else{
	

	
		echo "<script>
	swal({
  title: '',
  text: 'Fallo al Actualizar, contactese con el Administrador del sistema',
  showConfirmButton: false
});
	    setTimeout(function(){  window.location='index/index.php';   }, 1000);
        </script>";
	
	
	
}


?>




		