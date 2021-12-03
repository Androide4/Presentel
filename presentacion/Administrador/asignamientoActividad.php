<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';
$error=0;
if(isset($_POST['registrar'])){
	$Asigprograma = new Asigprograma("", $_POST['programa'], $_POST['actividad']);
	if(!$Asigprograma -> existeAsigprograma()){
		$Asigprograma -> insertar();
	}
	else{
		$error=1;
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
          <h3 style="font-family: 'Lobster', cursive;">Asignamiento de Actividades</h3>
        </div>
				<div  class = "shadow p-3 mb-5 bg-white rounded">
				<?php if (isset($_POST['registrar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Registro exitoso" : "Ya existe esta actividad en este programa"; ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/asignamientoActividad.php") ?>">
					<div class="form-group">
							<label>Programa</label>
							<select class="form-control"
								name="programa" id="programa">
								<?php
								$programa = new Programa();
								$programas = $programa -> consultarTodos();
								foreach ($programas as $p){
								    echo "<option value='" . $p -> getId() . "'>" . $p -> getNombre() ." - ". $p -> getVersion() . "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Actividad</label>
							<select class="form-control"
								name="actividad" id="actividad">
								<?php
								$actividad = new actividad();
								$actividades = $actividad -> consultarTodos();
								foreach ($actividades as $a){
								    echo "<option value='" . $a -> getId() . "'>" . $a -> getNombre() ." - ". $a -> getTrimestre() . "</option>";
								}
								?>
							</select>
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


