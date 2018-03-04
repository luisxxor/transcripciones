 <?php ini_set("session.cookie_lifetime","30000"); 
  ini_set("session.gc_maxlifetime","3000"); 
   session_start(); 
    require_once ('conexion.php'); 
	 if($_SESSION["usuario"] == "") 
		   
		   {   
		   
		    return header("Location: index.php");  
			  
		   }  
		    
			 header('Content-Type: text/html; charset=UTF-8'); ?> 
			 
			 
			 
			 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="autdor" content="">
   


	 
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
	 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<link rel="stylesheet" href="/path/to/bootstrap-material-datetimepicker.css">
<script src="/path/to/bootstrap-material-datetimepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	
	
	
	
	 <style>
th, td {
    border-bottom: 1px solid #ddd;
	
}

tr,td{border:0px}
tr:nth-child(even) {background-color: #f2f2f2}

#grabar {
 position:relative;
 
 left:61%;
}

.dropdown-toggle {   
    overflow: hidden;
    padding-right: 24px /* Optional for caret */;
    text-align: left;
    text-overflow: ellipsis;    
   
}
.form-control {   
   height: 30px;
}


body {
    
} 

</style>

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
  
function ValidaIngreso()
{
	
	
	if(sumatoriaTR() == true && sumatoriaTC() ==true && sumatoriaPP() == true){
	document.getElementById("form").submit();
	return true;
	}
	
	else {
		return false;
		
	}
}

function sumatoriaTR(){
	
	
	var duracion = parseInt(document.getElementById("duracion").value);
	
	var tiempotr1 =  parseInt(document.getElementById("tiempotr1").value);
	var tiempotr2 =  parseInt(document.getElementById("tiempotr2").value);
	var tiempotr3 =  parseInt(document.getElementById("tiempotr3").value);
	var tiempotr4 =  parseInt(document.getElementById("tiempotr4").value);
	var tiempotr5 =  parseInt(document.getElementById("tiempotr5").value);
	var tiempotr6 =  parseInt(document.getElementById("tiempotr6").value);

    var sumatoriatr = tiempotr1+tiempotr2+tiempotr3+tiempotr4+tiempotr5+tiempotr6;

	 //alert(sumatoriatr);
		 if(sumatoriatr == 0 || sumatoriatr == duracion)
		 {
 
			return true;
		 }
		 
		 else 
		 {
 
		 alert('La sumatoria de los tiempos de Transcripcion, debe ser igual a la duracion del archivo');
		return false;
		 
	 }
	 
}

function sumatoriaTC(){

var duracion = parseInt(document.getElementById("duracion").value);

	var tiempotc1 =  parseInt(document.getElementById("tiempotc1").value);
	var tiempotc2 =  parseInt(document.getElementById("tiempotc2").value);
	var tiempotc3 =  parseInt(document.getElementById("tiempotc3").value);
	var tiempotc4 =  parseInt(document.getElementById("tiempotc4").value);
	var tiempotc5 =  parseInt(document.getElementById("tiempotc5").value);
	var tiempotc6 =  parseInt(document.getElementById("tiempotc6").value);
	
	
 var sumatoriatc = tiempotc1+tiempotc2+tiempotc3+tiempotc4+tiempotc5+tiempotc6
 
 //alert(sumatoriatc);
 if(sumatoriatc == 0 || sumatoriatc == duracion)
		 {
			return true;
		 }
		 
		 else 
		 {
		 alert('La sumatoria de los tiempos de Timecoding, debe ser igual a la duracion del archivo');
			return false;
		 
	 }

}



