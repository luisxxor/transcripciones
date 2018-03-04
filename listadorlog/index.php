

<?php 

ini_set("session.cookie_lifetime","2700");
ini_set("session.gc_maxlifetime","2700");
session_start();
if($_SESSION["usuario"] == ""){
	
header("Location: ../index.php");
}
header('Content-Type: text/html; charset=UTF-8');



/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

// include db config
include_once("../config.php");

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array( 	
					"type" 		=> PHPGRID_DBTYPE, 
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf);

$opt = array();
$opt["rowNum"] = 50   ; // by default 20
$opt["sortname"] = 'idlog'; // by default sort grid by this field
$opt["sortorder"] = "desc"; // ASC or DESC
$opt["caption"] = "Esteno- Listado de Logs"; // caption of grid
$opt["autowidth"] = true; // expand grid to screen width
//$opt["width"] = "1800";
//$opt["multiselect"] = false; // allow you to multi-select through checkboxes
$opt["altRows"] = true; 
$opt["altclass"] = "myAltRowClass"; 
//$opt["autoresize"] = true; // defaults to false 
//opt["scroll"] = false; 
//$opt["autoheight"] = true;
//$opt["height"] = "700";
$opt["sortable"] = false;
$opt["pgbuttons"] = true;
//$opt["page"] = 1;
$opt["forceFit"] = true;

        


$opt["rowactions"] = true; // allow you to multi-select through checkboxes

// export XLS file
// export to excel parameters
$opt["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");

$g->set_options($opt);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>false, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>false, // show/hide row wise edit/del/save option
						"showhidecolumns"=>false, // show/hide row wise edit/del/save option
						"export"=>false, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "
SELECT idlog,accion,usuario,fecha,idprocedimiento from log where 1=1
  
";

// this db table will be used for add,edit,delete
$g->table = "usuario";

// you can customize your own columns ...


$col = array();
$col["title"] = "#"; // caption of column
$col["name"] = "idlog"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "1";
$cols[] = $col;		

$col = array();
$col["title"] = "Accion"; // caption of column
$col["name"] = "accion"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = false;
$cols[] = $col;	


$col = array();
$col["title"] = "Usuario"; // caption of column
$col["name"] = "usuario"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = false;
$cols[] = $col;	




$col = array();
$col["title"] = "Fecha"; // caption of column
$col["name"] = "fecha"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = false;
$cols[] = $col;	

$col = array();
$col["title"] = "Codigo Planificacion"; // caption of column
$col["name"] = "idprocedimiento"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["link"] = "../edicion.php?idprocedimiento={idprocedimiento}"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist 
$col["linkoptions"] = "target='_blank'   style='color:#163466;text-decoration: underline'"; // extra params with <a> tag  
$col["editable"] = false;
$cols[] = $col;		




// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/cupertino/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap3.min.css"></link>
	
	<script src="/transcripciones/lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="/transcripciones/lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="/transcripciones/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	
	<script src="/transcripciones/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	
	
    <script src="../js/bootstrap.min.js"></script>
	 <script src="../js/jquery-ui-1.10.3.custom.js"></script>
</head>
<body>
<?php
//mostramos el header
require_once('../menu.php');
?>

	<style>
	
	.dropdown-toggle {   
    overflow: hidden;
    padding-right: 24px /* Optional for caret */;
    text-align: left;
    text-overflow: ellipsis;    
 
}
.form-control {   
   height: 30px;
}
	
    .myAltRowClass { background-color: #F1F1F1; background-image: none; }
	
	
		.ui-jqgrid .ui-pg-selbox {
    line-height: 18px;
    display: block;
    height: 28px !important;
    margin: 0;
}


.ui-jqgrid .ui-pg-input {
    height: 23px !important;
    margin: 0;
}
	
	
	</style>

	
	<div style="margin:10px" align="center">
	<?php 
	 if($_SESSION["usuario"] == "" || $_SESSION["tipousuario"] != "ADMINISTRADOR")
 {
	 
	  echo "<script type = 'text/javascript'>
	alert('Debes ser administrador');
		window.location='index.php';
	</script>";
	
	 
 }
	else
	{
	echo $out;
	
	}
	
	
	
	?>
	</div>
	
  <?php require_once("../footer/footer.php")  ?>
	
	
</body>
</html>
