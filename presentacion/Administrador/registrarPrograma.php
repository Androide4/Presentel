<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';
  $error=0;
  if(isset($_POST['registrar'])){
      $programa = new programa("", $_POST['nombre'], $_POST['version']);
      $programa -> insertar();
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
				<h3 style="font-family: 'Lobster', cursive;">Registrar Programa</h3>
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
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/registrarPrograma.php") ?>">
					<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="text"
								class="form-control" placeholder="Nombre Programa"
								required="required">
						</div>
						<div class="form-group">
							<label>Version</label> <input name="version" type="text"
								class="form-control"
								required="required" placeholder="Version Programa">
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

