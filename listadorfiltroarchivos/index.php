<?php 
ini_set("session.cookie_lifetime","30000"); 
ini_set("session.gc_maxlifetime","30000"); 
session_start(); 
require_once ('../conexion.php'); 
if($_SESSION["usuario"] == "") 	   
   {   
	return header("Location: index.php");  	  
   }     
   if($_SESSION["tipousuario"] == "usuario" ) 
   {      
	return header("Location: index.php");  			  
   }  
	 header('Content-Type: text/html; charset=UTF-8'); 
			 require_once('../menu.php');

			 
			 
			 
	//Variables de busqueda
	if(strtolower(@$_GET['mostrar-todo'])=='si'){
		@$_SESSION['filtro_archivos_x_selectcliente']='';
		@$_SESSION['filtro_archivos_x_fechainicio']='';
		@$_SESSION['filtro_archivos_x_fechatermino']='';

		@$_SESSION['filtro_archivos_pagina_actual']=1;
	}
	$x_selectcliente = @$_GET['selectcliente']<>'' ? @$_GET['selectcliente'] : @$_SESSION['filtro_archivos_x_selectcliente'];
	@$_SESSION['filtro_archivos_x_selectcliente']=$x_selectcliente;
	
	$x_fechainicio = @$_GET['fechainicio']<>'' ? @$_GET['fechainicio'] : @$_SESSION['filtro_archivos_x_fechainicio'];
	@$_SESSION['filtro_archivos_x_fechainicio']=$x_fechainicio;
	
	$x_fechatermino = @$_GET['fechatermino']<>'' ? @$_GET['fechatermino'] : @$_SESSION['filtro_archivos_x_fechatermino'];
	@$_SESSION['filtro_archivos_x_fechatermino']=$x_fechatermino;
	
	//Variables de Paginación
	$registros_por_pagina = @$_GET['registros_por_pagina']<>'' ? @$_GET['registros_por_pagina'] : @$_SESSION['registros_por_pagina'];
	$registros_por_pagina=$registros_por_pagina<>'' ? $registros_por_pagina : 10;
	@$_SESSION['registros_por_pagina']=$registros_por_pagina;
	
	$pagina_actual = @$_GET['pagina_actual']<>'' ? @$_GET['pagina_actual'] : @$_SESSION['filtro_archivos_pagina_actual'];
	$pagina_actual=$pagina_actual<>'' ? $pagina_actual : 1;
	@$_SESSION['filtro_archivos_pagina_actual']=$pagina_actual;
	$paginacion_por_pagina=10;
	
	
	
	$vista='
		SELECT
		
		procedimiento.idprocedimiento, nombrearchivo, duracion, fechaingreso,
		if(
			estadointerno=3,
			vista_entregas_procedimietos.fecha_entrega,
			NULL
		) fecha_entrega,
		case estadocliente when 0 then "(Sin especificar)" when 1 then "Cancelado" when 2 then "En Proceso" when 3 then "Suspendido" when 4 then "Entregado" end as estadocliente,cliente FROM procedimiento
		
		inner join(
			select
			
			idprocedimiento,
			max(fecha_entrega) fecha_entrega
			
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
				"Postproductordos" cargo_empleado,
				1 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos2 id_empleado,
				tiempoppdos2 tiempo_empleado,
				fecha_entrega_ppdos2 fecha_entrega,
				fecha_plazo_ppdos2 fecha_plazo,
				"Postproductordos" cargo_empleado,
				2 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos3 id_empleado,
				tiempoppdos3 tiempo_empleado,
				fecha_entrega_ppdos3 fecha_entrega,
				fecha_plazo_ppdos3 fecha_plazo,
				"Postproductordos" cargo_empleado,
				3 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos4 id_empleado,
				tiempoppdos4 tiempo_empleado,
				fecha_entrega_ppdos4 fecha_entrega,
				fecha_plazo_ppdos4 fecha_plazo,
				"Postproductordos" cargo_empleado,
				4 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos5 id_empleado,
				tiempoppdos5 tiempo_empleado,
				fecha_entrega_ppdos5 fecha_entrega,
				fecha_plazo_ppdos5 fecha_plazo,
				"Postproductordos" cargo_empleado,
				5 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos6 id_empleado,
				tiempoppdos6 tiempo_empleado,
				fecha_entrega_ppdos6 fecha_entrega,
				fecha_plazo_ppdos6 fecha_plazo,
				"Postproductordos" cargo_empleado,
				6 numero

				from procedimiento
			) vista_empleados_procedimientos
			
			group by
				idprocedimiento
		) vista_entregas_procedimietos on
			vista_entregas_procedimietos.idprocedimiento=procedimiento.idprocedimiento
	';
	$vista_count='
		SELECT
		
		count(*) total_registros
		
		FROM procedimiento
		
		inner join(
			select
			
			idprocedimiento,
			max(fecha_entrega) fecha_entrega
			
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
				"Postproductordos" cargo_empleado,
				1 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos2 id_empleado,
				tiempoppdos2 tiempo_empleado,
				fecha_entrega_ppdos2 fecha_entrega,
				fecha_plazo_ppdos2 fecha_plazo,
				"Postproductordos" cargo_empleado,
				2 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos3 id_empleado,
				tiempoppdos3 tiempo_empleado,
				fecha_entrega_ppdos3 fecha_entrega,
				fecha_plazo_ppdos3 fecha_plazo,
				"Postproductordos" cargo_empleado,
				3 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos4 id_empleado,
				tiempoppdos4 tiempo_empleado,
				fecha_entrega_ppdos4 fecha_entrega,
				fecha_plazo_ppdos4 fecha_plazo,
				"Postproductordos" cargo_empleado,
				4 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos5 id_empleado,
				tiempoppdos5 tiempo_empleado,
				fecha_entrega_ppdos5 fecha_entrega,
				fecha_plazo_ppdos5 fecha_plazo,
				"Postproductordos" cargo_empleado,
				5 numero

				from procedimiento

				union all

				select

				idprocedimiento,
				idpostproductordos6 id_empleado,
				tiempoppdos6 tiempo_empleado,
				fecha_entrega_ppdos6 fecha_entrega,
				fecha_plazo_ppdos6 fecha_plazo,
				"Postproductordos" cargo_empleado,
				6 numero

				from procedimiento
			) vista_empleados_procedimientos
			
			group by
				idprocedimiento
		) vista_entregas_procedimietos on
			vista_entregas_procedimietos.idprocedimiento=procedimiento.idprocedimiento
	';
	
	$vista_where=[];
	if(@$x_selectcliente<>''){
		$vista_where[]='
			cliente="'.@$x_selectcliente.'"
		';
	}
	
	if( (@$x_fechainicio<>'' and @$x_fechatermino<>'') and (@$x_fechainicio<>'0000-00-00' and @$x_fechatermino<>'0000-00-00') ){
		$vista_where[]='
			fechaingreso between "'.@$x_fechainicio.'" and "'.@$x_fechatermino.'"
		';
	}
	
	/* Variables para Ordenar Listado */
	$vista_order_by=[];
	
	if(@$registros_por_pagina<>'Todos'){
		$iniciar_registros_desde=($pagina_actual*$registros_por_pagina)-$registros_por_pagina;

		$vista_limit=' limit '.$iniciar_registros_desde.','.$registros_por_pagina;
	}else{
		$iniciar_registros_desde=0;
	}
	
	$query=@$vista.(count(@$vista_where)>0 ? ' where '.implode(" and ",$vista_where) : '').(count(@$vista_order_by)>0 ? ' order by '.implode(",",$vista_order_by) : '').(@$vista_limit<>'' ? $vista_limit : '');
	$ejec=mysqli_query($con,$query) or die("Fallo al ejecutar el query en la línea ". __LINE__ . "<br>" . mysqli_error($con) . "<br>SQL: " . $query);
	$total_registros_pagina=mysqli_num_rows($ejec);
	
	//die($query);
	
	$query_count=@$vista_count.(count(@$vista_where)>0 ? ' where '.implode(" and ",$vista_where) : '').(count(@$vista_order_by)>0 ? ' order by '.implode(",",$vista_order_by) : '');
	$ejec_count=mysqli_query($con,$query_count) or die("Fallo al ejecutar el query en la línea ". __LINE__ . "<br>" . mysqli_error($con) . "<br>SQL: " . $query_count);
	$reg_count=mysqli_fetch_array($ejec_count);
	$total_registros=$reg_count["total_registros"];
	
	$total_paginas=ceil($total_registros/($registros_por_pagina=='Todos' ? ($total_registros==0 ? 1 : $total_registros) : $registros_por_pagina));
	$paginacion=ceil($pagina_actual/$paginacion_por_pagina);
	$iniciar_paginacion_desde=$paginacion_por_pagina*($paginacion-1)+1;
	$finalizar_paginacion_en=$paginacion*$paginacion_por_pagina+1;

			 

 ?> 
			 

	 
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
	 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<link rel="stylesheet" href="/path/to/bootstrap-material-datetimepicker.css">
