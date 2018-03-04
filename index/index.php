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


// you can customize your own columns ...


$col = array();
$col["title"] = "Codigo"; // caption of column
$col["name"] = "idprocedimiento"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = false;
$col["link"] = "../edicion.php?idprocedimiento={idprocedimiento}"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist 
$col["linkoptions"] = "target='_self'   style='color:#2ca9d8;text-decoration: underline'"; // extra params with <a> tag  
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



// conditional css formatting of rows 
$f = array(); 
$f["column"] = "estadocliente"; 
$f["op"] = "="; 
$f["value"] = "Cancelado"; 
$f["cellcss"] = "'background-color':'red'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 

$f = array(); 
$f["column"] = "estadocliente"; 
$f["op"] = "="; 
$f["value"] = "En Proceso"; 
$f["cellcss"] = "'background-color':'green'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 



$f = array(); 
$f["column"] = "estadocliente"; 
$f["op"] = "="; 
$f["value"] = "Suspendido"; 
$f["cellcss"] = "'background-color':'aqua'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 

$f = array(); 
$f["column"] = "estadocliente"; 
$f["op"] = "="; 
$f["value"] = "Entregado"; 
$f["cellcss"] = "'background-color':'yellow'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 




$col = array();
$col["title"] = "Paso"; // caption of column
$col["name"] = "paso"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "5";
$col["editable"] = false;
$cols[] = $col;	



// conditional css formatting of rows 
$f = array(); 
$f["column"] = "paso"; 
$f["op"] = "="; 
$f["value"] = "Paso 1"; 
$f["cellcss"] = "'background-color':'yellow'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 

$f = array(); 
$f["column"] = "paso"; 
$f["op"] = "="; 
$f["value"] = "Paso 2"; 
$f["cellcss"] = "'background-color':'red'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 



$f = array(); 
$f["column"] = "paso"; 
$f["op"] = "="; 
$f["value"] = "Paso 3"; 
$f["cellcss"] = "'background-color':'aqua'"; // this also work 
//$f["cellclass"] = "focus-cell"; 
$f_conditions[] = $f; 





$opt = array();
$opt["rowList"] = array(10,50,100,All);
// export PDF file params 
$opt["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4"); 
// for excel, sheet header 
$opt["export"]["sheetname"] = "Invoice Details"; 
// export filtered data or all data 
$opt["export"]["range"] = "filtered"; // or "all" 

$opt["export"]["range"] = "filtered"; // or "all"
$opt["export"]["paged"] = "1";
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
//$opt["autoheight"] = true;
//$opt["height"] = "700";
$opt["sortable"] = false;
$opt["pgbuttons"] = true;
//$opt["page"] = 1;
$opt["rowactions"] = true; // allow you to multi-select through checkboxes

$g->set_options($opt);



$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>false, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>false, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"export_excel"=>true, // export excel button 
                        "export_pdf"=>true, // export pdf button 
                        "export_csv"=>true, // export csv button 
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
						
					) 
				);
// this db table will be used for add,edit,delete
$g->table = "procedimiento";
// you can provide custom SQL query to display data
$g->select_command = '

SELECT p.idprocedimiento, p.nombrearchivo, p.duracion, p.cliente, p.fechacliente,
p.tiempotr1,p.tiempotr2,p.tiempotr3,p.tiempotr4,p.tiempotr5,p.tiempotr6,
p.tiempotc1,p.tiempotc2,p.tiempotc3,p.tiempotc4,p.tiempotc5,p.tiempotc6,
p.tiempopp1,p.tiempopp2,p.tiempopp3,p.tiempopp4,p.tiempopp5,p.tiempopp6,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtranscriptor1 = u.idusuario) as idtranscriptor1,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtranscriptor2 = u.idusuario) as idtranscriptor2,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtranscriptor3 = u.idusuario) as idtranscriptor3,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtranscriptor4 = u.idusuario) as idtranscriptor4,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtranscriptor5 = u.idusuario) as idtranscriptor5,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtranscriptor6 = u.idusuario) as idtranscriptor6,
p.fechainterna1, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtimecoder1 = u.idusuario) as idtimecoder1, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtimecoder2 = u.idusuario) as idtimecoder2, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtimecoder3 = u.idusuario) as idtimecoder3, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtimecoder4 = u.idusuario) as idtimecoder4, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtimecoder5 = u.idusuario) as idtimecoder5, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idtimecoder6 = u.idusuario) as idtimecoder6, 
 p.fechainterna2,
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idpostproductor1 = u.idusuario) as idpostproductor1, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idpostproductor2 = u.idusuario) as idpostproductor2, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idpostproductor3 = u.idusuario) as idpostproductor3, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idpostproductor4 = u.idusuario) as idpostproductor4, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idpostproductor5 = u.idusuario) as idpostproductor5, 
(select  CONCAT(u.nombre, " ",  u.apellido) from usuario u where p.idpostproductor6 = u.idusuario) as idpostproductor6, 
 p.fechainterna3,
