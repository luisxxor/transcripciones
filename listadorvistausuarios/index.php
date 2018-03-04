

<?php 

ini_set("session.cookie_lifetime","2700");
ini_set("session.gc_maxlifetime","2700");
session_start();
if($_SESSION["usuario"] == ""){
	
header("Location: ../index.php");
}
header('Content-Type: text/html; charset=UTF-8');

$idusuario = $_SESSION["idusuario"];


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
$opt["sortname"] = 'fechacliente'; // by default sort grid by this field
$opt["sortorder"] = "asc"; // ASC or DESC
$opt["caption"] = "Esteno- Listado de Planificaciones"; // caption of grid
$opt["autowidth"] = true; // expand grid to screen width
//$opt["width"] = "1800";
//$opt["multiselect"] = false; // allow you to multi-select through checkboxes
$opt["altRows"] = true; 
$opt["altclass"] = "myAltRowClass"; 
//$opt["autoresize"] = true; // defaults to false 
//$opt["scroll"] = true; 
$opt["autoheight"] = true;
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

SELECT `idprocedimiento`, `nombrearchivo`, `duracion`, `cliente`, `fechacliente`,

case estadointerno when 0 then '(Sin especificar)' when 1 then 'Asignado' when 2 then 'Atrasado' when 3 then 'Entregado' end as estadointerno,
case estadocliente when 0 then '(Sin especificar)' when 1 then 'Cancelado' when 2 then 'En Proceso' when 3 then 'Suspendido' when 4 then 'Entregado' end as estadocliente

 FROM `procedimiento` WHERE 1=1
AND
idtranscriptor1 = $idusuario
OR
idtranscriptor2 = $idusuario
OR
idtranscriptor3 = $idusuario
OR
idtranscriptor4 = $idusuario
OR
idtranscriptor5 = $idusuario
OR
idtranscriptor6 = $idusuario
OR
idtimecoder1 = $idusuario
OR
idtimecoder2 = $idusuario
OR
idtimecoder3 = $idusuario
OR
idtimecoder4 = $idusuario
OR
idtimecoder5 = $idusuario
OR
idtimecoder6 = $idusuario
OR
idpostproductor1 = $idusuario
OR
idpostproductor2 = $idusuario
OR
idpostproductor3 = $idusuario
OR
idpostproductor4 = $idusuario
OR
idpostproductor5 = $idusuario
OR
idpostproductor6 = $idusuario

";

$sql2 = "
select estadointerno,estadocliente, fechacliente
 FROM procedimiento where 1=1 order by fechacliente asc";
 
   $query = mysqli_query($con,$sql2); 
  $tra= mysqli_fetch_array($query); 


// this db table will be used for add,edit,delete
$g->table = "procedimiento";

// you can customize your own columns ...


$col = array();
$col["title"] = "Codigo"; // caption of column
$col["name"] = "idprocedimiento"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = false;

$col["link"] = "../edicionvistausuario.php?idprocedimiento={idprocedimiento}"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist 
$col["linkoptions"] = "target='_blank'   style='color:#2ca9d8;text-decoration: underline'"; // extra params with <a> tag  
$cols[] = $col;		

$col = array();
$col["title"] = "Nombre Archivo"; // caption of column
$col["name"] = "nombrearchivo"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "35";
$col["editable"] = false;
$cols[] = $col;	

$col = array();
$col["title"] = "Duracion"; // caption of column
$col["name"] = "duracion"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = true;
$col["link"] = "#"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist 
$col["linkoptions"] = "target='_blank'   style='color:red;"; // extra params with <a> tag  
$cols[] = $col;	




$col = array();
$col["title"] = "Fecha Cliente"; // caption of column
$col["name"] = "fechacliente"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$cols[] = $col;



$col = array();
$col["title"] = "Cliente"; // caption of column
$col["name"] = "cliente"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = false;
$cols[] = $col;	


$col = array();
$col["title"] = "Estado Interno"; // caption of column
$col["name"] = "estadointerno"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = false;
$col["op"] = "cn"; // cn - contains, eq - equals
$col["value"] = "(";
$col["css"] = "'background-color':'yellow'";
$cols[] = $col;	




$col = array();
$col["title"] = "Estado Cliente"; // caption of column
$col["name"] = "estadocliente"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
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

	<link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css"></link>

	 <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="/transcripciones/lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="/transcripciones/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="/transcripciones/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	
	
	
	
	
	
	
	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/transcripciones/assets/css/bootstrap-responsive.css" rel="stylesheet">
	
	
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<?php
//mostramos el header
require_once('../menu.php');
?>

 

<style>
.focus-cell
	{
		background: red;
		color: red;
	}
	</style>
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
	</style>

	<div align ="center">
	<div style="margin:10px">
	<?php echo $out?>
	</div>
	</div>
	

	<?php require_once("../footer/footer.php");?>
	
</body>
</html>
