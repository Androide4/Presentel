<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';

  $error=0;
  if(isset($_POST['registrar'])){
      $actividad = new Actividad("", $_POST['trimestre'], $_POST['nombre']);
      $actividad -> insertar();
  }

?>


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
				<h3 style="font-family: 'Lobster', cursive;">Registrar Actividad</h3>
       			 </div>
					<div  class = "shadow p-3 mb-5 bg-white rounded">
					<?php if (isset($_POST['registrar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/registrarActividad.php") ?>">
						<div class="form-group">
							<label>Trimestre</label>
							<select class="form-control"
								name="trimestre">
								<option>1</option>
    							<option>2</option>
      							<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Nombre Actividad</label> <input name="nombre" type="text"
								class="form-control"
								required="required" placeholder="Actividad">
						</div>
						<div class="text-center">
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