<script src="/path/to/bootstrap-material-datetimepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/cupertino/jquery-ui.custom.css"></link>	

	
	
	
	
<style>


</style>


<div class="container">
<form align ="center "action="" id="form"> 
	<input type="hidden" name="mostrar-todo" value="si" />
 <table align="center" >
 
 <tr>
 <td >
Cliente
 </td>
  <td  >
 				    			    <?php
							$sql = "select DISTINCT cliente from procedimiento order by cliente asc" ;		
							$res = mysqli_query($con,$sql);
						?> 
	 
							 <select name = "selectcliente" placeholder="" class="form-control" id="selectcliente" >
							<option  value = ""> (Sin Especificar)</option>
							<?php						
								while ($reg = mysqli_fetch_array($res))
									{					

								if($reg["cliente"] == "")
								{
									
								}	
								else {							
									?>
								<!--Aqui va el codigo html que queremos que se repita con el while-->
									<option value= "<?php echo $reg["cliente"];?>" <?php echo @$x_selectcliente==$reg["cliente"] ? "selected" : "" ?>><?php echo $reg["cliente"];?></option>
									<?php
									    }
									}
										?>
								</select>	
 </td>
 
 <td >
 Fecha Inicio
 </td>
 
 <td >
   <div class="input-group input-append date" id="datePicker">
				   				    <input type="text" class="box" height="55px" name="fechainicio" value="<?php echo @$x_fechainicio<>"" ? @$x_fechainicio : "0000-00-00" ?>" id="fechainicio"> 
									    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
 </td>
 
  <td>
 Fecha Termino
 
 </td>
 <td >
   <div class="input-group input-append date" id="datePicker2">
				   				    <input type="text" class="box" height="55px" name="fechatermino" value="<?php echo @$x_fechatermino<>"" ? @$x_fechatermino : "0000-00-00" ?>" id="fechatermino"> 
									    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
 </td>
 
 <td>
 <input align ="right" style="margin-left:80%" name="Filtrar" class="btn btn-primary large"   type="submit" value = "Filtrar"  title = "Filtrar"/>
			       
 </td>

 </tr>
 </table>
 </br>
 </br>