case p.estadointerno when 0 then "(Sin especificar)" when 1 then "Asignado" when 2 then "Atrasado" when 3 then "Entregado" end as estadointerno,
case p.estadocliente when 0 then "(Sin especificar)" when 1 then "Cancelado" when 2 then "En Proceso" when 3 then "Suspendido" when 4 then "Entregado" end as estadocliente,





vista_paso_procedimientos.paso
 FROM procedimiento p
	left join(

		select

		idprocedimiento,
		if(
			sum(
				if(
					cargo_empleado="Postproductor",
					1,
					0
				)
			)>0,
			"Paso 3",
			if(
				sum(
					if(
						cargo_empleado="Timecoder",
						1,
						0
					)
				)>0,
				"Paso 2",
				if(
					sum(
						if(
							cargo_empleado="Transcriptor",
							1,
							0
						)
					)>0,
					"Paso 1",
					NULL
				)
			)
		) paso

		from (
				select
				
				idprocedimiento,
				idtranscriptor1 id_empleado,
				tiempotr1 tiempo_empleado,
				fecha_entrega_tr1 fecha_entrega,
				fecha_plazo_tr1 fecha_plazo,
				"Transcriptor" cargo_empleado,
				1 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtranscriptor2 id_empleado,
				tiempotr2 tiempo_empleado,
				fecha_entrega_tr2 fecha_entrega,
				fecha_plazo_tr2 fecha_plazo,
				"Transcriptor" cargo_empleado,
				2 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtranscriptor3 id_empleado,
				tiempotr3 tiempo_empleado,
				fecha_entrega_tr3 fecha_entrega,
				fecha_plazo_tr3 fecha_plazo,
				"Transcriptor" cargo_empleado,
				3 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtranscriptor4 id_empleado,
				tiempotr4 tiempo_empleado,
				fecha_entrega_tr4 fecha_entrega,
				fecha_plazo_tr4 fecha_plazo,
				"Transcriptor" cargo_empleado,
				4 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtranscriptor5 id_empleado,
				tiempotr5 tiempo_empleado,
				fecha_entrega_tr5 fecha_entrega,
				fecha_plazo_tr5 fecha_plazo,
				"Transcriptor" cargo_empleado,
				5 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtranscriptor6 id_empleado,
				tiempotr6 tiempo_empleado,
				fecha_entrega_tr6 fecha_entrega,
				fecha_plazo_tr6 fecha_plazo,
				"Transcriptor" cargo_empleado,
				6 numero

				from procedimiento






				union all

				select

				idprocedimiento,
				idtimecoder1 id_empleado,
				tiempotc1 tiempo_empleado,
				fecha_entrega_tc1 fecha_entrega,
				fecha_plazo_tc1 fecha_plazo,
				"Timecoder" cargo_empleado,
				1 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtimecoder2 id_empleado,
				tiempotc2 tiempo_empleado,
				fecha_entrega_tc2 fecha_entrega,
				fecha_plazo_tc2 fecha_plazo,
				"Timecoder" cargo_empleado,
				2 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtimecoder3 id_empleado,
				tiempotc3 tiempo_empleado,
				fecha_entrega_tc3 fecha_entrega,
				fecha_plazo_tc3 fecha_plazo,
				"Timecoder" cargo_empleado,
				3 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtimecoder4 id_empleado,
				tiempotc4 tiempo_empleado,
				fecha_entrega_tc4 fecha_entrega,
				fecha_plazo_tc4 fecha_plazo,
				"Timecoder" cargo_empleado,
				4 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtimecoder5 id_empleado,
				tiempotc5 tiempo_empleado,
				fecha_entrega_tc5 fecha_entrega,
				fecha_plazo_tc5 fecha_plazo,
				"Timecoder" cargo_empleado,
				5 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idtimecoder6 id_empleado,
				tiempotc6 tiempo_empleado,
				fecha_entrega_tc6 fecha_entrega,
				fecha_plazo_tc6 fecha_plazo,
				"Timecoder" cargo_empleado,
				6 numero

				from procedimiento







				union all

				select

				idprocedimiento,
				idpostproductor1 id_empleado,
				tiempopp1 tiempo_empleado,
				fecha_entrega_pp1 fecha_entrega,
				fecha_plazo_pp1 fecha_plazo,
				"Postproductor" cargo_empleado,
				1 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductor2 id_empleado,
				tiempopp2 tiempo_empleado,
				fecha_entrega_pp2 fecha_entrega,
				fecha_plazo_pp2 fecha_plazo,
				"Postproductor" cargo_empleado,
				2 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductor3 id_empleado,
				tiempopp3 tiempo_empleado,
				fecha_entrega_pp3 fecha_entrega,
				fecha_plazo_pp3 fecha_plazo,
				"Postproductor" cargo_empleado,
				3 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductor4 id_empleado,
				tiempopp4 tiempo_empleado,
				fecha_entrega_pp4 fecha_entrega,
				fecha_plazo_pp4 fecha_plazo,
				"Postproductor" cargo_empleado,
				4 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductor5 id_empleado,
				tiempopp5 tiempo_empleado,
				fecha_entrega_pp5 fecha_entrega,
				fecha_plazo_pp5 fecha_plazo,
				"Postproductor" cargo_empleado,
				5 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductor6 id_empleado,
				tiempopp6 tiempo_empleado,
				fecha_entrega_pp6 fecha_entrega,
				fecha_plazo_pp6 fecha_plazo,
				"Postproductor" cargo_empleado,
				6 numero

				from procedimiento







				union all

				select

				idprocedimiento,
				idpostproductordos1 id_empleado,
				tiempoppdos1 tiempo_empleado,
				fecha_entrega_ppdos1 fecha_entrega,
				fecha_plazo_ppdos1 fecha_plazo,
				"Postproductor" cargo_empleado,
				1 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos2 id_empleado,
				tiempoppdos2 tiempo_empleado,
				fecha_entrega_ppdos2 fecha_entrega,
				fecha_plazo_ppdos2 fecha_plazo,
				"Postproductor" cargo_empleado,
				2 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos3 id_empleado,
				tiempoppdos3 tiempo_empleado,
				fecha_entrega_ppdos3 fecha_entrega,
				fecha_plazo_ppdos3 fecha_plazo,
				"Postproductor" cargo_empleado,
				3 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos4 id_empleado,
				tiempoppdos4 tiempo_empleado,
				fecha_entrega_ppdos4 fecha_entrega,
				fecha_plazo_ppdos4 fecha_plazo,
				"Postproductor" cargo_empleado,
				4 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos5 id_empleado,
				tiempoppdos5 tiempo_empleado,
				fecha_entrega_ppdos5 fecha_entrega,
				fecha_plazo_ppdos5 fecha_plazo,
				"Postproductor" cargo_empleado,
				5 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos6 id_empleado,
				tiempoppdos6 tiempo_empleado,
				fecha_entrega_ppdos6 fecha_entrega,
				fecha_plazo_ppdos6 fecha_plazo,
				"Postproductor" cargo_empleado,
				6 numero

				from procedimiento
			) vista_empleados_procedimientos
				inner join usuario on
					usuario.idusuario=vista_empleados_procedimientos.id_empleado


			group by
				idprocedimiento

	) vista_paso_procedimientos on
		vista_paso_procedimientos.idprocedimiento=p.idprocedimiento





 where 1=1 having 1=1

