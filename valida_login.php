<?php
ini_set("session.cookie_lifetime","30000");
ini_set("session.gc_maxlifetime","30000");
session_start();
require_once 'conexion.php';
?>
 <html>

 <body style="background: url(wall3.jpg);background-size: cover;  background-repeat: no-repeat;" width="800px" height="600px">

  <head>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
   <style>
    .swal-modal {
     width: 478px;
     height: 200px;
     opacity: 0.0 - 1.0;
     font-family: "Arial", Times, serif;
     pointer-events: none;
     background-color: #fff;
     text-align: center;
     border-radius: 5px;
     position: static;
     margin: 5px 0 !important;
     display: inline-block;
     vertical-align: middle;
     -webkit-transform: scale(1);
     transform: scale(1);
     -webkit-transform-origin: 50% 50%;
     transform-origin: 50% 50%;
     z-index: 10001;
     transition: opacity .2s, -webkit-transform .3s;
     transition: transform .3s, opacity .2s;
     transition: transform .3s, opacity .2s, -webkit-transform .3s;
    }

    .swal-text {
     font-size: 16px;
     position: relative;

     float: none;
     line-height: normal;
     vertical-align: top;
     text-align: left;
     display: inline-block;
     margin: 0;
     padding: 0 10px;
     font-weight: 400;
     color: rgba(0, 0, 0, .64);
     max-width: calc(100% - 20px);
     overflow-wrap: break-word;
     box-sizing: border-box;
    }

   </style>
  </head>
 </body>

 </html>
 <?php

$password = $_POST['password'];
$r= $_POST['usuario'];
$sql="select u.usuario as usuario,u.password as password,u.idusuario as idusuario,
 t.tipousuario as tipousuario,t.idtipousuario as idtipousuario from usuario u, tipousuario t 
where u.usuario ='".mysqli_real_escape_string($con,$r)."' and u.password = '".mysqli_real_escape_string($con,$password)."'        
and u.idtipousuario = t.idtipousuario;
";  




if ($result=mysqli_query($con,$sql))
  {
	  	$tra= mysqli_fetch_array($result);
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount);
 // echo $sql;
  // Free result set
  mysqli_free_result($result);
  }

if($rowcount > 0 )
{
	
		$_SESSION["usuario"] = $r;
		$_SESSION["tipousuario"] = $tra["tipousuario"];
	    $_SESSION["idusuario"] = $tra["idusuario"];
		$_SESSION["idtipousuario"] = $tra["idtipousuario"];

if($tra["tipousuario"]== "USUARIO"){
	
		header("Location: /transcripciones/listadorvistausuarios/index.php");
}
else{

		header("Location: index/index.php");
	
}


}
else{

?>
  <script>
   swal({
    title: '',
    text: 'Usuario o Password Incorrectos',
    icon: "/transcripciones/img/warning2.png",
    buttons: false,
    showConfirmButton: false
   });
   setTimeout(function() {
    window.location = '/transcripciones/index.php';
   }, 1000);

  </script>


  <?php }
?>