</form>
</div>

<?php

/*
$selectcliente = "cero";
$fechainicio = "0000-00-00";
$fechatermino = "0000-00-00";
$consulta1 = "SELECT idprocedimiento, nombrearchivo, duracion, estadocliente,cliente FROM procedimiento WHERE 1=1 ";
$consulta2 = "";
if (isset($_POST["selectcliente"])) 
{
	$selectcliente = $_POST["selectcliente"];
	
if($selectcliente != "cero"){
	$consulta2.= " and cliente = '$selectcliente'";
}

}
if (isset($_POST["fechainicio"])) 
{
	$fechainicio = $_POST["fechainicio"];
}
if (isset($_POST["fechatermino"])) 
{
	$fechatermino = $_POST["fechatermino"];
}


if($fechainicio != "0000-00-00" && $fechatermino != "0000-00-00")
{
	$consulta2 .=  " and fechaingreso between '$fechainicio' and '$fechatermino' ";
}

//echo 'el valor de consutla dos es'." ".$consulta2;

$sql = $consulta1.$consulta2;
$res = mysqli_query($con,$sql);

*/
?>


<div class="table-responsive" id="employee_table" style="display: flex;">
<div class="col-md-10 col-md-offset-1">
 <div class="panel panel-info" >
<table width="70%" cellpadding="5" class="table table-striped" id="Exportar_a_Excel" >
<tr colspan="10" style="border:1px solid #0000 !important;background:#0000 url(2.png) 50% 50% repeat-x !important;color:#222 !important;">
<td colspan="10" height="50px">
<span>Esteno- Reporte de Archivos</span>
<div class="pull-right">
	<a href="index-excel.php">Excel</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="index-pdf.php">PDF</a>
</div>
</td>

