<?php 
ini_set("session.cookie_lifetime","30000"); 
  ini_set("session.gc_maxlifetime","3000"); 
   session_start(); 
    require_once ('conexion.php'); 
	 if($_SESSION["usuario"] == "") 
		   
		   {   
		   
		    return header("Location: index.php");  
			  
		   }  
		   
		   
		   if($_SESSION["tipousuario"] == "USUARIO" ) 
		   
		   {   
		   
		    return header("Location: index.php");  
			  
		   }  
		    
			 header('Content-Type: text/html; charset=UTF-8');
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="autdor" content="">




	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/formvalidation@0.6.2-dev/dist/js/formValidation.min.js"></script>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<!--<link rel="stylesheet" href="/path/to/bootstrap-material-datetimepicker.css">
<script src="/path/to/bootstrap-material-datetimepicker.js"></script>-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
	<script src="sweet/dist/sweetalert.min.js"></script>


	<link href="https://www.malot.fr/bootstrap-datetimepicker/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<script src="https://www.malot.fr/bootstrap-datetimepicker/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


	<style>
		th,
		td {
			border-bottom: 1px solid #ddd;

		}

		tr,
		td {
			border: 0px
		}

		tr:nth-child(even) {
			background-color: #f2f2f2
		}

		#grabar {
			position: relative;

			left: 61%;
		}

		.dropdown-toggle {
			overflow: hidden;
			padding-right: 24px/* Optional for caret */
			;
			text-align: left;
			text-overflow: ellipsis;

		}

		.form-control {
			min-height: 40px;
			text-align: center;
		}

		.fgridparent {
			display: flex!important;
			flex-wrap: wrap;
			margin: 0 15px;
		}

		.frow {
			display: flex!important;
			flex: 1 1 100%;
			flex-wrap: wrap;
			justify-content: space-around;
		}

		#grid1 .fcell,
		#grid2 .fcell,
		#grid3 .fcell,
		#grid4 .fcell,
		#grid5 .fcell,
		#grid6 .fcell,
		#grid7 .fcell{
			display: flex;
			justify-content: center;
			align-items: center;
		}
		
		#grid7{
			margin-top: 20px;
		}

		#grid1 .fcell,
		#grid2 .fcell,
		#grid3 .fcell,
		#grid4 .fcell,
		#grid5 .fcell,
		#grid6 .fcell{

			border: 1px solid #BCE8F1!important;

		}

		#grid1 .fcell,
		#grid6 .fcell{
			flex: 1 1 20%;
		}

		#grid2 .fcell {
			flex: 1 1 0%;
		}

		#grid3 .fcell,
		#grid4 .fcell,
		#grid5 .fcell{
			flex: 1 1 10%;
		}

		#grid7 .fcell{
			flex: 1 1 50%;
		}

		input.form-control,
		select.form-control,
		textarea.form-control {
			border-radius: 0px;
		}

		textarea.form-control{
			resize: none;
		}

		#headtabla {
			height: 40px;
		}

		.sweet-alert h2 {
			color: #575757;
			font-size: 15px;
			text-align: left;
			font-weight: 600;
			text-transform: none;
			position: relative;
			margin: 5px 0;
			padding: 0;
			line-height: 20px;
			display: block;
		}

		.checkcombo {
			flex-direction: column;
		}

		#grid2 .form-control {
			height: 100%;
		}

		.inputnumberexpand {
			height: auto;
			width: -webkit-fill-available;
			width: -moz-available;
		}

		.nbe {
			align-items: stretch;
		}

		select.form-control {
			text-align: center;
		}

		@media(max-width: 768px) {
			.formcontrol {
				width: auto;
			}

			
			#grid1 .fcell,
			#grid2 .fcell,
			#grid3 .fcell,
			#grid4 .fcell,
			#grid5 .fcell,
			#grid6 .fcell{
				flex: 1 1 50%;
			}

			#grid7 .fcell{
				flex:1 1 100%;
			}

			.inputnumberexpand {
				width: 100%;
				justify-content: stretch;
			}

			span.label.label-default {
				display: flex;
				width: 100%;
				height: 100%;
				justify-content: center;
				align-items: center;
				font-size: 16px;
			}
			button{
				font-size: 16px;
			}
		}

	</style>

	<script>
		$(document).ready(function() {




			/*
			if(document.form.chb1.checked ==false){
				
				
				
			}
			*/



			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!

			var yyyy = today.getFullYear();
			if (dd < 10) {
				dd = '0' + dd;
			}
			if (mm < 10) {
				mm = '0' + mm;
			}
			var today = yyyy + '-' + mm + '-' + dd;
			$('#datePicker')
				.datepicker({


					format: 'yyyy-mm-dd',
					startDate: today
				})
				.on('changeDate', function(e) {
					// Revalidate the date field
					$('#eventForm').formValidation('revalidateField', 'date');
				});

			$('#datePicker2')
				.datepicker({
					format: 'yyyy-mm-dd',
					startDate: today
				})
				.on('changeDate', function(e) {
					// Revalidate the date field
					$('#eventForm').formValidation('revalidateField', 'date');
				});

			$('#datePicker3')
				.datepicker({
					format: 'yyyy-mm-dd',
					startDate: today
				})
				.on('changeDate', function(e) {
					// Revalidate the date field
					$('#eventForm').formValidation('revalidateField', 'date');
				});

			$('#datePicker4')
				.datepicker({
					format: 'yyyy-mm-dd',
					startDate: today
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



		jQuery(document).ready(function() {
			//Fecha y hora en fechas de plazos
			$(".datetime").datetimepicker();

			//Ejecutar la funcion "habilitarEstadoInterno" al cargar la pagina
			habilitarEstadoInterno();

			//Ejecutar la funcion "mostrarPaso" al cargar la pagina
			mostrarPaso();

			//ejecutar la función "habilitarEstadoInterno" y "mostrarPaso" al seleccionar a una persona
			$("[data-asignar=true]").change(function() {
				habilitarEstadoInterno();
				mostrarPaso();
			})

			//Al seleccionar como entregado por cada persona asignada, cambiar el estado interno a "Entregado" si ha
			//sido entregado en su totalidad
			$("input[name*='fecha_entrega']").change(function() {
				if ($(this).closest("tr").find("[data-asignar=true]").val() == "0") {
					$(this).prop("checked", false);
					return false;
				}
				var
					entregados_personas_asignadas = 0,
					personas_asignadas = 0;

				$("input[name*='fecha_entrega']:checked").each(function() {
					if ($(this).closest("tr").find("[data-asignar=true]").val() != "0") {
						entregados_personas_asignadas++;
					}
				})
				$("[data-asignar=true]").each(function() {
					if ($(this).val() != "0") {
						personas_asignadas++;
					}
				})

				if (entregados_personas_asignadas == personas_asignadas) {
					$("#estadointerno").val("3");
				}
			})

		})
		//Función para habilitar/deshabilitar combobox estado interno
		function habilitarEstadoInterno() {
			var asignar = 0;
			$("[data-asignar=true]").each(function() {
				if ($(this).val() != "0") {
					asignar++;
				}
			})
			if (asignar == 0) {
				$("#estadointerno").attr("disabled", true);
				$("#estadointerno").val("0");
			} else {
				$("#estadointerno").attr("disabled", false);
			}
		}
		//Función que muestra el paso
		function mostrarPaso() {
			$("#label_paso").val("");
			$("[data-transcriptor=true]").each(function() {
				if ($(this).val() != "0") {
					$("#label_paso").val("Paso 1");
				}
			})
			$("[data-timecode=true]").each(function() {
				if ($(this).val() != "0") {
					$("#label_paso").val("Paso 2");
				}
			})
			$("[data-postproductor=true]").each(function() {
				if ($(this).val() != "0") {
					$("#label_paso").val("Paso 3");
				}
			})
		}

	</script>

	<script>
		function MuestraPP() {

			let check = document.getElementById("checkpp");
			var x = document.getElementById("divpostproductordos");
			if (check.checked) {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}


		}

		//window.addEventListener("load",MuestraPP,false);

	</script>
	<script>
		function ValidaIngreso() {
			//Validar si se encuentra alguna persona asignada y el estado interno no se ha seleccionado
			var asignar = 0;
			$("[data-asignar=true]").each(function() {
				if ($(this).val() != "0") {
					asignar++;
				}
			})
			if (asignar != 0) {
				if ($("#estadointerno").val() == "0") {
					alert("Debe seleccionar un estado");
					$("#estadointerno").focus();

					return false;
				}
			}




			//Validar si el doumento ha sido entregado o NO
			var
				entregados_personas_asignadas = 0,
				personas_asignadas = 0;

			$("input[name*='fecha_entrega']:checked").each(function() {
				if ($(this).closest("tr").find("[data-asignar=true]").val() != "0") {
					entregados_personas_asignadas++;
				}
			})
			$("[data-asignar=true]").each(function() {
				if ($(this).val() != "0") {
					personas_asignadas++;
				}
			})
			if (entregados_personas_asignadas == personas_asignadas) {
				$("#estadointerno").val("3");
			} else {
				if ($("#estadointerno").val() == "3") {
					alert("El archivo no ha sido entregado en su totalidad");
					$("#estadointerno").focus();

					return false;
				}
			}








			if (sumatoriaTR() == true && sumatoriaTC() == true && sumatoriaPP() == true && sumatoriaPPdos() == true) {
				document.getElementById("form").submit();
				return true;
			} else {
				return false;

			}
		}

		function sumatoriaTR() {


			var duracion = parseInt(document.getElementById("duracion").value);

			var tiempotr1 = parseInt(document.getElementById("tiempotr1").value);
			var tiempotr2 = parseInt(document.getElementById("tiempotr2").value);
			var tiempotr3 = parseInt(document.getElementById("tiempotr3").value);
			var tiempotr4 = parseInt(document.getElementById("tiempotr4").value);
			var tiempotr5 = parseInt(document.getElementById("tiempotr5").value);
			var tiempotr6 = parseInt(document.getElementById("tiempotr6").value);

			var sumatoriatr = tiempotr1 + tiempotr2 + tiempotr3 + tiempotr4 + tiempotr5 + tiempotr6;

			//alert(sumatoriatr);
			if (sumatoriatr == 0 || sumatoriatr == duracion) {

				return true;
			} else {

				swal('La sumatoria de los tiempos de Transcripcion, debe ser igual a la duracion del archivo');
				return false;

			}

		}

		function sumatoriaTC() {

			var duracion = parseInt(document.getElementById("duracion").value);

			var tiempotc1 = parseInt(document.getElementById("tiempotc1").value);
			var tiempotc2 = parseInt(document.getElementById("tiempotc2").value);
			var tiempotc3 = parseInt(document.getElementById("tiempotc3").value);
			var tiempotc4 = parseInt(document.getElementById("tiempotc4").value);
			var tiempotc5 = parseInt(document.getElementById("tiempotc5").value);
			var tiempotc6 = parseInt(document.getElementById("tiempotc6").value);


			var sumatoriatc = tiempotc1 + tiempotc2 + tiempotc3 + tiempotc4 + tiempotc5 + tiempotc6

			//alert(sumatoriatc);
			if (sumatoriatc == 0 || sumatoriatc == duracion) {
				return true;
			} else {
				swal("La sumatoria de los tiempos de Timecoding, debe ser igual a la duracion del archivo")
				//alert('La sumatoria de los tiempos de Timecoding, debe ser igual a la duracion del archivo');
				return false;

			}

		}



		function sumatoriaPP() {

			var duracion = parseInt(document.getElementById("duracion").value);

			var tiempopp1 = parseInt(document.getElementById("tiempopp1").value);
			var tiempopp2 = parseInt(document.getElementById("tiempopp2").value);
			var tiempopp3 = parseInt(document.getElementById("tiempopp3").value);
			var tiempopp4 = parseInt(document.getElementById("tiempopp4").value);
			var tiempopp5 = parseInt(document.getElementById("tiempopp5").value);
			var tiempopp6 = parseInt(document.getElementById("tiempopp6").value);

			var sumatoriapp = tiempopp1 + tiempopp2 + tiempopp3 + tiempopp4 + tiempopp5 + tiempopp6;
			//alert(sumatoriapp);
			if (sumatoriapp <= duracion) {
				return true;
			} else {
				swal('La sumatoria de los tiempos de PostProduccion, debe ser menor o igual a la duracion del archivo');
				return false;

			}

		}

		function sumatoriaPPdos() {

			var duracion = parseInt(document.getElementById("duracion").value);

			var tiempoppdos1 = parseInt(document.getElementById("tiempoppdos1").value);
			var tiempoppdos2 = parseInt(document.getElementById("tiempoppdos2").value);
			var tiempoppdos3 = parseInt(document.getElementById("tiempoppdos3").value);
			var tiempoppdos4 = parseInt(document.getElementById("tiempoppdos4").value);
			var tiempoppdos5 = parseInt(document.getElementById("tiempoppdos5").value);
			var tiempoppdos6 = parseInt(document.getElementById("tiempoppdos6").value);

			var sumatoriappdos = tiempoppdos1 + tiempoppdos2 + tiempoppdos3 + tiempoppdos4 + tiempoppdos5 + tiempoppdos6;
			//alert(sumatoriapp);
			if (sumatoriappdos <= duracion) {
				return true;
			} else {
				swal('La sumatoria de los tiempos de PostProduccion Dos, debe ser menor o igual a la duracion del archivo');
				return false;

			}

		}

	</script>
	<script>


	</script>
</head>

<body bgcolor="#303030">

	<?php
//mostramos el header
require_once('menu.php');
?>


		<?php

$idprocedimiento = $_GET['idprocedimiento'];





?>





			<?php
 /*
 $sql2 = "SELECT idprocedimiento, nombrearchivo, duracion, cliente, fechacliente,
 idtranscriptor1, idtranscriptor2, idtranscriptor3, idtranscriptor4, idtranscriptor5, idtranscriptor6, tiempotr1, tiempotr2, tiempotr3, tiempotr4, tiempotr5, tiempotr6, 
 fechainterna1, idtimecoder1, idtimecoder2, idtimecoder3, idtimecoder4, idtimecoder5, idtimecoder6, 
 tiempotc1, tiempotc2, tiempotc3, tiempotc4, tiempotc5, tiempotc6, fechainterna2, 
 idpostproductor1, idpostproductor2, idpostproductor3, idpostproductor4, idpostproductor5, 
 idpostproductor6, tiempopp1, tiempopp2, tiempopp3, tiempopp4, tiempopp5, tiempopp6, fechainterna3, 
  idpostproductordos1, idpostproductordos2, idpostproductordos3, idpostproductordos4, idpostproductordos5, 
 idpostproductordos6,tiempoppdos1, tiempoppdos2, tiempoppdos3, tiempoppdos4, tiempoppdos5, tiempoppdos6,fechainterna4,
 estadointerno, estadocliente,observaciones FROM procedimiento WHERE idprocedimiento = '$idprocedimiento'"; 
 */
 $sql2 = "SELECT * FROM procedimiento WHERE idprocedimiento = '$idprocedimiento'"; 
  $query = mysqli_query($con,$sql2)or die('Fallo en la consulta'); 
  $tra= mysqli_fetch_array($query); 
	
	?>





				<form name="form" id="form" action="edicionsave.php" method="post">


					<div class="fgridparent" id="grid1" style="display: flex; border-left: 1px solid; border-right:1px solid;border-top:1px solid;border-color: #BCE8F1" width="1000px" align="center" border="0">
						<div id="headtabla" class="frow" style="border-left:1px solid #BCE8F1 !important;border-right:1px solid #BCE8F1 !important;border-top:1px solid #BCE8F1 !important;background:#0000 url(2.png) 50% 50% repeat-x !important;color:#222 !important;">
							<div class="fcell" style="font-size: 16px">
								<ul class="breadcrumb" style="background-color: inherit; margin-bottom: 0; padding: 5px 15px;">
								    <li><a href="../index.php">Esteno</a></li>
								    <li class="active">Editar Archivo</li>
								</ul>

							</div>
						</div>

						<div class="frow" style="background-color: #BCE8F1;">
							<div class="fcell"> <span style="margin: 5px 0;" class="label label-default">Datos Importados</span> </div>
						</div>

						<div class="frow" style="border-right:1px solid;border-color: #BCE8F1">

							<div class="fcell">
								Codigo
							</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml" name="codigo" value="<?php echo $idprocedimiento ?> " READONLY id="codigo">
							</div>

							<div class="fcell">
								Nombre Archivo
							</div>

							<div class="fcell" style="border-right:1px solid;border-color: #BCE8F1">
								<input type="text" class="form-control  input-sml" name="nombrearchivo" value="<?php echo $tra["nombrearchivo"]?>" id="nombrearchivo">
							</div>
						</div>
						<div class="frow">

							<div class="fcell">
								Duracion
							</div>

							<div class="fcell" style="border-right:1px solid;border-color: #BCE8F1">
								<input type="number" class="form-control  input-sml" name="duracion" value="<?php echo $tra["duracion"] ?>" id="duracion">
							</div>
							<div class="fcell">
								Cliente
							</div>

							<div class="fcell" style="border-right:1px solid;border-color: #BCE8F1">
								<input type="text" class="form-control  input-sml" name="cliente" value="<?php echo $tra["cliente"]?>" id="cliente">
							</div>


						</div>


						<div class="frow">

							<div class="fcell">
								Fecha Cliente
							</div>

							<div class="fcell">
								<input type="date" class="form-control  input-sml" name="fechacliente" value="<?php echo $tra["fechacliente"]?>" id="fechacliente">
							</div>
							<div class="fcell">
								Paso
							</div>

							<div class="fcell" style="border-right:1px solid;border-color: #BCE8F1">
								<input type="text" class="form-control input-sml" id="label_paso" disabled></label>
							</div>
						</div>

					</div>



					<div class="fgridparent" id="grid2" style="border-left: 1px solid; border-right:1px solid;border-color: #BCE8F1" width="1000px" align="center" border="0">


						<div class="frow" style="background-color: #BCE8F1;">
							<div class="fcell"> <span class="label label-default" style="margin: 5px 0;"> Transcriptores</span> </div>
						</div>



						<div class="frow">

							<div class="fcell">
								Transcriptor 1
							</div>
							<div class="fcell">

								<?php	
		$sqlproc1 = "select idusuario,nombre,apellido from usuario where idcargo1=1 or idcargo2=1 order by nombre asc" ;
		$resproc1 = mysqli_query($con,$sqlproc1);
		
		$sqlproc2= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idtranscriptor1
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc2 = mysqli_query($con,$sqlproc2)or die('Fallo en la consulta');
		$traproc2= mysqli_fetch_array($queryproc2);
		?>


									<?php if ($tra["idtranscriptor1"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr1" class="form-control" id="tr1">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1))
			{
			?>
		<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr1" class="form-control" id="tr1">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1)) {
if($regproc1["idusuario"] ==  $traproc2["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc2["idusuario2"];?>"><?php echo $traproc2["nombre2"]." ".$traproc2["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>


							</div>

							<div class="fcell">
								Tiempo Transcriptor 1
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotr1" value="<?php echo $tra["tiempotr1"] ?>" id="tiempotr1">
								</div>
							</div>


							<div class="fcell">Plazo Tr1</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tr1" id="fecha_plazo_tr1" value="<?php echo $tra["fecha_plazo_tr1"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tr1" id="fecha_entrega_tr1" <?php /*Condición corta*/ echo $tra["fecha_entrega_tr1"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								Transcriptor 2
							</div>
							<div class="fcell">


								<?php	
		$sqlproc1 = "select idusuario,nombre,apellido from usuario where idcargo1=1 or idcargo2=1 order by nombre asc" ;
		$resproc1 = mysqli_query($con,$sqlproc1);
		
		$sqlproc2= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idtranscriptor2
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc2 = mysqli_query($con,$sqlproc2)or die('Fallo en la consulta');
		$traproc2= mysqli_fetch_array($queryproc2);
		?>


									<?php if ($tra["idtranscriptor2"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr2" class="form-control" id="tr2">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1))
			{
			?>
		<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr2" class="form-control" id="tr2">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1)) {
if($regproc1["idusuario"] ==  $traproc2["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc2["idusuario2"];?>"><?php echo $traproc2["nombre2"]." ".$traproc2["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>



							</div>

							<div class="fcell">
								Tiempo Transcriptor 2
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotr2" value="<?php echo $tra["tiempotr2"] ?>" id="tiempotr2">
								</div>
							</div>




							<div class="fcell">Plazo Tr2</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tr2" id="fecha_plazo_tr2" value="<?php echo $tra["fecha_plazo_tr2"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tr2" id="fecha_entrega_tr2" <?php /*Condición corta*/ echo $tra["fecha_entrega_tr2"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								Transcriptor 3
							</div>
							<div class="fcell">




								<?php	
		$sqlproc1 = "select idusuario,nombre,apellido from usuario where idcargo1=1 or idcargo2=1 order by nombre asc" ;
		$resproc1 = mysqli_query($con,$sqlproc1);
		
		$sqlproc2= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idtranscriptor3
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc2 = mysqli_query($con,$sqlproc2)or die('Fallo en la consulta');
		$traproc2= mysqli_fetch_array($queryproc2);
		?>


									<?php if ($tra["idtranscriptor3"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr3" class="form-control" id="tr3">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1))
			{
			?>
		<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr3" class="form-control" id="tr3">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1)) {
if($regproc1["idusuario"] ==  $traproc2["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc2["idusuario2"];?>"><?php echo $traproc2["nombre2"]." ".$traproc2["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>



							</div>

							<div class="fcell">
								Tiempo Transcriptor 3
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotr3" value="<?php echo $tra["tiempotr3"] ?>" id="tiempotr3">
								</div>
							</div>





							<div class="fcell">Plazo Tr3</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tr3" id="fecha_plazo_tr3" value="<?php echo $tra["fecha_plazo_tr3"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tr3" id="fecha_entrega_tr3" <?php /*Condición corta*/ echo $tra["fecha_entrega_tr3"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>


						</div>


						<div class="frow">

							<div class="fcell">
								Transcriptor 4
							</div>
							<div class="fcell">


								<?php	
		$sqlproc1 = "select idusuario,nombre,apellido from usuario where idcargo1=1 or idcargo2=1 order by nombre asc" ;
		$resproc1 = mysqli_query($con,$sqlproc1);
		
		$sqlproc2= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idtranscriptor4
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc2 = mysqli_query($con,$sqlproc2)or die('Fallo en la consulta');
		$traproc2= mysqli_fetch_array($queryproc2);
		?>


									<?php if ($tra["idtranscriptor4"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr4" class="form-control" id="tr4">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1))
			{
			?>
		<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr4" class="form-control" id="tr4">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1)) {
if($regproc1["idusuario"] ==  $traproc2["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc2["idusuario2"];?>"><?php echo $traproc2["nombre2"]." ".$traproc2["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>


							</div>

							<div class="fcell">
								Tiempo Transcriptor 4
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotr4" value="<?php echo $tra["tiempotr4"]?>" id="tiempotr4">
								</div>
							</div>




							<div class="fcell">Plazo Tr4</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tr4" id="fecha_plazo_tr4" value="<?php echo $tra["fecha_plazo_tr4"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tr4" id="fecha_entrega_tr4" <?php /*Condición corta*/ echo $tra["fecha_entrega_tr4"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								Transcriptor 5
							</div>
							<div class="fcell">


								<?php	
		$sqlproc1 = "select idusuario,nombre,apellido from usuario where idcargo1=1 or idcargo2=1 order by nombre asc" ;
		$resproc1 = mysqli_query($con,$sqlproc1);
		
		$sqlproc2= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idtranscriptor5
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc2 = mysqli_query($con,$sqlproc2)or die('Fallo en la consulta');
		$traproc2= mysqli_fetch_array($queryproc2);
		?>


									<?php if ($tra["idtranscriptor5"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr5" class="form-control" id="tr5">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1))
			{
			?>
		<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr5" class="form-control" id="tr5">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1)) {
if($regproc1["idusuario"] ==  $traproc2["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc2["idusuario2"];?>"><?php echo $traproc2["nombre2"]." ".$traproc2["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>





							</div>

							<div class="fcell">
								Tiempo Transcriptor 5
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotr5" value="<?php echo $tra["tiempotr5"]?>" id="tiempotr5">
								</div>
							</div>





							<div class="fcell">Plazo Tr5</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tr5" id="fecha_plazo_tr5" value="<?php echo $tra["fecha_plazo_tr5"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tr5" id="fecha_entrega_tr5" <?php /*Condición corta*/ echo $tra["fecha_entrega_tr5"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>

						<div class="frow">

							<div class="fcell">
								Transcriptor 6
							</div>
							<div class="fcell">

								<?php	
		$sqlproc1 = "select idusuario,nombre,apellido from usuario where idcargo1=1 or idcargo2=1 order by nombre asc" ;
		$resproc1 = mysqli_query($con,$sqlproc1);
		
		$sqlproc2= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idtranscriptor6
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc2 = mysqli_query($con,$sqlproc2)or die('Fallo en la consulta');
		$traproc2= mysqli_fetch_array($queryproc2);
		?>


									<?php if ($tra["idtranscriptor6"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr6" class="form-control" id="tr6">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1))
			{
			?>
		<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-transcriptor="true" name="tr6" class="form-control" id="tr6">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc1 = mysqli_fetch_array($resproc1)) {
if($regproc1["idusuario"] ==  $traproc2["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc2["idusuario2"];?>"><?php echo $traproc2["nombre2"]." ".$traproc2["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc1["idusuario"];?>">  <?php echo $regproc1["nombre"]." ".$regproc1["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>




							</div>

							<div class="fcell">
								Tiempo Transcriptor 6
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotr6" value="<?php echo $tra["tiempotr6"] ?>" id="tiempotr6">
								</div>
							</div>




							<div class="fcell">Plazo Tr6</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tr6" id="fecha_plazo_tr6" value="<?php echo $tra["fecha_plazo_tr1"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tr6" id="fecha_entrega_tr6" <?php /*Condición corta*/ echo $tra["fecha_entrega_tr6"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>

						<div class="frow">

							<div class="fcell">
								Fecha Interna
							</div>

							<div class="fcell">
								<div class="input-group input-append date" id="datePicker">
									<input type="text" class="form-control  input-sml" name="fechainterna1" value="<?php echo $tra["fechainterna1"] ?>" id="fechainterna1">
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>
						</div>
					</div>





					<div class="fgridparent" id="grid3" style="border-left: 1px solid; border-right:1px solid;border-color: #BCE8F1" width="1000px" align="center" border="0">


						<div class="frow" style="background-color: #BCE8F1;">
							<div class="fcell"><span class="label label-default" style="margin: 5px 0;"> TimeCoders</span> </div>
						</div>



						<div class="frow">

							<div class="fcell">
								TimeCoder 1
							</div>
							<div class="fcell">

								<?php	
			$sqlproc2 = "select idusuario,nombre,apellido from usuario where idcargo1=2 or idcargo2=2 order by nombre asc" ;
			$resproc2 = mysqli_query($con,$sqlproc2);
			
			$sqlproc22= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
			where 
			u.idusuario = p.idtimecoder1
			and
			p.idprocedimiento = '$idprocedimiento'";

			$queryproc22 = mysqli_query($con,$sqlproc22)or die('Fallo en la consulta');
			$traproc22= mysqli_fetch_array($queryproc22);
			?>


									<?php if ($tra["idtimecoder1"] == "0") { 
		  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc1" class="form-control" id="tc1">
		<option selected value = "0"> (Sin Especificar)</option>
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2))
				{
				?>
			<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}
					?>
		</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc1" class="form-control" id="tc1">
		<option  value = "0"> (Sin Especificar)</option>
			
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2)) {
	if($regproc2["idusuario"] ==  $traproc22["idusuario2"]){

			?>	
	<option selected value= "<?php echo $traproc22["idusuario2"];?>"><?php echo $traproc22["nombre2"]." ".$traproc22["apellido2"];?></option>

	<?php } else {   ?>		
					<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}	
			}
	?>
	</select>
									<?php }  ?>

							</div>

							<div class="fcell">
								Tiempo TimeCoder 1
							</div>

							<div class="fcell">
								<div class="inputnumberexpand">
									<input type="number" class="form-control" name="tiempotc1" value="<?php echo $tra["tiempotc1"] ?>" id="tiempotc1">
								</div>
							</div>




							<div class="fcell">Plazo Tc1</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tc1" id="fecha_plazo_tc1" value="<?php echo $tra["fecha_plazo_tc1"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tc1" id="fecha_entrega_tc1" <?php /*Condición corta*/ echo $tra["fecha_entrega_tc1"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								TimeCoder 2
							</div>
							<div class="fcell">




								<?php	
			$sqlproc2 = "select idusuario,nombre,apellido from usuario where idcargo1=2 or idcargo2=2 order by nombre asc" ;
			$resproc2 = mysqli_query($con,$sqlproc2);
			
			$sqlproc22= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
			where 
			u.idusuario = p.idtimecoder2
			and
			p.idprocedimiento = '$idprocedimiento'";

			$queryproc22 = mysqli_query($con,$sqlproc22)or die('Fallo en la consulta');
			$traproc22= mysqli_fetch_array($queryproc22);
			?>


									<?php if ($tra["idtimecoder2"] == "0") { 
		  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc2" class="form-control" id="tc2">
		<option selected value = "0"> (Sin Especificar)</option>
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2))
				{
				?>
			<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}
					?>
		</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc2" class="form-control" id="tc2">
		<option  value = "0"> (Sin Especificar)</option>
			
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2)) {
	if($regproc2["idusuario"] ==  $traproc22["idusuario2"]){

			?>	
	<option selected value= "<?php echo $traproc22["idusuario2"];?>"><?php echo $traproc22["nombre2"]." ".$traproc22["apellido2"];?></option>

	<?php } else {   ?>		
					<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}	
			}
	?>
	</select>
									<?php }  ?>


							</div>

							<div class="fcell">
								Tiempo TimeCoder 2
							</div>

							<div class="fcell">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotc2" value="<?php echo $tra["tiempotc2"] ?>" id="tiempotc2">
								</div>
							</div>




							<div class="fcell">Plazo Tc2</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tc2" id="fecha_plazo_tc2" value="<?php echo $tra["fecha_plazo_tc2"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tc2" id="fecha_entrega_tc2" <?php /*Condición corta*/ echo $tra["fecha_entrega_tc2"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								TimeCoder 3
							</div>
							<div class="fcell">





								<?php	
			$sqlproc2 = "select idusuario,nombre,apellido from usuario where idcargo1=2 or idcargo2=2 order by nombre asc" ;
			$resproc2 = mysqli_query($con,$sqlproc2);
			
			$sqlproc22= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
			where 
			u.idusuario = p.idtimecoder3
			and
			p.idprocedimiento = '$idprocedimiento'";

			$queryproc22 = mysqli_query($con,$sqlproc22)or die('Fallo en la consulta');
			$traproc22= mysqli_fetch_array($queryproc22);
			?>


									<?php if ($tra["idtimecoder3"] == "0") { 
		  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc3" class="form-control" id="tc3">
		<option selected value = "0"> (Sin Especificar)</option>
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2))
				{
				?>
			<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}
					?>
		</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc3" class="form-control" id="tc3">
		<option  value = "0"> (Sin Especificar)</option>
			
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2)) {
	if($regproc2["idusuario"] ==  $traproc22["idusuario2"]){

			?>	
	<option selected value= "<?php echo $traproc22["idusuario2"];?>"><?php echo $traproc22["nombre2"]." ".$traproc22["apellido2"];?></option>

	<?php } else {   ?>		
					<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}	
			}
	?>
	</select>
									<?php }  ?>



							</div>

							<div class="fcell">
								Tiempo TimeCoder 3
							</div>

							<div class="fcell">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotc3" value="<?php echo $tra["tiempotc3"] ?>" id="tiempotc3">
								</div>
							</div>



							<div class="fcell">Plazo Tc3</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tc3" id="fecha_plazo_tc3" value="<?php echo $tra["fecha_plazo_tc3"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tc3" id="fecha_entrega_tc3" <?php /*Condición corta*/ echo $tra["fecha_entrega_tc3"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								TimeCoder 4
							</div>
							<div class="fcell">





								<?php	
			$sqlproc2 = "select idusuario,nombre,apellido from usuario where idcargo1=2 or idcargo2=2 order by nombre asc" ;
			$resproc2 = mysqli_query($con,$sqlproc2);
			
			$sqlproc22= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
			where 
			u.idusuario = p.idtimecoder4
			and
			p.idprocedimiento = '$idprocedimiento'";

			$queryproc22 = mysqli_query($con,$sqlproc22)or die('Fallo en la consulta');
			$traproc22= mysqli_fetch_array($queryproc22);
			?>


									<?php if ($tra["idtimecoder4"] == "0") { 
		  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc4" class="form-control" id="tc4">
		<option selected value = "0"> (Sin Especificar)</option>
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2))
				{
				?>
			<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}
					?>
		</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc4" class="form-control" id="tc4">
		<option  value = "0"> (Sin Especificar)</option>
			
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2)) {
	if($regproc2["idusuario"] ==  $traproc22["idusuario2"]){

			?>	
	<option selected value= "<?php echo $traproc22["idusuario2"];?>"><?php echo $traproc22["nombre2"]." ".$traproc22["apellido2"];?></option>

	<?php } else {   ?>		
					<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}	
			}
	?>
	</select>
									<?php }  ?>

							</div>

							<div class="fcell">
								Tiempo TimeCoder 4
							</div>

							<div class="fcell">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotc4" value="<?php echo $tra["tiempotc4"] ?>" id="tiempotc4">
								</div>
							</div>



							<div class="fcell">Plazo Tc4</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tc4" id="fecha_plazo_tc4" value="<?php echo $tra["fecha_plazo_tc4"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tc4" id="fecha_entrega_tc4" <?php /*Condición corta*/ echo $tra["fecha_entrega_tc4"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								TimeCoder 5
							</div>
							<div class="fcell">
								<?php	
			$sqlproc2 = "select idusuario,nombre,apellido from usuario where idcargo1=2 or idcargo2=2 order by nombre asc" ;
			$resproc2 = mysqli_query($con,$sqlproc2);
			
			$sqlproc22= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
			where 
			u.idusuario = p.idtimecoder5
			and
			p.idprocedimiento = '$idprocedimiento'";

			$queryproc22 = mysqli_query($con,$sqlproc22)or die('Fallo en la consulta');
			$traproc22= mysqli_fetch_array($queryproc22);
			?>


									<?php if ($tra["idtimecoder5"] == "0") { 
		  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc5" class="form-control" id="tc5">
		<option selected value = "0"> (Sin Especificar)</option>
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2))
				{
				?>
			<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}
					?>
		</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc5" class="form-control" id="tc5">
		<option  value = "0"> (Sin Especificar)</option>
			
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2)) {
	if($regproc2["idusuario"] ==  $traproc22["idusuario2"]){

			?>	
	<option selected value= "<?php echo $traproc22["idusuario2"];?>"><?php echo $traproc22["nombre2"]." ".$traproc22["apellido2"];?></option>

	<?php } else {   ?>		
					<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}	
			}
	?>
	</select>
									<?php }  ?>


							</div>

							<div class="fcell">
								Tiempo TimeCoder 5
							</div>

							<div class="fcell">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotc5" value="<?php echo $tra["tiempotc5"] ?>" id="tiempotc5">
								</div>
							</div>


							<div class="fcell">Plazo Tc5</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tc5" id="fecha_plazo_tc5" value="<?php echo $tra["fecha_plazo_tc5"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tc5" id="fecha_entrega_tc5" <?php /*Condición corta*/ echo $tra["fecha_entrega_tc5"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>

						<div class="frow">

							<div class="fcell">
								TimeCoder 6
							</div>
							<div class="fcell">



								<?php	
			$sqlproc2 = "select idusuario,nombre,apellido from usuario where idcargo1=2 or idcargo2=2 order by nombre asc" ;
			$resproc2 = mysqli_query($con,$sqlproc2);
			
			$sqlproc22= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
			where 
			u.idusuario = p.idtimecoder6
			and
			p.idprocedimiento = '$idprocedimiento'";

			$queryproc22 = mysqli_query($con,$sqlproc22)or die('Fallo en la consulta');
			$traproc22= mysqli_fetch_array($queryproc22);
			?>


									<?php if ($tra["idtimecoder6"] == "0") { 
		  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc6" class="form-control" id="tc6">
		<option selected value = "0"> (Sin Especificar)</option>
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2))
				{
				?>
			<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}
					?>
		</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-timecode="true" name="tc6" class="form-control" id="tc6">
		<option  value = "0"> (Sin Especificar)</option>
			
		<?php
			while ($regproc2 = mysqli_fetch_array($resproc2)) {
	if($regproc2["idusuario"] ==  $traproc22["idusuario2"]){

			?>	
	<option selected value= "<?php echo $traproc22["idusuario2"];?>"><?php echo $traproc22["nombre2"]." ".$traproc22["apellido2"];?></option>

	<?php } else {   ?>		
					<option value= "<?php  echo $regproc2["idusuario"];?>">  <?php echo $regproc2["nombre"]." ".$regproc2["apellido"];?></option>
				<?php
				}	
			}
	?>
	</select>
									<?php }  ?>



							</div>

							<div class="fcell">
								Tiempo TimeCoder 6
							</div>

							<div class="fcell">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempotc6" value="<?php echo $tra["tiempotc6"] ?>" id="tiempotc6">
								</div>
							</div>



							<div class="fcell">Plazo Tc6</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_tc6" id="fecha_plazo_tc6" value="<?php echo $tra["fecha_plazo_tc6"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_tc6" id="fecha_entrega_tc6" <?php /*Condición corta*/ echo $tra["fecha_entrega_tc6"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>

						<div class="frow">

							<div class="fcell">
								Fecha Interna
							</div>

							<div class="fcell">
								<div class="input-group input-append date" id="datePicker2">
									<input type="text" class="form-control  input-sml" name="fechainterna2" value="<?php echo $tra["fechainterna2"] ?>" id="fechainterna2">
									<span class="input-group-addon add-on" style="border-radius: 0px"><span class="glyphicon glyphicon-calendar"></span></span>

								</div>

							</div>

						</div>
					</div>


					<div class="fgridparent" id="grid4" style="border-left: 1px solid; border-right:1px solid;border-color: #BCE8F1" width="1000px" align="center" border="0">


						<div class="frow" style="background-color: #BCE8F1;">
							<div class="fcell"> <span class="label label-default" style="margin: 5px 0;">PostProductores </span></div>
						</div>



						<div class="frow">

							<div class="fcell">
								PostProductor 1
							</div>
							<div class="fcell">





								<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductor1
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


									<?php if ($tra["idpostproductor1"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp1" class="form-control" id="pp1">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp1" class="form-control" id="pp1">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>




							</div>

							<div class="fcell">
								Tiempo PostProductor 1
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control" name="tiempopp1" value="<?php echo $tra["tiempopp1"] ?>" id="tiempopp1">
								</div>
							</div>



							<div class="fcell">Plazo PP1</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_pp1" id="fecha_plazo_pp1" value="<?php echo $tra["fecha_plazo_pp1"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_pp1" id="fecha_entrega_pp1" <?php /*Condición corta*/ echo $tra["fecha_entrega_pp1"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								PostProductor 2
							</div>
							<div class="fcell">



								<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductor2
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


									<?php if ($tra["idpostproductor2"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp2" class="form-control" id="pp2">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp2" class="form-control" id="pp2">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>










							</div>

							<div class="fcell">
								Tiempo PostProductor 2
							</div>

							<div class="fcell number">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempopp2" value="<?php echo $tra["tiempopp2"] ?>" id="tiempopp2">
								</div>
							</div>



							<div class="fcell">Plazo PP2</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_pp2" id="fecha_plazo_pp2" value="<?php echo $tra["fecha_plazo_pp2"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_pp2" id="fecha_entrega_pp2" <?php /*Condición corta*/ echo $tra["fecha_entrega_pp2"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								PostProductor 3
							</div>
							<div class="fcell">

								<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductor3
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


									<?php if ($tra["idpostproductor3"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp3" class="form-control" id="pp3">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp3" class="form-control" id="pp3">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>



							</div>

							<div class="fcell">
								Tiempo PostProductor 3
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempopp3" value="<?php echo $tra["tiempopp3"] ?>" id="tiempopp3">

								</div>
							</div>


							<div class="fcell">Plazo PP3</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_pp3" id="fecha_plazo_pp3" value="<?php echo $tra["fecha_plazo_pp3"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_pp3" id="fecha_entrega_pp3" <?php /*Condición corta*/ echo $tra["fecha_entrega_pp3"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>


						</div>


						<div class="frow">

							<div class="fcell">
								PostProductor 4
							</div>
							<div class="fcell">



								<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductor4
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


									<?php if ($tra["idpostproductor4"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp4" class="form-control" id="pp4">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp4" class="form-control" id="pp4">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>




							</div>

							<div class="fcell">
								Tiempo PostProductor 4
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempopp4" value="<?php echo $tra["tiempopp4"] ?>" id="tiempopp4">
								</div>
							</div>



							<div class="fcell">Plazo PP4</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_pp4" id="fecha_plazo_pp4" value="<?php echo $tra["fecha_plazo_pp4"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_pp4" id="fecha_entrega_pp4" <?php /*Condición corta*/ echo $tra["fecha_entrega_pp4"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>


						<div class="frow">

							<div class="fcell">
								PostProductor 5
							</div>
							<div class="fcell">



								<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductor5
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


									<?php if ($tra["idpostproductor5"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp5" class="form-control" id="pp5">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp5" class="form-control" id="pp5">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>








							</div>

							<div class="fcell">
								Tiempo PostProductor 5
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempopp5" value="<?php echo $tra["tiempopp5"] ?>" id="tiempopp5">

								</div>
							</div>



							<div class="fcell">Plazo PP5</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_pp5" id="fecha_plazo_pp5" value="<?php echo $tra["fecha_plazo_pp5"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_pp5" id="fecha_entrega_pp5" <?php /*Condición corta*/ echo $tra["fecha_entrega_pp5"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>

						<div class="frow">

							<div class="fcell">
								PostProductor 6
							</div>
							<div class="fcell">




								<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductor6
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


									<?php if ($tra["idpostproductor6"] == "0") { 
	  ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp6" class="form-control" id="pp6">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
									<?php }  else { ?>
									<!-- Atributos "data" para validar por javascript -->
									<select data-asignar="true" data-postproductor="true" name="pp6" class="form-control" id="pp6">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
									<?php }  ?>


							</div>

							<div class="fcell">
								Tiempo PostProductor 6
							</div>

							<div class="fcell nbe">
								<div class="inputnumberexpand">
									<input type="number" class="form-control  input-sml" name="tiempopp6" value="<?php echo $tra["tiempopp6"] ?>" id="tiempopp6">
								</div>
							</div>



							<div class="fcell">Plazo PP6</div>
							<div class="fcell">
								<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_pp6" id="fecha_plazo_pp6" value="<?php echo $tra["fecha_plazo_pp6"] ?>">
							</div>
							<div class="fcell checkcombo">
								<span>¿Entregó?</span>
								<input type="checkbox" class="  input-sml" name="fecha_entrega_pp6" id="fecha_entrega_pp6" <?php /*Condición corta*/ echo $tra["fecha_entrega_pp6"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
							</div>

						</div>

						<div class="frow">

							<div class="fcell">
								Fecha Interna
							</div>

							<div class="fcell">

								<div class="input-group input-append date" id="datePicker3">
									<input type="text" class="form-control  input-sml" name="fechainterna3" value="<?php echo $tra["fechainterna3"] ?>" id="fechainterna3">
									<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>

							<div class="fcell" style="flex: 1 1 100%;">
								<input type="checkbox" id="checkpp" name="chb1" onclick="MuestraPP()" /> ¿Dividir PostProductores?
							</div>
						</div>
					</div>


					<div id="divpostproductordos" style="display: none;">

						<div class="fgridparent" id="grid5" style="border-left: 1px solid; border-right:1px solid;border-color: #BCE8F1" width="1000px" align="center" border="0">


							<div class="frow" style="background-color: #BCE8F1;">
								<div class="fcell"> <span class="label label-default" style="margin: 5px 0;">PostProductores "Dos" </span></div>
							</div>



							<div class="frow">

								<div class="fcell">
									PostProductor 1
								</div>
								<div class="fcell">





									<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductordos1
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


										<?php if ($tra["idpostproductordos1"] == "0") { 
	  ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos1" class="form-control" id="ppdos1">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
										<?php }  else { ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos1" class="form-control" id="ppdos1">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
										<?php }  ?>




								</div>

								<div class="fcell">
									Tiempo PostProductor 1
								</div>

								<div class="fcell nbe">
									<div class="inputnumberexpand">
										<input type="number" class="form-control" name="tiempoppdos1" value="<?php echo $tra["tiempoppdos1"] ?>" id="tiempoppdos1">
									</div>
								</div>



								<div class="fcell">Plazo PP1</div>
								<div class="fcell">
									<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_ppdos1" id="fecha_plazo_ppdos1" value="<?php echo $tra["fecha_plazo_ppdos1"] ?>">
								</div>
								<div class="fcell checkcombo">
									<span>¿Entregó?</span>
									<input type="checkbox" class="  input-sml" name="fecha_entrega_ppdos1" id="fecha_entrega_ppdos1" <?php /*Condición corta*/ echo $tra["fecha_entrega_ppdos1"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
								</div>

							</div>


							<div class="frow">

								<div class="fcell">
									PostProductor 2
								</div>
								<div class="fcell">



									<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductordos2
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


										<?php if ($tra["idpostproductordos2"] == "0") { 
	  ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos2" class="form-control" id="ppdos2">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
										<?php }  else { ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos2" class="form-control" id="ppdos2">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
										<?php }  ?>










								</div>

								<div class="fcell">
									Tiempo PostProductor 2
								</div>

								<div class="fcell nbe">
									<div class="inputnumberexpand">
										<input type="number" class="form-control  input-sml" name="tiempoppdos2" value="<?php echo $tra["tiempoppdos2"] ?>" id="tiempoppdos2">
									</div>
								</div>



								<div class="fcell">Plazo PP2</div>
								<div class="fcell">
									<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_ppdos2" id="fecha_plazo_ppdos2" value="<?php echo $tra["fecha_plazo_ppdos2"] ?>">
								</div>
								<div class="fcell checkcombo">
									<span>¿Entregó?</span>
									<input type="checkbox" class="  input-sml" name="fecha_entrega_ppdos2" id="fecha_entrega_ppdos2" <?php /*Condición corta*/ echo $tra["fecha_entrega_ppdos2"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
								</div>

							</div>


							<div class="frow">

								<div class="fcell">
									PostProductor 3
								</div>
								<div class="fcell">

									<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductordos3
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


										<?php if ($tra["idpostproductordos3"] == "0") { 
	  ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos3" class="form-control" id="ppdos3">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
										<?php }  else { ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos3" class="form-control" id="ppdos3">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
										<?php }  ?>



								</div>

								<div class="fcell">
									Tiempo PostProductor 3
								</div>

								<div class="fcell nbe">
									<div class="inputnumberexpand">
										<input type="number" class="form-control  input-sml" name="tiempoppdos3" value="<?php echo $tra["tiempoppdos3"] ?>" id="tiempoppdos3">

									</div>
								</div>



								<div class="fcell">Plazo PP3</div>
								<div class="fcell">
									<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_ppdos3" id="fecha_plazo_ppdos3" value="<?php echo $tra["fecha_plazo_ppdos3"] ?>">
								</div>
								<div class="fcell checkcombo">
									<span>¿Entregó?</span>
									<input type="checkbox" class="  input-sml" name="fecha_entrega_ppdos3" id="fecha_entrega_ppdos3" <?php /*Condición corta*/ echo $tra["fecha_entrega_ppdos3"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
								</div>

							</div>


							<div class="frow">

								<div class="fcell">
									PostProductor 4
								</div>
								<div class="fcell">



									<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductordos4
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


										<?php if ($tra["idpostproductordos4"] == "0") { 
	  ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos4" class="form-control" id="ppdos4">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
										<?php }  else { ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos4" class="form-control" id="ppdos4">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
										<?php }  ?>




								</div>

								<div class="fcell">
									Tiempo PostProductor 4
								</div>

								<div class="fcell nbe">
									<div class="inputnumberexpand">
										<input type="number" class="form-control  input-sml" name="tiempoppdos4" value="<?php echo $tra["tiempoppdos4"] ?>" id="tiempoppdos4">
									</div>
								</div>



								<div class="fcell">Plazo PP4</div>
								<div class="fcell">
									<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_ppdos4" id="fecha_plazo_ppdos4" value="<?php echo $tra["fecha_plazo_ppdos4"] ?>">
								</div>
								<div class="fcell checkcombo">
									<span>¿Entregó?</span>
									<input type="checkbox" class="  input-sml" name="fecha_entrega_ppdos4" id="fecha_entrega_ppdos4" <?php /*Condición corta*/ echo $tra["fecha_entrega_ppdos4"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
								</div>

							</div>


							<div class="frow">

								<div class="fcell">
									PostProductor 5
								</div>
								<div class="fcell">



									<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductordos5
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


										<?php if ($tra["idpostproductordos5"] == "0") { 
	  ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos5" class="form-control" id="ppdos5">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
										<?php }  else { ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos5" class="form-control" id="ppdos5">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
										<?php }  ?>








								</div>

								<div class="fcell">
									Tiempo PostProductor 5
								</div>

								<div class="fcell nbe">
									<div class="inputnumberexpand">
										<input type="number" class="form-control  input-sml" name="tiempoppdos5" value="<?php echo $tra["tiempoppdos5"] ?>" id="tiempoppdos5">

									</div>
								</div>



								<div class="fcell">Plazo PP5</div>
								<div class="fcell">
									<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_ppdos5" id="fecha_plazo_ppdos5" value="<?php echo $tra["fecha_plazo_ppdos5"] ?>">
								</div>
								<div class="fcell checkcombo">
									<span>¿Entregó?</span>
									<input type="checkbox" class="  input-sml" name="fecha_entrega_ppdos5" id="fecha_entrega_ppdos5" <?php /*Condición corta*/ echo $tra["fecha_entrega_ppdos5"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
								</div>

							</div>

							<div class="frow">

								<div class="fcell">
									PostProductor 6
								</div>
								<div class="fcell">




									<?php	
		$sqlproc3 = "select idusuario,nombre,apellido from usuario where idcargo1=3 or idcargo2=3 order by nombre asc" ;
		$resproc3 = mysqli_query($con,$sqlproc3);
		
		$sqlproc33= "select p.idprocedimiento, u.idusuario as idusuario2,u.nombre as nombre2,u.apellido as apellido2 from usuario u, procedimiento p
		where 
		u.idusuario = p.idpostproductordos6
		and
		p.idprocedimiento = '$idprocedimiento'";

		$queryproc33 = mysqli_query($con,$sqlproc33)or die('Fallo en la consulta');
		$traproc33= mysqli_fetch_array($queryproc33);
		?>


										<?php if ($tra["idpostproductordos6"] == "0") { 
	  ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos6" class="form-control" id="ppdos6">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3))
			{
			?>
		<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}
				?>
	</select>
										<?php }  else { ?>
										<!-- Atributos "data" para validar por javascript -->
										<select data-asignar="true" data-postproductor="true" name="ppdos6" class="form-control" id="ppdos6">
	<option  value = "0"> (Sin Especificar)</option>
		
	<?php
		while ($regproc3 = mysqli_fetch_array($resproc3)) {
if($regproc3["idusuario"] ==  $traproc33["idusuario2"]){

		?>	
<option selected value= "<?php echo $traproc33["idusuario2"];?>"><?php echo $traproc33["nombre2"]." ".$traproc33["apellido2"];?></option>

<?php } else {   ?>		
				<option value= "<?php  echo $regproc3["idusuario"];?>">  <?php echo $regproc3["nombre"]." ".$regproc3["apellido"];?></option>
			<?php
			}	
		}
?>
</select>
										<?php }  ?>


								</div>

								<div class="fcell">
									Tiempo PostProductor 6
								</div>

								<div class="fcell nbe">
									<div class="inputnumberexpand">
										<input type="number" class="form-control  input-sml" name="tiempoppdos6" value="<?php echo $tra["tiempoppdos6"] ?>" id="tiempoppdos6">
									</div>
								</div>



								<div class="fcell">Plazo PP6</div>
								<div class="fcell">
									<input type="text" class="form-control  input-sml datetime" name="fecha_plazo_ppdos6" id="fecha_plazo_ppdos6" value="<?php echo $tra["fecha_plazo_ppdos6"] ?>">
								</div>
								<div class="fcell checkcombo">
									<span>¿Entregó?</span>
									<input type="checkbox" class="  input-sml" name="fecha_entrega_ppdos6" id="fecha_entrega_ppdos6" <?php /*Condición corta*/ echo $tra["fecha_entrega_ppdos6"]!='' /*Condición*/ ? 'checked disabled' /*Si se cumple*/ : '' /*Si NO se cumple*/ ?> value="Si">
								</div>

							</div>

							<div class="frow">

								<div class="fcell">
									Fecha Interna
								</div>

								<div class="fcell">

									<div class="input-group input-append date" id="datePicker4">
										<input type="text" class="form-control  input-sml" name="fechainterna4" value="<?php echo $tra["fechainterna4"] ?>" id="fechainterna4">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>

								<div class="fcell">

								</div>

								<div class="fcell">

								</div>
							</div>

						</div>


					</div>

					<?php if($_SESSION["tipousuario"] == "ADMINISTRADOR"){   ?>
					<div class="fgridparent" id="grid6" style="border-left: 1px solid; border-right:1px solid;border-bottom:1px solid;border-color: #BCE8F1" width="1000px" align="center" border="0">

						<div class="frow" style="background-color: #BCE8F1;">
							<div class="fcell"> <span class="label label-default" style="margin: 5px 0;">Otros </span></div>
						</div>

						<div class="frow">


							<div class="fcell" width="102px">
								Estado Cliente
							</div>

							<div class="fcell">


								<?php if($tra["estadocliente"] == 0) {   ?>
								<SELECT NAME="estadocliente" id="estadocliente" class="form-control">
				  <OPTION selected VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION VALUE="1">Cancelado</OPTION>
				  <OPTION VALUE="2">En proceso</OPTION>
				   <OPTION VALUE="3">Suspendido</OPTION>
				   <OPTION VALUE="4">Entregado</OPTION>
				  </SELECT>
								<?php }  ?>


								<?php if($tra["estadocliente"] == 1) {   ?>
								<SELECT NAME="estadocliente" id="estadocliente" class="form-control">
				   <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION  selected VALUE="1">Cancelado</OPTION>
				  <OPTION VALUE="2">En proceso</OPTION>
				   <OPTION VALUE="3">Suspendido</OPTION>
				   <OPTION VALUE="4">Entregado</OPTION>
				  </SELECT>
								<?php }  ?>




								<?php if($tra["estadocliente"] == 2) {   ?>
								<SELECT NAME="estadocliente" id="estadocliente" class="form-control">
				   <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION   VALUE="1">Cancelado</OPTION>
				  <OPTION  selected VALUE="2">En proceso</OPTION>
				   <OPTION VALUE="3">Suspendido</OPTION>
				   <OPTION VALUE="4">Entregado</OPTION>
				  </SELECT>
								<?php }  ?>




								<?php if($tra["estadocliente"] == 3) {   ?>
								<SELECT NAME="estadocliente" id="estadocliente" class="form-control">
				   <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION   VALUE="1">Cancelado</OPTION>
				  <OPTION   VALUE="2">En proceso</OPTION>
				   <OPTION selected VALUE="3">Suspendido</OPTION>
				   <OPTION VALUE="4">Entregado</OPTION>
				  </SELECT>
								<?php }  ?>


								<?php if($tra["estadocliente"] == 4) {   ?>
								<SELECT NAME="estadocliente" id="estadocliente" class="form-control">
				   <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION   VALUE="1">Cancelado</OPTION>
				  <OPTION   VALUE="2">En proceso</OPTION>
				   <OPTION  VALUE="3">Suspendido</OPTION>
				   <OPTION selected VALUE="4">Entregado</OPTION>
				  </SELECT>
								<?php }  ?>

							</div>



						<div class="fcell">
							Estado Interno
						</div>

						<div class="fcell" style="border-right:1px solid;border-color: #BCE8F1">

							<?php if($tra["estadointerno"] == 0) {   ?>
							<SELECT NAME="estadointerno" id="estadointerno" class="form-control">
				  <OPTION selected VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION VALUE="1">Asignado</OPTION>
				  <OPTION VALUE="2">Atrasado</OPTION>
				   <OPTION VALUE="3">Entregado</OPTION>
				  </SELECT>
							<?php }  ?>


							<?php if($tra["estadointerno"] == 1) {   ?>
							<SELECT NAME="estadointerno" id="estadointerno" class="form-control">
				  <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION selected VALUE="1">Asignado</OPTION>
				  <OPTION VALUE="2">Atrasado</OPTION>
				   <OPTION VALUE="3">Entregado</OPTION>
				  </SELECT>
							<?php }  ?>




							<?php if($tra["estadointerno"] == 2) {   ?>
							<SELECT NAME="estadointerno" id="estadointerno" class="form-control">
				 <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION  VALUE="1">Asignado</OPTION>
				  <OPTION selected VALUE="2">Atrasado</OPTION>
				   <OPTION VALUE="3">Entregado</OPTION>
				</SELECT>
					<?php }  ?>
					
					
					
						   <?php if($tra["estadointerno"] == 3) {   ?>
				  <SELECT NAME="estadointerno" id="estadointerno" class="form-control">
				 <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION  VALUE="1">Asignado</OPTION>
				  <OPTION  VALUE="2">Atrasado</OPTION>
				   <OPTION selected VALUE="3">Entregado</OPTION>
				</SELECT>
					<?php }  ?>
				</div>
		 
		 <div class="frow">
		 
		 <div class="fcell" style="justify-self: center; background-color: #BCE8F1;"> Observaciones</div>
		 <div class="fcell" style="flex: 1 1 100%"><textarea id="nota" name="nota" class="form-control" rows="5" id="comment"><?php echo $tra["observaciones"] ?></textarea></div>
  </div>
   
  </div>
  
 
   <?php  

   } 
   else
	  {
   ?>  
		<input type="hidden" name="estadointerno" id="estadointerno" value="<?php echo $tra["estadointerno"]?>">
		<input type="hidden" name="estadocliente" id="estadocliente" value="<?php echo $tra["estadocliente"]?>">
   
   <?php
       } 
   ?>
 </div>
 <div id="grid7" class="fgridparent">
 	
	<div class="frow">
		<div class="fcell">
			<input name="grabar" class="btn btn-primary"  onclick="ValidaIngreso()" value = "Grabar"  title = "Grabar" style="width:30%; border-radius: 0;" />
		</div>
		<input type="hidden" name="idprocedimiento"  value="<?php echo $idprocedimiento ?>" id="idprocedimiento">
		<div class="fcell">
			
		<?php if($_SESSION["tipousuario"] == "ADMINISTRADOR"){   ?>
			<button type="button" onclick="window.location.href='delete.php?idprocedimiento=<?php echo $idprocedimiento ?>'"  class="btn btn-danger" style="width:30%; border-radius: 0;">Borrar</button>
		</div> 

   <?php }  ?>
	</div>
 </div>
			
</form>

<?php require_once("footer/footer.php")  ?>

<?php



$sql233="select idpostproductordos1,idpostproductordos2,idpostproductordos3,idpostproductordos4,idpostproductordos5,idpostproductordos6
 from procedimiento where idprocedimiento = '$idprocedimiento'
 
and idpostproductordos1>0
or
idpostproductordos2>0
or
idpostproductordos3>0
or
idpostproductordos4>0
or 
idpostproductordos5>0
or
idpostproductordos6>0 
 ";

if ($result233=mysqli_query($con,$sql233))
  {

  $rowcount=mysqli_num_rows($result233);

  }
  

if($rowcount > 0 )
{
?>
<script>
	
	let check = document.getElementById("checkpp");
	if (!check.checked){
		check.click();
		echo "yes";
	}

</script>

<?php 

}


else{
	
	?>
	<script>
		let check = document.getElementById("checkpp");
		if (check.checked){
			check.click();
			echo "dont";
		}
	 </script>
	<?php
}
?>