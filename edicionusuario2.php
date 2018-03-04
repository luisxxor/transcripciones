 <?php  
 require_once 'conexion.php';
ini_set("session.cookie_lifetime","30000");
ini_set("session.gc_maxlifetime","30000");
 session_start();
 
 
 if($_SESSION["idusuario"] == "")
 {
	 
  echo "<script type = 'text/javascript'>
	alert('Debes ser administrador');
		window.location='index.php';
	</script>";
	
	 
 }
 
 $idusuario = $_SESSION["idusuario"];
 
  if($_SESSION["tipousuario"] == "ADMINISTRADOR")
 {
	 
	  echo "<script type = 'text/javascript'>

		window.location='/transcripciones/edicionusuario.php?idusuario=$idusuario';
	</script>";
	
	 
 }
 
 
 ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="autdor" content="">
   
<style>
.form-control {
    
    height: 35px !important;
    
}

</style>
   
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/navbar-static-top.css" rel="stylesheet">
	 <link href="css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery-ui-1.10.3.custom.js"></script>
	 
	 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<link rel="stylesheet" href="/path/to/bootstrap-material-datetimepicker.css">
<script src="/path/to/bootstrap-material-datetimepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>










</head>

<?php
//mostramos el header
require_once('menu.php');

 $idusuario = $_GET["idusuario"]; 
 
   $sql2 = "SELECT password, usuario, nombre, apellido, fechaIngreso, estado, idtipousuario, idcargo1, idcargo2 FROM usuario WHERE 1=1 and idusuario = $idusuario"; 
   $query = mysqli_query($con,$sql2)or die('Fallo en la consulta'); 
    $tra= mysqli_fetch_array($query); 
	 

 
?>
<form name ="form" id="form" method="post"  >
 <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Actualizar Usuario</div>
                       
                    </div>     


					 <div class="box-body table-responsive no-padding"> 
					    <table class="table table-hover"> 
						 <tr> 
						  
						   <td> 
						    Usuario:
							 </td> 
							   <td> 
							    
                             <input  id="usuario" type="text" class="form-control" name="usuario" readonly  disabled value="<?php echo $tra["usuario"] ?>" placeholder="Usuario">         
								 </td> 
								  
								     
							   </tr> 
							   
							    <tr> 
								 
								  <td> 
								   Nombre:
								    </td> 
									 
									   <td> 
									     <input type="text" class="form-control  input-sml" name="nombre" placeholder="Nombre" value="<?php echo $tra["nombre"] ?>" id="nombre"> 
										 </td> 
										  
										  
										  </tr> 
							   
							    <tr> 
								 
								  <td> 
								   Apellido:
								    </td> 
									 
									   <td> 
									     <input type="text" class="form-control  input-sml" name="apellido" placeholder="Apellido" value="<?php echo $tra["apellido"] ?>" id="apellido"> 
										 </td> 
										  
										  </tr> 
							    <tr> 
								 
								  <td> 
								   Password:
								    </td> 
									 
									   <td> 
									     
                                        <input id="password1"  type="password" class="form-control" name="password1" value="<?php echo $tra["password"] ?>">
										 </td> 
										  
										  </tr> 
							   
							   
							   
							   
							    <tr> 
								 
								  <td> 
								   Repetir Password:
								    </td> 
									 
									   <td> 
									 
                                        <input id="password2"  type="password" class="form-control" name="password2" value="<?php echo $tra["password"] ?>">
										 </td> 
										  
										  </tr> 
							   
							   
							    <tr> 
								 
								  <td> 
								   Cargo 1:
								    </td> 
									 
									   <td> 
				



									    			   
					<?php
$ql = "select idcargo,cargo from cargo order by idcargo asc";
$resql = mysqli_query($con,$ql);

$ql2= "SELECT u.idcargo1 as idcargo1, c.cargo as cargo 
from usuario u, cargo c
where 1=1
AND
u.idcargo1 = c.idcargo
and u.idusuario = $idusuario";
$query2 = mysqli_query($con,$ql2)or die('Fallo en la consulta');
$tra2= mysqli_fetch_array($query2);


