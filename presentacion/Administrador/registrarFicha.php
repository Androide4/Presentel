<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';

$hoy = date("20y-m-d");   
$error = 0;
if(isset($_POST['registrar'])){
	if( $hoy <= $_POST['fechai'] && $_POST['fechai'] < $_POST['fechaf']){
		if(  $_POST['fechai'] != $_POST['fechaf']){
			$ficha = new Ficha("", $_POST['numero'], $_POST['tipo'], $_POST['fechai'], $_POST['fechaf'], $_POST['estado'],$_POST['programa']);
		if (!$ficha -> existeFicha()){
			$ficha -> insertar();
		}else{
			$error = 1;
		}
		}
		
	}else{
		$error=2;
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
          <h3 style="font-family: 'Lobster', cursive;">Registrar Ficha</h3>
        </div>
				<div  class = "shadow p-3 mb-5 bg-white rounded">

					<?php if (isset($_POST['registrar'])) { ?>
  					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
  						role="alert">
  						<?php if ($error==0) {
  						    echo "Registro exitoso";
  						}else if($error == 1){
  						    echo "El numero ".$_POST['numero']." ya existe";
  						}else{
							echo "las fechas no corresponden"; 
						  } ?>
  						<button type="button" class="close" data-dismiss="alert"
  							aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/registrarFicha.php") ?>">
						<div class="form-group">
							<label>Numero</label> <input name="numero" type="text" 
								class="form-control" placeholder="Digite Ficha"
								required="required">
						</div>
						<div class="form-group">
							<label>Tipo</label>
							<select class="form-control"
								name="tipo">
								<option>Articulación</option>
    							<option>Especialización</option>
      							<option>Regular</option>
							</select>
						</div>
						<div class="form-group">
							<label>Fecha Inicio</label> <input name="fechai" type="date"
								class="form-control"
								required="required">
						</div>
						<div class="form-group">
							<label>Fecha Fin</label> <input name="fechaf" type="date"
								class="form-control"
								required="required">
						</div>
						<div class="form-group">
							<label>Estado</label>
							<select class="form-control"
								name="estado">
								<option>Activo</option>
    							<option>Inactivo</option>
								?>
							</select>
						</div>
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
						<div class="text-center">
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


