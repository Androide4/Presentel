<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';
$error=0;
if(isset($_POST['registrar'])){
	$control = new control("", $_POST['ficha'], $_POST['instructor']);
	if(!$control -> existeControl()){
		$control -> insertar();
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
          <h3 style="font-family: 'Lobster', cursive;">Asignamiento de Fichas</h3>
        </div>
				<div  class = "shadow p-3 mb-5 bg-white rounded">
				<?php if (isset($_POST['registrar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Registro exitoso" : "Ya se le asigno esta ficha a el instructor"; ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/asignamientoInstructor.php") ?>">
					<div class="form-group">
							<label>Instructor</label>
							<select class="form-control"
								name="instructor" id="programa">
								<?php
								$Instructor = new Instructor();
								$Instructores = $Instructor -> consultarTodos();
								foreach ($Instructores as $i){
								    echo "<option value='" . $i -> getId() . "'>" . $i -> getNombre() ." - ". $i -> getApellido() . "</option>";
								}
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
						<div class="text-center">
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