?> 
	  
	  
	   <?php if ($tra2["idcargo1"] == "0") { 
	  ?>
	<select name = "cargo1" class="form-control" id="cargo1" readonly  disabled="true">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($regql = mysqli_fetch_array($resql))
			{
			?>
		<option value= "<?php  echo $regql["idcargo"];?>">  <?php echo $regql["cargo"]; ?></option>
			<?php
			}
				?>
	</select>
	  

					<?php }  else { ?>
	<select name = "cargo1" class="form-control" id="cargo1" readonly  disabled="true">
	<option  value = "0"> (Sin Especificar)</option>	
	<?php
		while ($regql = mysqli_fetch_array($resql)) {

if($regql["idcargo"] == $tra2["idcargo1"]){  ?>
	
	<option selected value= "<?php echo $tra2["idcargo1"];?>"><?php echo $tra2["cargo"]?></option>
	
<?php }  else { ?>
		     <option value= "<?php  echo $regql["idcargo"];?>">  <?php echo $regql["cargo"];?></option>
			<?php
			} 	
		}
			?>
			</select>
		<?php  } ?>		
					
					












				
										 </td> 
										  
										  </tr> 
										  
										  
										  
										  
										  
										  
										      <tr> 
								 
								  <td> 
								   Cargo 2:
								    </td> 
									 
									   <td> 
									    			   
					<?php
$sql11 = "select idcargo,cargo from cargo order by idcargo asc";
$res11 = mysqli_query($con,$sql11);

$sql22= "SELECT u.idcargo2 as idcargo2, c.cargo as cargo 
from usuario u, cargo c
where 1=1
AND
u.idcargo2 = c.idcargo
and u.idusuario = $idusuario";
$query22 = mysqli_query($con,$sql22)or die('Fallo en la consulta');
$tra22= mysqli_fetch_array($query22);


?> 
	  
	  
	   <?php if ($tra22["idcargo2"] == "0") { 
	  ?>
	<select name = "cargo2" class="form-control" id="cargo2" readonly  disabled="true">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($reg11 = mysqli_fetch_array($res11))
			{
			?>
		<option value= "<?php  echo $reg11["idcargo"];?>">  <?php echo $reg11["cargo"]; ?></option>
			<?php
			}
				?>
	</select>
	  

					<?php }  else { ?>
	<select name = "cargo2" class="form-control" id="cargo2" readonly  disabled="true">
	<option  value = "0"> (Sin Especificar)</option>	
	<?php
		while ($reg11 = mysqli_fetch_array($res11)) {

if($reg11["idcargo"] == $tra22["idcargo2"]){  ?>
	
	<option selected value= "<?php echo $tra22["idcargo2"];?>"><?php echo $tra22["cargo"]?></option>
	
<?php }  else { ?>
		     <option value= "<?php  echo $reg11["idcargo"];?>">  <?php echo $reg11["cargo"];?></option>
			<?php
			} 	
		}
			?>
			</select>
		<?php  } ?>		
					
					
					
	
					
										 </td> 
										  
										  </tr> 
										  
										    <tr> 
								 
								  <td> 
								   Cargo 3:
								    </td> 
									 
									   <td> 
									    			   
					<?php
$sql11 = "select idcargo,cargo from cargo order by idcargo asc";
$res11 = mysqli_query($con,$sql11);

$sql22= "SELECT u.idcargo3 as idcargo3, c.cargo as cargo 
from usuario u, cargo c
where 1=1
AND
u.idcargo3 = c.idcargo
and u.idusuario = $idusuario";
$query22 = mysqli_query($con,$sql22)or die('Fallo en la consulta');
$tra33= mysqli_fetch_array($query22);


?> 
	  
	  
	   <?php if ($tra33["idcargo3"] == "0") { 
	  ?>
	<select name = "cargo3" class="form-control" id="cargo3" readonly  disabled="true">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($reg11 = mysqli_fetch_array($res11))
			{
			?>
		<option value= "<?php  echo $reg11["idcargo"];?>">  <?php echo $reg11["cargo"]; ?></option>
			<?php
			}
				?>
	</select>
	  

					<?php }  else { ?>
	<select name = "cargo3" class="form-control" id="cargo3" readonly  disabled="true">
	<option  value = "0"> (Sin Especificar)</option>	
	<?php
		while ($reg11 = mysqli_fetch_array($res11)) {

if($reg11["idcargo"] == $tra33["idcargo3"]){  ?>
	
	<option selected value= "<?php echo $tra22["idcargo3"];?>"><?php echo $tra33["cargo"]?></option>
	
<?php }  else { ?>
		     <option value= "<?php  echo $reg11["idcargo"];?>">  <?php echo $reg11["cargo"];?></option>
			<?php
			} 	
		}
			?>
			</select>
		<?php  } ?>		
					
					
					
	
					
										 </td> 
										  
										  </tr> 
										   <tr> 
										    
											 <td> 
											  Privilegios:
											   </td> 
											    
												  <td> 
												       
                                       
						