</tr>
<tr style="border:1px solid #0000 !important;background:#0000 url(2.png) 50% 50% repeat-x !important;color:#2779aa !important;font-weight:bold !important" >
    <td ><strong>Codigo</strong></td>
    <td><strong>Nombre Archivo </strong></td>
    <td><strong>Duracion</strong></td>
    <td><strong>Estado Cliente</strong></td>
    <td><strong>Cliente</strong></td>
    <td><strong>Fecha Ingreso</strong></td>
    <td><strong>Fecha Entrega</strong></td>

	
</tr>
<?php while ($row = mysqli_fetch_array($ejec)) {  ?>
<tr>

    <td><?php echo $row['idprocedimiento']; ?></td>
    <td><?php echo $row['nombrearchivo'];?></td>
    <td><?php echo $row['duracion']; ?></td>
    <td><?php echo $row['estadocliente']; ?></td>
    <td><?php echo $row['cliente']; ?></td>
    <td><?php echo $row['fechaingreso']; ?></td>
    <td><?php echo $row['fecha_entrega']; ?></td>
    

</tr>
<?php  } ?>
</table>

<?php if(@$total_registros>0){ ?>
<div class="clearfix paginacion">
	<div class="pull-left">
		<?php echo $iniciar_registros_desde+1 ?> -
		<?php echo $iniciar_registros_desde+$total_registros_pagina ?> de
		<?php echo $total_registros ?> items
		&nbsp;
		<span class="text-nowrap">
			Mostrar&nbsp;
			<a href="index.php?pagina_actual=1&registros_por_pagina=10" class="<?php echo $registros_por_pagina==10 ? 'label active' : '' ?>">10</a>&nbsp;
			<a href="index.php?pagina_actual=1&registros_por_pagina=25" class="<?php echo $registros_por_pagina==25 ? 'label active' : '' ?>">25</a>&nbsp;
			<a href="index.php?pagina_actual=1&registros_por_pagina=100" class="<?php echo $registros_por_pagina==100 ? 'label active' : '' ?>">100</a>&nbsp;
			<a href="index.php?pagina_actual=1&registros_por_pagina=200" class="<?php echo $registros_por_pagina==200 ? 'label active' : '' ?>">200</a>
			<a href="index.php?pagina_actual=1&registros_por_pagina=Todos" class="<?php echo $registros_por_pagina=='Todos' ? 'label active' : '' ?>">Todos</a>
		</span>					
	</div>
	<form id="form-paginacion" class="pull-right">
		<a href="index.php?pagina_actual=<?php echo $pagina_actual-1 ?>" <?php echo $pagina_actual==1 ? 'disabled' : '' ?> class="btn btn-flat bg-white btn-sm <?php echo $pagina_actual==1 ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="left" title="Atrás">&laquo;</a>
		Página
		<select name="pagina_actual" class="form-control input-flat inline-block input-sm"  style="width:70px;" onchange="$('#form-paginacion').submit();">
		<?php
			for($x=1;$x<=$total_paginas;$x++){
			?>
			<option <?php echo $pagina_actual==$x ? "selected" : "" ?> value="<?php echo $x ?>"><?php echo $x ?></option>
			<?php
			}
		?>
		</select>
		de <?php echo $total_paginas ?>
		<a href="index.php?pagina_actual=<?php echo $pagina_actual+1 ?>" <?php echo $pagina_actual==$total_paginas ? 'disabled' : '' ?> class="btn btn-flat bg-white btn-sm <?php echo $pagina_actual==$total_paginas ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="left" title="Adelante">&raquo;</a>
	</form>
</div>
<?php } ?>

</div>
</div>
</div>

<?php require_once("../footer/footer.php")  ?>

<script>
$(document).ready(function() {	



		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!

		var yyyy = today.getFullYear();
		if(dd<10){
		dd='0'+dd;
			} 
if(mm<10){
    mm='0'+mm;
} 
var today = yyyy+'-'+mm+'-'+dd;
    $('#datePicker')
        .datepicker({
			
		format: 'yyyy-mm-dd',
		setDate:today,
        startDate: '2016-01-01'

			
			
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
		
		$('#datePicker2')
        .datepicker({
        format: 'yyyy-mm-dd',
		setDate:today,
        startDate: '2016-01-01'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
		
		


    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
	

	
	
});


</script>

<script>


</script>