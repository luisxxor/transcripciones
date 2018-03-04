<?php 
ini_set("session.cookie_lifetime","30000"); 
ini_set("session.gc_maxlifetime","3000"); 
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
	$ordenes_trabajos_ordenar = @$_GET['ordenes_trabajos_ordenar']<>'' ? @$_GET['ordenes_trabajos_ordenar'] : @$_SESSION['ordenes_trabajos_ordenar'];
	$ordenes_trabajos_ordenar=$ordenes_trabajos_ordenar<>'' ? $ordenes_trabajos_ordenar : 'id_orden_trabajo';
	@$_SESSION['ordenes_trabajos_ordenar']=$ordenes_trabajos_ordenar;
	
	$ordenes_trabajos_ordenar_modo = @$_GET['ordenes_trabajos_ordenar_modo']<>'' ? @$_GET['ordenes_trabajos_ordenar_modo'] : @$_SESSION['ordenes_trabajos_ordenar_modo'];
	$ordenes_trabajos_ordenar_modo=$ordenes_trabajos_ordenar_modo<>'' ? $ordenes_trabajos_ordenar_modo : 'desc';

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

	

	ob_start();
	
?>
<style>
	table{
		border-collapse:collapse;
	}
</style>
<page>
	<table border="1">
		<thead>
			<tr>
				<td colspan="7" style="width:100%;"></td>
			</tr>
			<tr>
				<th>Codigo</th>
				<th>Nombre Archivo</th>
				<th>Duracion</th>
				<th>Estado Cliente</th>
				<th>Cliente</th>
				<th>Fecha Ingreso</th>
				<th>Fecha Entrega</th>
			</tr>
		</thead>
		<tbody>
		<?php
			while($reg=mysqli_fetch_array($ejec)) {
		?>
			<tr>
				<td><?php echo $reg["idprocedimiento"] ?></td>
				<td><?php echo $reg["nombrearchivo"] ?></td>
				<td><?php echo $reg["duracion"] ?></td>
				<td><?php echo $reg["estadocliente"] ?></td>
				<td><?php echo $reg["cliente"] ?></td>
				<td><?php echo $reg["fechaingreso"] ?></td>
				<td><?php echo $reg["fecha_entrega"] ?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</page>

<?php

	$content = ob_get_clean();

    require_once('../lib/html2pdf/html2pdf.class.php');

	

	$html2pdf = new HTML2PDF('P', 'LETTER', 'fr', true, 'UTF-8', 3);

	$html2pdf->pdf->SetDisplayMode('fullpage');

	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

	$html2pdf->Output('listado-filtro-archivos-'.date("Y_m_d_His").'.pdf','D');

?>