<?php
require_once 'conexion.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
 <title>Esteno Chile</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

 <style>
  .navbar-custom {
   color: #ffffff!important;
   border-radius: 0!important;
  }

  .navbar-header {
   display: flex!important;
   align-items: center!important;
  }

  .navbar-custom .navbar-nav>li>a {
   color: #428bca!important;
   white-space: pre!important;
  }
  
  .navbar .container-fluid{
    display: flex;
    flex-direction: row;
  }

  #menucollapsible {
   display: flex;
   flex-direction: row;
   flex-wrap: wrap!important;
   justify-content: center!important;
   max-height: none;
   width: 100%;
  }

  .midiv {
   display: flex;
   align-items: center!important;
   color: #428bca!important;
   margin-left: auto;
  }

  .navbar-nav {
   display: flex!important;
   align-items: center!important;
  }

  .divatrasados {

   margin-left: 44%!important;

   color: #428bca!important;
  }

  .container {
   width: auto!important;
  }
  
  select.form-control{
    height: inherit!important;
  }

  @media (max-width: 1232px) {
  .midiv {
    margin: 0;
  }
  


  .navbar .container-fluid,
  #menucollapsible{
      flex-direction: column;
      align-items: center;
    }
  }

  @media (min-width: 768px){
    .navbar-nav.collapse{
      display: flex!important;
    }
  }

  @media (max-width: 768px) {
   #menucollapsible {
    flex-direction: column!important;
    align-self: center;
    align-items: stretch;
    width: 100%;
    width: -webkit-fill-available;
    width: -moz-available;

   }

   .navbar .container-fluid{
    align-items: stretch;
   }

   .navbar-collapse.in{
    display: flex!important;
   }

   .navbar-collapse.collapse{
    display: none!important;
   }

   .midiv {
    order: 0!important;
    flex: auto!important;
    align-self: center;
   }

   .navbar-nav {
    flex-direction: column!important;
    align-items: stretch!important;
    order: 1!important;
   }

   .navbar-nav li a {
    text-align: center!important;
   }

   span.caret {
    display: none!important;
   }

   .navbar .nav>li>.dropdown-menu:before {
    display: none!important;
   }

   .navbar-toggle {
    order: 1!important;
    margin-left: auto!important;
   }
  }

  @media(max-width: 490px){
    .midiv{
      flex-wrap: wrap;
      justify-content: space-around;
    }

    #breakpoint{
      flex: 1 1 100%;
    }
  }

 </style>

 <style>
  /*paginacion*/

  .paginacion a.active {
   background-color: blue!important;
   color: #ffffff!important;
  }

  .inline-block {
   display: inline-block !important;
   vertical-align: middle!important;
  }

 </style>



</head>

<body>
 <div class="container">
  <nav class="navbar navbar-custom navbar-default">
   <div class="container-fluid">
    <div class="navbar-header">
     <button id="togglemenubutton" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menucollapsible" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <img border="0" alt="Esteno" src="/transcripciones/img/logo.png">
    </div>

    <div id="menucollapsible" class="collapse navbar-collapse">

     <ul class="nav navbar-nav">
      <li class="active"><a href="/transcripciones/index/index.php">Home</a></li>
      <?php if($_SESSION["tipousuario"] == "ADMINISTRADOR"){   ?>
      <li><a href="/transcripciones/index/index.php" target="_self">Planificaciones</a></li>
      <?php   } ?>

      <?php if($_SESSION["tipousuario"] == "ASISTENTE"){   ?>
      <li><a href="/transcripciones/index/index.php" target="_self">Planificaciones</a></li>
      <?php   } ?>

      <?php if($_SESSION["tipousuario"] == "USUARIO"){   ?>
      <li><a href="/transcripciones/listadorvistausuarios/index.php" target="_self">Planificaciones</a></li>
      <?php   } ?>


      <?php if($_SESSION["tipousuario"] == "ADMINISTRADOR"){   ?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" target="_self">Usuarios <span class="caret"></span></a>
       <ul class="dropdown-menu">
        <li><a href="/transcripciones/nuevousuario.php" target="_self">Nuevo Usuario</a></li>
        <li><a href="/transcripciones/listadorusuarios/index.php">Listado de Usuarios</a></li>

       </ul>
      </li>
      <?php   } ?>

      <?php if($_SESSION["tipousuario"] == "ADMINISTRADOR"){   ?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" target="_self">Reportes <span class="caret"></span></a>
       <ul class="dropdown-menu">
        <li><a href="/transcripciones/listadorfiltroarchivos/index.php" target="_self">Reporte Archivos</a></li>
        <li><a href="/transcripciones/listadotiempos/index.php">Reporte de Minutos</a></li>

       </ul>
      </li>
      <?php   } ?>


      <?php if($_SESSION["tipousuario"] == "ADMINISTRADOR"){   ?>
      <li><a href="/transcripciones/listadorlog/index.php" target="_self">Ver Log</a></li>

      <?php   } ?>

      <li><a href="/transcripciones/logout.php" target="_self">Log Out</a></li>

     </ul>

     <?php 
if($_SESSION["tipousuario"] == "ADMINISTRADOR" || $_SESSION["tipousuario"] == "ASISTENTE"){

$idusuario = $_SESSION["idusuario"];
$usuario = $_SESSION["usuario"];
  ?>

     <div class="midiv">


      <span>Bienvenido</span> <a href="/transcripciones/edicionusuario2.php?idusuario=<?php echo $idusuario?>"> <div id="breakpoint"></div> <span style="" class="label label-success" >  <?php   echo strtoupper($_SESSION["usuario"]);  ?> </span>   </a>


      <br/>


      <?php 
 $sql233 = "select estadointerno from procedimiento WHERE 1=1 
and estadointerno = 2";
 if ($result233=mysqli_query($con,$sql233))
  {

  $rowcount=mysqli_num_rows($result233);

  }
  

if($rowcount > 0 )
{
 ?>
      <a href="/transcripciones/listadoratrasados/index.php">
<span  class="label label-danger">Tiene Archivos Atrasados</span> 
</a>
      <a href="/transcripciones/listadoratrasados/index.php">
<img border="0" alt="Tiene Archivos Atrasados" title= "Tiene Archivos Atrasados " src="/transcripciones/img/campana2.gif" width="44px" height="">
</a>

      <?php 
 
}

else {
?>

      <span class="label label-primary">No tiene Archivos Atrasados</span><img border="0" alt="No Tiene Archivos Atrasados" src="/transcripciones/img/campana.png" width="44px" height="">

      <?php } 

}
?>

     </div>
    </div>





   </div>
  </nav>

 </div>