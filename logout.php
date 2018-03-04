<?php
session_start();

$_SESSION["tipousuario"] = "";
$_SESSION["usuario"]= "";
$_SESSION["idusuario"] = "";
$_SESSION["idtipousuario"] = "";
header ("Location: index.php");

?>