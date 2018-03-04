 <?php  
 require_once 'conexion.php';
ini_set("session.cookie_lifetime","2700");
ini_set("session.gc_maxlifetime","2700");
 session_start();
 
 if($_SESSION["usuario"] == "" || $_SESSION["tipousuario"] != "ADMINISTRADOR")
 {
	 
	  echo "<script type = 'text/javascript'>
	alert('Debes ser administrador');
		window.location='index.php';
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
    
    height: inherit!important;
    
}

body{
	min-height:0!important;
}


.sweet-alert h2 {
    color: #575757;
    font-size: 15px !important;
    text-align: left;
    font-weight: 600;
    text-transform: none;
    position: relative;
    margin: 5px 0 !important;
    padding: 0;
    line-height: 20px;
    display: block;
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
	 


<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css"></link>
<script src="sweet/dist/sweetalert.min.js"></script>

<script>
	
	
	function ValidaIngreso(){
		
	
		var password1 = document.getElementById("password1").value; 
		var password2 = document.getElementById("password2").value;
		var tipousuario = document.getElementById('tipousuario').value;		
		var usuario = document.getElementById("usuario").value; 
		var nombre = document.getElementById("nombre").value; 
		var apellido = document.getElementById("apellido").value; 
		
		if(usuario == "" || usuario == null){
			
		
			swal('Debe ingresar Usuario');
			

			return false;
		}
		
			
		if(nombre == "" || nombre == null){
			
		
			swal("Debe ingresar Nombre");
			return false;
		}
		
		
			
		if(apellido == "" || apellido == null){
			
		
			swal('Debe ingresar Apellido');
			return false;
		}
		
		
		
		if(password1 != password2)
		{
			
			swal("Passwords No Coinciden");
			return false;
		}
		
		if(password1== "" || password2 == "" || password1== null || password2 == null){
			
			
			swal('Debe Ingresar Password');
			return false;
		}
		
		if (tipousuario == 0 || tipousuario == "0"){
			
			swal('Debe Ingresar Tipousuario');
			return false;
		}
		
		
			if (cargo1 == 0 || cargo1 == '0'){
			
			swal('Debe Ingresar Cargo 1');
			return false;
		}
		
		
		
	
		
	
		document.getElementById('form').action = "saveusuario.php";
		document.getElementById("form").submit();
		return true;
			
		}
		
	</script>








</head>

<?php
//mostramos el header
require_once('menu.php');
?>
<form name ="form" id="form" method="post"  >
 <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Crear un Nuevo Usuario</div>
                       
                    </div>     


					 <div class="box-body table-responsive no-padding"> 
					    <table class="table table-hover"> 
						 <tr> 
						  
						   <td> 
						    Usuario:
							 </td> 
							   <td> 
							    
                             <input  id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuario">         
								 </td> 
								  
								     
							   </tr> 
							   
							    <tr> 
								 
								  <td> 
								   Nombre:
								    </td> 
									 
									   <td> 
									     <input type="text" class="form-control  input-sml" name="nombre" placeholder="Nombre" value="" id="nombre"> 
										 </td> 
										  
										  
										  </tr> 
							   
							    <tr> 
								 
								  <td> 
								   Apellido:
								    </td> 
									 
									   <td> 
									     <input type="text" class="form-control  input-sml" name="apellido" placeholder="Apellido" value="" id="apellido"> 
										 </td> 
										  
										  </tr> 
							    <tr> 
								 
								  <td> 
								   Password:
								    </td> 
									 
									   <td> 
									     
                                        <input id="password1"  type="password" class="form-control" name="password1" placeholder="Password">
										 </td> 
										  
										  </tr> 
							   
							   
							   
							   
							    <tr> 
								 
								  <td> 
								   Repetir Password:
								    </td> 
									 
									   <td> 
									 
                                        <input id="password2"  type="password" class="form-control" name="password2" placeholder="Password">
										 </td> 
										  
										  </tr> 
							   
							   
							    <tr> 
								 
								  <td> 
								   Cargo 1:
								    </td> 
									 
									   <td> 
									    			    <?php
						$sql = "select idcargo,cargo from cargo";
						$res = mysqli_query($con,$sql)
						?> 
	  
							 <select name = "cargo1" placeholder="" class="form-control" id="cargo1" >
							<option  value = "0"> (Sin Especificar)</option>
							<?php						
								while ($reg = mysqli_fetch_array($res))
									{							
									?>
								<!--Aqui va el codigo html que queremos que se repita con el while-->
									<option value= "<?php echo $reg["idcargo"];?>"><?php echo $reg["cargo"];?></option>
									<?php
									}
										?>
								</select>	
										 </td> 
										  
										  </tr> 
										  
										      <tr> 
								 
								  <td> 
								   Cargo 2:
								    </td> 
									 
									   <td> 
									    			    <?php
						$sql = "select idcargo,cargo from cargo";
						$res = mysqli_query($con,$sql)
						?> 
	  
							 <select name = "cargo2" placeholder="" class="form-control" id="cargo2" >
							<option  value = "0"> (Sin Especificar)</option>
							<?php						
								while ($reg = mysqli_fetch_array($res))
									{							
									?>
								<!--Aqui va el codigo html que queremos que se repita con el while-->
									<option value= "<?php echo $reg["idcargo"];?>"><?php echo $reg["cargo"];?></option>
									<?php
									}
										?>
								</select>	
										 </td> 
										  
										  </tr> 
										  
										  		      <tr> 
								 
								  <td> 
								   Cargo 3:
								    </td> 
									 
									   <td> 
									    			    <?php
						$sql = "select idcargo,cargo from cargo";
						$res = mysqli_query($con,$sql)
						?> 
	  
							 <select name = "cargo3" placeholder="" class="form-control" id="cargo3" >
							<option  value = "0"> (Sin Especificar)</option>
							<?php						
								while ($reg = mysqli_fetch_array($res))
									{							
									?>
								<!--Aqui va el codigo html que queremos que se repita con el while-->
									<option value= "<?php echo $reg["idcargo"];?>"><?php echo $reg["cargo"];?></option>
									<?php
									}
										?>
								</select>	
										 </td> 
										  
										  </tr> 
										   <tr> 
										    
											 <td> 
											  Privilegios:
											   </td> 
											    
												  <td> 
												       
                                       
							    <?php
						$sql = "select idtipousuario,tipousuario from tipousuario";
						$res = mysqli_query($con,$sql)
						?> 
	  
							 <select name = "tipousuario" placeholder="Tipo de Usuario" class="form-control" id="tipousuario" >
							<option  value = "0"> (Sin Especificar)</option>
							<?php						
								while ($reg = mysqli_fetch_array($res))
									{							
									?>
								<!--Aqui va el codigo html que queremos que se repita con el while-->
									<option value= "<?php echo $reg["idtipousuario"];?>"><?php echo $reg["tipousuario"];?></option>
									<?php
									}
										?>
								</select>			   
												    </td> 
													 
													 </tr> 
										  
										  
									
										  
										  
							    </table> 
	 <button  type="button" align ="right"  value = "Ingresar"  title = "Ingresar"style="margin-left:80%" name="ingresar" class="btn btn-primary large" onclick="ValidaIngreso()">Ingresar</button>
					
					
					
					       
					
			
                            </form>     



                        </div>                     
                    </div>  
        </div>
        
    </div>
	  <?php require_once("footer/footer.php")  ?>
	
	
	