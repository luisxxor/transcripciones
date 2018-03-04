

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
$opt["rowList"] = array(10,50,100,All);
// export PDF file params 
$opt["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4"); 
// for excel, sheet header 
$opt["export"]["sheetname"] = "Invoice Details"; 
// export filtered data or all data 
$opt["export"]["range"] = "filtered"; // or "all" 
$opt["sortname"] = 'idusuario'; // by default sort grid by this field
$opt["sortorder"] = "asc"; // ASC or DESC
$opt["caption"] = "Esteno- Listado de Usuarios"; // caption of grid
$opt["autowidth"] = true; // expand grid to screen width
$opt["autoheight"] = true;
//$opt["width"] = "1800";
//$opt["multiselect"] = false; // allow you to multi-select through checkboxes
$opt["altRows"] = true; 
$opt["altclass"] = "myAltRowClass"; 
//$opt["autoresize"] = true; // defaults to false 
//$opt["scroll"] = true; 
//$opt["height"] = "700";
$opt["sortable"] = false;
$opt["pgbuttons"] = true;
//$opt["page"] = 1;
$opt["forceFit"] = true;
$opt["rowactions"] = true; // allow you to multi-select through checkboxes


$g->set_options($opt);

$e["on_render_pdf"] = array("filter_pdf", null, true); 
$e["on_render_excel"] = array("filter_xls", null, true); 
$e["on_data_display"] = array("filter_display", null, true); 
$g->set_events($e); 


$g->set_actions(array(	
	"add"=>false, // allow/disallow add
						"edit"=>false, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"export_excel"=>true, // export excel button 
                        "export_pdf"=>true, // export pdf button 
                        "export_csv"=>true, // export csv button 
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "
SELECT u.usuario as usuario, u.idusuario as idusuario, t.tipousuario as tipousuario, u.nombre as nombre, u.apellido as apellido,
(select c.cargo from cargo c where u.idcargo1 = c.idcargo) as idcargo1,
(select c.cargo from cargo c where u.idcargo2 = c.idcargo) as idcargo2,
(select c.cargo from cargo c where u.idcargo3 = c.idcargo) as idcargo3
 from usuario u, tipousuario t
 where 
 u.idtipousuario = t.idtipousuario
  
";

// this db table will be used for add,edit,delete
$g->table = "usuario";

// you can customize your own columns ...


$col = array();
$col["title"] = "#"; // caption of column
$col["name"] = "idusuario"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "1";

$col["link"] = "../edicionusuario.php?idusuario={idusuario}"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist 
$col["linkoptions"] = "target='_blank'   style='color:#163466;text-decoration: underline'"; // extra params with <a> tag  
$col["editable"] = false;
$cols[] = $col;		

$col = array();
$col["title"] = "Usuario"; // caption of column
$col["name"] = "usuario"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col;	


$col = array();
$col["title"] = "Nombre"; // caption of column
$col["name"] = "nombre"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col;	




$col = array();
$col["title"] = "Apellido"; // caption of column
$col["name"] = "apellido"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col;	

$col = array();
$col["title"] = "Tipo"; // caption of column
$col["name"] = "tipousuario"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col;		

$col = array();
$col["title"] = "Cargo 1"; // caption of column
$col["name"] = "idcargo1"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col;		

$col = array();
$col["title"] = "Cargo 2"; // caption of column
$col["name"] = "idcargo2"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$cols[] = $col;		

	
$col = array();
$col["title"] = "Cargo 3"; // caption of column
$col["name"] = "idcargo3"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "15";
$cols[] = $col;		

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
ob_clean();
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
