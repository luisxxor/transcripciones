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
	
	
	
	
	
	/** Error reporting */
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

	/** Include PHPExcel */
	require_once '../lib/PHPExcel/Classes/PHPExcel.php';


	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Esteno Chile")
								 ->setLastModifiedBy("Esteno Chile")
								 ->setTitle("Listado Filtro Archivos")
								 ->setSubject("Listado Filtro Archivos")
								 ->setDescription("Listado Filtro Archivos")
								 ->setKeywords("Listado Filtro Archivos")
								 ->setCategory("Excel");


	$columnas=['A','B','C','D','E','F','G'];
	
	if($total_registros_pagina>0){
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($columnas[0].'1', 'Codigo')
					->setCellValue($columnas[1].'1', 'Nombre Archivo')
					->setCellValue($columnas[2].'1', 'Duracion')
					->setCellValue($columnas[3].'1', 'Estado Cliente')
					->setCellValue($columnas[4].'1', 'Cliente')
					->setCellValue($columnas[5].'1', 'Fecha Ingreso')
					->setCellValue($columnas[6].'1', 'Fecha Entrega');
		$contFila=2;
		while($reg=mysqli_fetch_array($ejec)) {
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($columnas[0].$contFila, $reg["idprocedimiento"])
						->setCellValue($columnas[1].$contFila, $reg["nombrearchivo"])
						->setCellValue($columnas[2].$contFila, $reg["duracion"])
						->setCellValue($columnas[3].$contFila, $reg["estadocliente"])
						->setCellValue($columnas[4].$contFila, $reg["cliente"])
						->setCellValue($columnas[5].$contFila, $reg["fechaingreso"])
						->setCellValue($columnas[6].$contFila, $reg["fecha_entrega"]);
			
			$contFila++;
		}
	}
	
	/*Estilos*/
	$estiloBordes = array(
		'borders' => array(
			'top' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'left' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
		),
	);
	
	for($x=1;$x<$contFila;$x++){
		for($y=0;$y<count($columnas);$y++){
			$objPHPExcel->getActiveSheet()->getStyle($columnas[$y].$x)->applyFromArray($estiloBordes);
		}
	}
	
	
	$estiloCabecera = array(
		'font' => array(
			'bold' => true,
		),
	);
	for($y=0;$y<count($columnas);$y++){
		$objPHPExcel->getActiveSheet()->getStyle($columnas[$y].'1')->applyFromArray($estiloCabecera);
	}
	
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	/*Fin Estilos*/



	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);


	// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="listado-filtro-archivos-'.date("Y_m_d_His").'.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
	

 ?> 
