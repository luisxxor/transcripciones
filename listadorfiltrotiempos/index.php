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
	 header('Content-Type: text/html; charset=UTF-8'); 
			 require_once('../menu.php');


 ?> 
			 

	 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<link rel="stylesheet" href="/path/to/bootstrap-material-datetimepicker.css">
<script src="/path/to/bootstrap-material-datetimepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/cupertino/jquery-ui.custom.css"></link>	

	
	
	
	
<style>


</style>



<form method="post" align ="center "action="" id="form"> 
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
							<option  value = "cero"> (Sin Especificar)</option>
							<?php						
								while ($reg = mysqli_fetch_array($res))
									{					

								if($reg["cliente"] == "")
								{
									
								}	
								else {							
									?>
								<!--Aqui va el codigo html que queremos que se repita con el while-->
									<option value= "<?php echo $reg["cliente"];?>"><?php echo $reg["cliente"];?></option>
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
				   				    <input type="text" class="box" height="55px" name="fechainicio" value="0000-00-00" id="fechainicio"> 
									    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
 </td>
 
  <td>
 Fecha Termino
 
 </td>
 <td >
   <div class="input-group input-append date" id="datePicker2">
				   				    <input type="text" class="box" height="55px" name="fechatermino" value="0000-00-00" id="fechatermino"> 
									    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
 </td>
 
 <td>
 <input align ="right" style="margin-left:80%" name="Filtrar" class="btn btn-primary large"   type="submit" value = "Filtrar"  title = "Filtrar"/>
			       
 </td>
 
 <td>
 
 </td>
 <td>
 
 </td>
  <td>
 
 </td>
 </tr>
 </table>
 </br>
 </br>
</form>


<?php

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

?>


<div class="table-responsive" id="employee_table">
<div class="col-md-10 col-md-offset-1">

<table width="70%" cellpadding="5" class="table table-striped" id="Exportar_a_Excel" >
<tr colspan="10" style="border:1px solid #0000 !important;background:#0000 url(2.png) 50% 50% repeat-x !important;color:#222 !important;">
<td colspan="10" height="50px">
<span>Esteno- Reporte de Archivos</span>
</td>

</tr>
<tr style="border:1px solid #0000 !important;background:#0000 url(2.png) 50% 50% repeat-x !important;color:#2779aa !important;font-weight:bold !important" >
    <td ><strong>Codigo</strong></td>
    <td><strong>Nombre Archivo </strong></td>
    <td><strong>Duracion</strong></td>
    <td><strong>Estado Cliente</strong></td>
    <td><strong>Cliente</strong></td>

	
</tr>
<?php while ($row = mysqli_fetch_array($res)) {  ?>
<tr>

    <td><?php echo $row['idprocedimiento']; ?></td>
    <td><?php echo $row['nombrearchivo']; ?></td>
    <td><?php echo $row['duracion']; ?></td>
    <td><?php echo $row['estadocliente']; ?></td>
    <td><?php echo $row['cliente']; ?></td>
    

</tr>
<?php  } ?>
</table>


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