function sumatoriaPP() {
	
	var duracion = parseInt(document.getElementById("duracion").value);
	
	var tiempopp1 =  parseInt(document.getElementById("tiempopp1").value);
	var tiempopp2 =  parseInt(document.getElementById("tiempopp2").value);
	var tiempopp3 =  parseInt(document.getElementById("tiempopp3").value);
	var tiempopp4 =  parseInt(document.getElementById("tiempopp4").value);
	var tiempopp5 =  parseInt(document.getElementById("tiempopp5").value);
	var tiempopp6 =  parseInt(document.getElementById("tiempopp6").value);
	
	 var sumatoriapp = tiempopp1+tiempopp2+tiempopp3+tiempopp4+tiempopp5+tiempopp6;
	//alert(sumatoriapp);
	  if(sumatoriapp <= duracion)
		 {
			 return true;
		 }
		 
		 else  
		 {
		 alert('La sumatoria de los tiempos de PostProduccion, debe ser menor o igual a la duracion del archivo');
		return false;
		 
	 }
	
}
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
 
 $sql2 = "SELECT idprocedimiento, nombrearchivo, duracion, cliente, fechacliente,
 idtranscriptor1, idtranscriptor2, idtranscriptor3, idtranscriptor4, idtranscriptor5, idtranscriptor6, tiempotr1, tiempotr2, tiempotr3, tiempotr4, tiempotr5, tiempotr6, 
 fechainterna1, idtimecoder1, idtimecoder2, idtimecoder3, idtimecoder4, idtimecoder5, idtimecoder6, 
 tiempotc1, tiempotc2, tiempotc3, tiempotc4, tiempotc5, tiempotc6, fechainterna2, 
 idpostproductor1, idpostproductor2, idpostproductor3, idpostproductor4, idpostproductor5, 
 idpostproductor6, 
 tiempopp1, tiempopp2, tiempopp3, tiempopp4, tiempopp5, tiempopp6, fechainterna3, 
 estadointerno, estadocliente FROM procedimiento WHERE idprocedimiento = '$idprocedimiento'"; 
  $query = mysqli_query($con,$sql2)or die('Fallo en la consulta'); 
  $tra= mysqli_fetch_array($query); 

	
	?> 


 <div style="border: 1px solid black"> 
 
 
<form name ="form" id="form" action="edicionsave.php" method="post"  >


  <table style="border-left: 1px solid; border-right:1px solid"  width="800px" align="center" border="0"> 
	
	
	<tr>
 <td >  </td>
  <td > </td>
   <td > <span class="label label-default">Datos Importados</span> </td>
    <td > </td>
  </tr>
	<tbody>
	 <tr> 
	 
	   <td width="102px"> 
	     Codigo
		 </td> 
		   <td> 
		     <input type="text" class="form-control  input-sml" name="codigo"  value="<?php echo $idprocedimiento ?> " READONLY id="codigo"> 
			 </td> 
		   
			 <td> 
			  Nombre Archivo
			   </td> 
				
				  <td> 
				    <input type="text" class="form-control  input-sml" name="nombrearchivo" disabled value="<?php echo $tra["nombrearchivo"]?>" id="nombrearchivo"> 
					</td> 
					</tr>
				 <tr> 
				  
				   <td> 
				    Duracion
					 </td> 
					  
					    <td> 
						  <input type="number" disabled class="form-control  input-sml" name="duracion" disabled value="<?php echo $tra["duracion"] ?>" id="duracion"> 
						  </td> 
						     <td> 
							  Cliente
							   </td> 
							    
								  <td> 
								    <input type="text" class="form-control  input-sml" name="cliente" disabled value="<?php echo $tra["cliente"]?>" id="cliente"> 
								    </td> 
									
							
						   </tr>


								 <tr> 
								 
										 <td> 
										 Fecha Cliente
										 </td> 
										 
										  <td> 
										  <input type="date" class="form-control  input-sml" name="fechacliente" disabled value="<?php echo $tra["fechacliente"]?>" id="fecha cliente"> 
										 </td> 
								  <td> 
								   
								    </td> 
									 
									   <td> 
									    
										 </td> 
								</tr>  
	</tbody>
