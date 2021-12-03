<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';


$hoy = date("20y-m-d");  
  $error=0;
  if(isset($_POST['registrar'])){
	$ruta = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	if($tipo == "image/png" || $tipo == "image/jpeg"){
		$rutaRemota = "img/". $ruta;
		$administrador = new Administrador("", "", "", $_POST['correo']);
		$coordinador = new Coordinador("","", "", "", $_POST['correo']);
		$aprendiz = new Aprendiz("", $rutaRemota, $_POST['nombre'], 
		$_POST['apellido'], $_POST['correo'], $_POST['contraseña'],1, $_POST['ficha']);
		$instructor = new instructor("", "","", "", $_POST['correo']);

    if (!$coordinador -> existeCorreo() && !$administrador -> existeCorreo()&&
	 !$instructor -> existeCorreo()&& !$aprendiz -> existeCorreo()){
		$aprendiz -> insertar();
    }else{
        $error = 2 ;
    }	
	}else{	
		$error = 1;
	}
  }
?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <br>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-white text-primary text-center">
				<h3 style="font-family: 'Lobster', cursive;">Registrar Aprendiz</h3>
       			 </div>
					<div  class = "shadow p-3 mb-5 bg-white rounded">
				<?php if (isset($_POST['registrar'])) { ?>
  					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
  						role="alert">
  						<?php if ($error==0) {
  						    echo "registro exitoso";
  						}else if($error == 1){
  						    echo "Solo archivos png o jpg";
  						} else{
                            echo  $_POST['correo'] . " ya existe"; 
                          }?>
  						<button type="button" class="close" data-dismiss="alert"
  							aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/registrarAprendiz.php") ?>"enctype="multipart/form-data">
						<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="nombre"
								class="form-control" placeholder="Ingrese Nombre"
								required="required">
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="apellido"
								class="form-control" placeholder="Ingrese Apellido"
								required="required">
						</div>
						<div class="form-group">
							<label>Correo</label> <input name="correo" type="correo"
								class="form-control" placeholder="Digite correo"
								required="required">
						</div>
						<div class="form-group">
							<label>Contraseña</label> <input name="contraseña" type="password"
								class="form-control" placeholder="Digite contraseña"
								required="required">
						</div>
			

						<div class="form-group">
							<label>Estado</label>
							<select class="form-control"
								name="estado">
								<option value= "1">Activo</option>
    							<option value= "0">Inactivo</option>
								?>
							</select>
						</div>

                        <div class="form-group">
							<label>Ficha</label>
							<select class="form-control"
								name="ficha" id="ficha">
								<?php
								$ficha = new Ficha();
								$fichas = $ficha -> consultarTodos();
								foreach ($fichas as $f){
								    echo "<option value='" . $f -> getId() . "'>" . $f -> getNumeroficha() ." - ". $f -> getTipoficha() . "</option>";
								}
								?>
							</select>
						</div>

                        <label>Imagen</label>
						<div class="custom-file">
						<input type="file" class="custom-file-input" name="imagen" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required="required">
						<label class="custom-file-label">Seleccione un archivo png o jpg</label>
                  		  </div>   
						<br>
						<br>
						<div class="text-center">
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>