<?php
$sql = "select idtipousuario,tipousuario from tipousuario order by idtipousuario asc";
$res = mysqli_query($con,$sql);

$sql2= "SELECT u.idtipousuario as idtipousuario, t.tipousuario as tipousuario 
from usuario u, tipousuario t
where 1=1
AND
u.idtipousuario = t.idtipousuario
and u.idusuario = $idusuario";
$query2 = mysqli_query($con,$sql2)or die('Fallo en la consulta');
$tra2= mysqli_fetch_array($query2);


?> 
	  
	  
	   <?php if ($tra["idtipousuario"] == "0") { 
	  ?>
	<select name = "tipousuario" class="form-control" id="tipousuario" readonly  disabled="true">
	<option selected value = "0"> (Sin Especificar)</option>
	<?php
		while ($reg = mysqli_fetch_array($res))
			{
			?>
		<option value= "<?php  echo $reg["idtipousuario"];?>">  <?php echo $reg["tipousuario"]; ?></option>
			<?php
			}
				?>
	</select>
	  

					<?php }  else { ?>
	<select name = "tipousuario" class="form-control" id="tipousuario" readonly  disabled="true">
	<option  value = "0"> (Sin Especificar)</option>	
	<?php
		while ($reg = mysqli_fetch_array($res)) {

if($reg["idtipousuario"] == $tra2["idtipousuario"]){  ?>
	
	<option selected value= "<?php echo $tra2["idtipousuario"];?>"><?php echo $tra2["tipousuario"]?></option>
	
<?php }  else { ?>
		     <option value= "<?php  echo $reg["idtipousuario"];?>">  <?php echo $reg["tipousuario"];?></option>
			<?php
			} 	
		}
			?>
			</select>
		<?php  } ?>		
												    </td> 
													 
													 </tr> 
										  
										  
									
										  
										  
							    </table> 
					<input align ="right" style="margin-left:80%" name="ingresar" class="btn btn-primary large" onclick="ValidaIngreso()"  type="submit" value = "Actualizar"  title = "Actualizar"/>
					
					
					       
					
			
                            </form>     



                        </div>                     
                    </div>  
        </div>
        
    </div>
	
	
<script>
	
	
	function ValidaIngreso(){
		
	
		var password1 = document.getElementById("password1").value; 
		var password2 = document.getElementById("password2").value;
		var tipousuario = document.getElementById('tipousuario').value;		
		var usuario = document.getElementById("usuario").value; 
		
		if(usuario == "" || usuario == null){
			
		
			alert('Debe ingresar Usuario');
			return;
		}
		
			
		if(nombre == "" || nombre == null){
			
		
			alert('Debe ingresar Nombre');
			return;
		}
		
		
			
		if(apellido == "" || apellido == null){
			
		
			alert('Debe ingresar Apellido');
			return;
		}
		
		
		
		if(password1 != password2)
		{
			
			alert("Passwords No Coinciden");
			return false;
		}
		
		if(password1== "" || password2 == "" || password1== null || password2 == null){
			
			
			alert('Debe Ingresar Password');
			return false;
		}
		
		if (tipousuario == 0 || tipousuario == "0"){
			
			alert('Debe Ingresar Tipousuario');
			return false;
		}
		
		
			if (cargo1 == 0 || cargo1 == '0'){
			
			alert('Debe Ingresar Cargo 1');
			return false;
		}
		
		
		
	
		
	
			var idusu = "<?php echo $idusuario ?>";
		document.getElementById('form').action = 'edicionsaveusuario2.php?idusuario='+idusu;
		document.getElementById("form").submit();
		return true;
			
		}
		
	</script>

	
	