</table>



    <table style="border-left: 1px solid; border-right:1px solid"  width="800px" align="center" border="0"> 
	
	
	<tr>
 <td >  </td>
  <td > </td>
   <td > <span class="label label-default"> Transcriptores</span> </td>
    <td > </td>
  </tr>
	

	<tbody>
	
	 <tr> 
	  
	   <td> 
	    Transcriptor 1
		 </td> 
		   <td> 

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
    <select name = "tr1" class="form-control" disabled id="tr1">
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
    <select name = "tr1" class="form-control" disabled id="tr1">
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
	   
	
			 </td> 
			 
			  <td> 
			   Tiempo Transcriptor 1
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				 <input type="number"  class="form-control  input-sml" name="tiempotr1" disabled value="<?php echo $tra["tiempotr1"] ?>" id="tiempotr1"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	    Transcriptor 2
		 </td> 
		   <td> 

		   
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
    <select name = "tr2" class="form-control" id="tr2" disabled>
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
    <select name = "tr2" class="form-control" id="tr2" disabled>
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
	   

		   
		   
			 </td> 
			 
			  <td> 
			   Tiempo Transcriptor 2
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number"  class="form-control  input-sml" name="tiempotr2" disabled value="<?php echo $tra["tiempotr2"] ?>" id="tiempotr2"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	    Transcriptor 3
		 </td> 
		   <td> 
	
	
	
	
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
    <select name = "tr3" class="form-control" id="tr3" disabled>
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
    <select name = "tr3" class="form-control" id="tr3" disabled>
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
	   
		   

			 </td> 
			 
			  <td> 
			   Tiempo Transcriptor 3
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number"  class="form-control  input-sml" name="tiempotr3" disabled value="<?php echo $tra["tiempotr3"] ?>" id="tiempotr3"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	    Transcriptor 4
		 </td> 
		   <td> 
	
	
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
    <select name = "tr4" class="form-control" id="tr4" disabled>
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
    <select name = "tr4" class="form-control" id="tr4">
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
	   
		   
		   
		   
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			 </td> 
			 
			  <td> 
			   Tiempo Transcriptor 4
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number"  class="form-control  input-sml" name="tiempotr4" disabled value="<?php echo $tra["tiempotr4"]?>" id="tiempotr4"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	    Transcriptor 5
		 </td> 
		   <td> 
		
		
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
    <select name = "tr5" class="form-control" id="tr5" disabled>
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
    <select name = "tr5" class="form-control" id="tr5" disabled>
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
	   
		   
		   

		
			 </td> 
			 
			  <td> 
			   Tiempo Transcriptor 5
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number"  class="form-control  input-sml" name="tiempotr5" disabled value="<?php echo $tra["tiempotr5"]?>" id="tiempotr5"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   <tr> 
	  
	   <td> 
	    Transcriptor 6
		 </td> 
		   <td> 
		    	  
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
    <select name = "tr6" class="form-control" id="tr6" disabled>
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
    <select name = "tr6" class="form-control" id="tr6">
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
	   

			 </td> 
			 
			  <td> 
			   Tiempo Transcriptor 6
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number"  class="form-control  input-sml" name="tiempotr6" disabled value="<?php echo $tra["tiempotr6"] ?>" id="tiempotr6"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   <tr> 
			 
			  <td> 
			   Fecha Interna
			    </td> 
				 
				  <td> 
				  <div class="input-group input-append date" id="datePicker">
				   				    <input type="text" class="form-control  input-sml" name="fechainterna1"  value="<?php echo $tra["fechainterna1"] ?>" id="fechainterna1" disabled> 
									    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
				    </td> 
					
					  <td> 
					   
					    </td> 
						 
						   <td> 
						    
							 </td> 
				  </tr> 
		   </tbody>
		    </table> 
			
			

	
			
			  <table style="border-left: 1px solid; border-right:1px solid"  width="800px" align="center" border="0" > 
	
	
	<tr>
 <td >  </td>
  <td > </td>
   <td ><span class="label label-default"> TimeCoders</span> </td>
    <td > </td>
  </tr>
	
	
	
	 <tr> 
	  
	   <td> 
	    TimeCoder 1
		 </td> 
		   <td> 
			
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
    <select disabled  name = "tc1" class="form-control" id="tc1" disabled>
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
    <select disabled  name = "tc1" class="form-control" id="tc1" disabled>
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
	   
			 </td> 
			 
			  <td> 
			   Tiempo TimeCoder 1
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control" name="tiempotc1"  value="<?php echo $tra["tiempotc1"] ?>" id="tiempotc1"> 
				   </div>
				   </td> 
		   </tr> 
		   

		   <tr> 
	  
	   <td> 
	       TimeCoder 2
		 </td> 
		   <td> 

		   
		   
		   
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
    <select disabled  name = "tc2" class="form-control" id="tc2">
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
    <select disabled  name = "tc2" class="form-control" id="tc2">
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
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
			 </td> 
			 
			  <td> 
			   Tiempo TimeCoder 2
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempotc2"  value="<?php echo $tra["tiempotc2"] ?>" id="tiempotc2"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	        TimeCoder 3
		 </td> 
		   <td> 
		
		
		
		
		   
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
    <select disabled  name = "tc3" class="form-control" id="tc3">
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
    <select disabled  name = "tc3" class="form-control" id="tc3">
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
		   

		
			 </td> 
			 
			  <td> 
			   Tiempo TimeCoder 3
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempotc3"  value="<?php echo $tra["tiempotc3"] ?>" id="tiempotc3"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	       TimeCoder 4
		 </td> 
		   <td> 

		   
		   
		   
		      
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
    <select disabled  name = "tc4" class="form-control" id="tc4">
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
    <select disabled  name = "tc4" class="form-control" id="tc4">
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
 
			 </td> 
			 
			  <td> 
			   Tiempo TimeCoder 4
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempotc4"  value="<?php echo $tra["tiempotc4"] ?>" id="tiempotc4"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	        TimeCoder 5
		 </td> 
		   <td> 
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
    <select disabled  name = "tc5" class="form-control" id="tc5">
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
    <select disabled  name = "tc5" class="form-control" id="tc5">
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
		   

			 </td> 
			 
			  <td> 
			   Tiempo TimeCoder 5
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempotc5"  value="<?php echo $tra["tiempotc5"] ?>" id="tiempotc5"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   <tr> 
	  
	   <td> 
	        TimeCoder 6
		 </td> 
		   <td> 
	
	
	   
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
    <select disabled  name = "tc6" class="form-control" id="tc6">
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
    <select disabled  name = "tc6" class="form-control" id="tc6">
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
		   
		
	
			 </td> 
			 
			  <td> 
			   Tiempo TimeCoder 6
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempotc6"  value="<?php echo $tra["tiempotc6"] ?>" id="tiempotc6"> 
				   </div>
				   </td> 
		   </tr> 
		   
		 <tr> 
			 
			  <td> 
			   Fecha Interna
			    </td> 
				 
				  <td> 
				    <div class="input-group input-append date" id="datePicker2">
				   				   <input type="text" class="form-control  input-sml" name="fechainterna2" disabled value="<?php echo $tra["fechainterna2"] ?>" id="fechainterna2">
								       <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
				   
				   </div>
  <td> 
 
 </td> 
 
  <td> 
 
 </td>  
				  </tr> 
		   </tbody>
		
		    </table> 
			
			
						
			  <table style="border-left: 1px solid; border-right:1px solid"  width="800px" align="center" border="0"> 
	
	
	<tr>
 <td >  </td>
  <td > </td>
   <td > <span class="label label-default">PostProductores </span></td>
    <td > </td>
  </tr>
	
	
	
	 <tr> 
	  
	   <td> 
	    PostProductor 1
		 </td> 
		   <td> 
	
	
	
	
	
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
    <select disabled  name = "pp1" class="form-control" id="pp1">
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
    <select disabled  name = "pp1" class="form-control" id="pp1">
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
		   
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			 </td> 
			 
			  <td> 
			   Tiempo PostProductor 1
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control" name="tiempopp1"  value="<?php echo $tra["tiempopp1"] ?>" id="tiempopp1"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	       PostProductor 2
		 </td> 
		   <td> 
		
		
		
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
    <select disabled  name = "pp2" class="form-control" id="pp2">
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
    <select disabled  name = "pp2" class="form-control" id="pp2">
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
		   
		
		
		
		
		
		
		
		
		
		
		
		
			 </td> 
			 
			  <td> 
			   Tiempo PostProductor 2
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempopp2"  value="<?php echo $tra["tiempopp2"] ?>" id="tiempopp2"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	        PostProductor 3
		 </td> 
		   <td> 
		    
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
    <select disabled  name = "pp3" class="form-control" id="pp3">
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
    <select disabled  name = "pp3" class="form-control" id="pp3">
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
		   
		
		
			 </td> 
			 
			  <td> 
			   Tiempo PostProductor 3
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				    <input type="number" disabled class="form-control  input-sml" name="tiempopp3"  value="<?php echo $tra["tiempopp3"] ?>" id="tiempopp3"> 
				 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	       PostProductor 4
		 </td> 
		   <td> 
		  
		  
		  
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
    <select disabled  name = "pp4" class="form-control" id="pp4">
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
    <select disabled  name = "pp4" class="form-control" id="pp4">
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
		   
		
		  
		  
			 </td> 
			 
			  <td> 
			   Tiempo PostProductor 4
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempopp4"  value="<?php echo $tra["tiempopp4"] ?>" id="tiempopp4"> 
				   </div>
				   </td> 
		   </tr> 
		   
		   
		   <tr> 
	  
	   <td> 
	        PostProductor 5
		 </td> 
		   <td> 
		          	
					
					
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
    <select disabled  name = "pp5" class="form-control" id="pp5">
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
    <select disabled  name = "pp5" class="form-control" id="pp5">
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
		   
		
					
					
					
					
					
					
			 </td> 
			 
			  <td> 
			   Tiempo PostProductor 5
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempopp5"  value="<?php echo $tra["tiempopp5"] ?>" id="tiempopp5">
				 
				   </div>
				   </td> 
		   </tr> 
		   
		   <tr> 
	  
	   <td> 
	        PostProductor 6
		 </td> 
		   <td> 
		         	 
					 
					 
					 
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
    <select disabled  name = "pp6" class="form-control" id="pp6">
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
    <select disabled  name = "pp6" class="form-control" id="pp6">
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
		   
					 
			 </td> 
			 
			  <td> 
			   Tiempo PostProductor 6
			    </td> 
				
				 <td> 
				  <div class="col-xs-5">
				   <input type="number" disabled class="form-control  input-sml" name="tiempopp6"  value="<?php echo $tra["tiempopp6"] ?>" id="tiempopp6"> 
				   </div>
				   </td> 
		   </tr> 
		   
		  		 <tr> 
			 
			  <td> 
			   Fecha Interna
			    </td> 
				 
				  <td> 
				
				   <div class="input-group input-append date" id="datePicker3">
								<input type="text" class="form-control  input-sml" name="fechainterna3" disabled value="<?php echo $tra["fechainterna3"] ?>" id="fechainterna3">
								    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
				    </td> 
					
					 <td> 
					  
					   </td> 
					    
						  <td> 
						   
						    </td> 
				  </tr> 
		   </tbody>
		    </table> 
			
  <?php if($_SESSION["tipousuario"] == "administrador"){   ?>			
<table style="border-left: 1px solid; border-right:1px solid"  width="800px" align="center" border="0"> 

	<tr>
 <td >  </td>
  <td > </td>
   <td > <span class="label label-default">Otros </span></td>
    <td > </td>
  </tr>
  
   <tr> 
    
	
		   
		    <td width="102px"> 
			 Estado Cliente
			  </td> 
			   
			     <td> 
				   
				   
				   <?php if($tra["estadocliente"] == 0) {   ?>
				  <select disabled  NAME="estadocliente" id="estadocliente" class="form-control">
				  <OPTION selected VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION VALUE="1">Vigente</OPTION>
				  <OPTION VALUE="2">No Vigente</OPTION>
				  </SELECT>
					<?php }  ?>
					
					 
				   <?php if($tra["estadocliente"] == 1) {   ?>
				  <select disabled  NAME="estadocliente" id="estadocliente" class="form-control">
				  <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION selected VALUE="1">Vigente</OPTION>
				  <OPTION VALUE="2">No Vigente</OPTION>
				  </SELECT>
					<?php }  ?>
					
					
					
					 
				   <?php if($tra["estadocliente"] == 2) {   ?>
				  <select disabled  NAME="estadocliente" id="estadocliente" class="form-control">
				  <OPTION selected VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION VALUE="1">Vigente</OPTION>
				  <OPTION selected VALUE="2">No Vigente</OPTION>
				  </SELECT>
					<?php }  ?>
				    </td>

				   </td> 
				   
				   
				     <td> 
					  Estado Interno
					   </td> 
					    
						  <td> 
						   			   
				   <?php if($tra["estadointerno"] == 0) {   ?>
				  <select disabled  NAME="estadointerno" id="estadointerno" class="form-control">
				  <OPTION selected VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION VALUE="1">Vigente</OPTION>
				  <OPTION VALUE="2">No Vigente</OPTION>
				  </SELECT>
					<?php }  ?>
					
					 
				   <?php if($tra["estadointerno"] == 1) {   ?>
				  <select disabled  NAME="estadointerno" id="estadointerno" class="form-control">
				  <OPTION  VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION selected VALUE="1">Vigente</OPTION>
				  <OPTION VALUE="2">No Vigente</OPTION>
				  </SELECT>
					<?php }  ?>
					
					
					
					 
				   <?php if($tra["estadointerno"] == 2) {   ?>
				  <select disabled  NAME="estadointerno" id="estadointerno" class="form-control">
				  <OPTION selected VALUE="0">(Sin Especificar)</OPTION>
				  <OPTION VALUE="1">Vigente</OPTION>
				  <OPTION selected VALUE="2">No Vigente</OPTION>
				  </SELECT>
					<?php }  ?>
				    </td>
				   
				   
						    </td> 
		 </tr> 
  
   
  </table>
  
   <?php   } ?>  

</div>
   &nbsp;

   
    			<div style="margin-left:66%">			
  <button type="button"  onclick="window.location.href='/transcripciones/listadorvistausuarios/index.php'" class="btn btn-danger">Volver</button>

		</div>
			  
	
			 </br>
			 	 </br>
			
</form>