';


// pass the cooked columns to grid
$g->set_columns($cols);


$e["on_render_pdf"] = array("filter_pdf", null, true); 
$e["on_render_excel"] = array("filter_xls", null, true); 
$e["on_data_display"] = array("filter_display", null, true); 
$g->set_events($e); 


$g->set_conditional_css($f_conditions);


// generate grid output, with unique grid name as 'list1'
ob_clean();
$out = $g->render("list1");



// filter PDF output 
function filter_pdf($param) 
{ 
  //  for($x=1; $x<count($param["data"]); $x++) 
        //$param["data"][$x]["estadointerno"] = "<img src='http://www.phpgrid.org/wp-content/uploads/customer-logos/iba.jpg'>"; // must be jpg 
} 
// filter Excel output 
function filter_xls($param) 
{ 
    //for($x=1; $x<count($param["data"]); $x++) 
      //  $param["data"][$x]["estadointerno"] = "/".$param["data"][$x]["note"]."/Excel"; 
} 
// filter Grid output 
function filter_display($param) 
{ 
   // $d = &$param["params"]; 
     
    //for($x=1; $x<count($d); $x++) 
      //  $d[$x]["note"] = "/".$d[$x]["note"]."/Display"; 
} 


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
	
	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/transcripciones/assets/css/bootstrap-responsive.css" rel="stylesheet">
	
	
    <script src="../js/bootstrap.min.js"></script>
	 <script src="../js/jquery-ui-1.10.3.custom.js"></script>
</head>
<body>


<?php
//mostramos el header
require_once('../menu.php');
?>
<div class="container-fluid">
<div align="center">
<link rel="icon" type="image/png" href="icons/favicon.png">

<form action="control.php" enctype="multipart/form-data"  method="post">
<table border="0">
 <th>
 <div align="center"> <span class="label label-default">Importar Archivo CSV </br></div>
 <span class="label label-info">(Orden: Codigo,Fecha Cliente, Nombre Archivo, Duracion, Cliente)</span>

 </th>
 <tr> 

   <td> 
     

      <input id="archivo"  accept=".csv" name="archivo" type="file" /> 
	  	
	 </td> 
	  <td> 
	     <input name="enviar" class="btn btn-primary" type="submit" value="Importar" />
	    </td> 
	   <td> 
	      <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
   
		 </td> 
	   </tr> 
	   
	    <tr> 
		 
		  <td> 
	
		    </td> 
			 
			  </tr> 
 
 
</form>
  </div>
 </div>

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


	<div style="margin:10px">
	<?php echo $out?>
	</div>

<?php require_once("../footer/footer.php")  ?>
	
</html>
