<?php 

ini_set("session.cookie_lifetime","30000");
ini_set("session.gc_maxlifetime","30000");
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




$col = array();
$col["title"] = "Codigo"; // caption of column
$col["name"] = "idprocedimiento"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = false;
$col["link"] = "../edicion.php?idprocedimiento={idprocedimiento}"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist 
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
//$col["linkoptions"] = "target='_blank'   style='color:red;"; // extra params with <a> tag  
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




$opt["rowNum"] = 50   ; // by default 20
$opt["rowList"] = array(10,50,100,All);
// export PDF file params 
$opt["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4"); 
// for excel, sheet header 
$opt["export"]["sheetname"] = "Invoice Details"; 
// export filtered data or all data 
$opt["export"]["range"] = "filtered"; // or "all" 
$opt["sortname"] = 'fechacliente'; // by default sort grid by this field
$opt["sortorder"] = "asc"; // ASC or DESC
$opt["caption"] = "Esteno- Listado de Planificaciones Atrasadas"; // caption of grid
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

$g->set_options($opt);

// you can provide custom SQL query to display data
$g->select_command = "

SELECT p.idprocedimiento, p.nombrearchivo, p.duracion, p.cliente, p.fechacliente,
p.tiempotr1,p.tiempotr2,p.tiempotr3,p.tiempotr4,p.tiempotr5,p.tiempotr6,
p.tiempotc1,p.tiempotc2,p.tiempotc3,p.tiempotc4,p.tiempotc5,p.tiempotc6,
p.tiempopp1,p.tiempopp2,p.tiempopp3,p.tiempopp4,p.tiempopp5,p.tiempopp6,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtranscriptor1 = u.idusuario) as idtranscriptor1,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtranscriptor2 = u.idusuario) as idtranscriptor2,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtranscriptor3 = u.idusuario) as idtranscriptor3,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtranscriptor4 = u.idusuario) as idtranscriptor4,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtranscriptor5 = u.idusuario) as idtranscriptor5,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtranscriptor6 = u.idusuario) as idtranscriptor6,
p.fechainterna1, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtimecoder1 = u.idusuario) as idtimecoder1, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtimecoder2 = u.idusuario) as idtimecoder2, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtimecoder3 = u.idusuario) as idtimecoder3, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtimecoder4 = u.idusuario) as idtimecoder4, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtimecoder5 = u.idusuario) as idtimecoder5, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idtimecoder6 = u.idusuario) as idtimecoder6, 
 p.fechainterna2,
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idpostproductor1 = u.idusuario) as idpostproductor1, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idpostproductor2 = u.idusuario) as idpostproductor2, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idpostproductor3 = u.idusuario) as idpostproductor3, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idpostproductor4 = u.idusuario) as idpostproductor4, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idpostproductor5 = u.idusuario) as idpostproductor5, 
(select  CONCAT(u.nombre, ' ',  u.apellido) from usuario u where p.idpostproductor6 = u.idusuario) as idpostproductor6, 
 p.fechainterna3,
case p.estadointerno when 0 then '(Sin especificar)' when 1 then 'Asignado' when 2 then 'Atrasado' when 3 then 'Entregado' end as estadointerno,
case p.estadocliente when 0 then '(Sin especificar)' when 1 then 'Cancelado' when 2 then 'En Proceso' when 3 then 'Suspendido' when 4 then 'Entregado' end as estadocliente
 FROM procedimiento p where 1=1
 and
 estadointerno = 2

";



// pass the cooked columns to grid
$g->set_columns($cols);


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

// this db table will be used for add,edit,delete
$g->table = "procedimiento";










// you can customize your own columns ...



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
.focus-cell
	{
		background: Yellow;
		
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
	<?php echo $out?>
	</div>
	

	<?php require_once("../footer/footer.php")  ?>
	
</body>
</html>
