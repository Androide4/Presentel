<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';

$ficha = new ficha($_GET['idEditar']);
$error = 0;
$hoy = date("20y-m-d"); 

if(isset($_POST['editar'])){
	$ficha = new Ficha( $_GET['idEditar'], $_POST['numero'], $_POST['tipo'], $_POST['fechai'], $_POST['fechaf'], $_POST['estado'],$_POST['programa']);
	if( $hoy <= $_POST['fechai'] && $_POST['fechai'] < $_POST['fechaf']){
		if(  $_POST['fechai'] != $_POST['fechaf']){
			$ficha -> consultar();
			if ($ficha -> getNumeroficha()== $_POST['numero']){
				$ficha -> editar();
				header("Location: index.php?pid=" . base64_encode("presentacion/Administrador/editarFicha.php") . "&idEditar=" . $ficha -> getId());
			}else if(!$ficha -> existeFicha()){		
				$ficha -> editar();
				header("Location: index.php?pid=" . base64_encode("presentacion/Administrador/editarFicha.php") . "&idEditar=" . $ficha -> getId());

			}else{
				$error = 1;
			}
		}
	}else{
		$error=2;
	}
}

$ficha->consultarTodo1();

?>
<br>
<br>
<br>
<div class="container">
  <br>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-white text-primary text-center" style="border-radius: 10px;">
          <h4 style="font-family: 'Lobster', cursive;">Editar Ficha</h4>
     		   </div>
				<div class="card-body">
				<?php if (isset($_POST['editar'])) { ?>
  					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
  						role="alert">
  						<?php if ($error==0) {
						echo "Registro Exitoso";
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
					  
					<form method="post">
					<div class="form-group">
							<label>Numero</label> <input name="numero" type="text" 
								class="form-control" placeholder="Digite Ficha"
								required="required" value="<?php echo $ficha-> getNumeroficha();?>">
						</div>
						<div class="form-group">
							<label>Tipo</label>
							<select class="form-control"
								name="tipo" value="<?php echo $ficha-> getTipoficha();?>">
								<option>Articulación</option>
    							<option>Especialización</option>
      							<option>Regular</option>
							</select>
						</div>
						<div class="form-group">
							<label>Fecha Inicio</label> <input name="fechai" type="date"
								class="form-control"
								required="required" value="<?php echo $ficha-> getFechainicio();?>">
						</div>
						<div class="form-group">
							<label>Fecha Fin</label> <input name="fechaf" type="date"
								class="form-control"
								required="required" value="<?php echo $ficha-> getFechafin();?>">
						</div>
						<div class="form-group">
							<label>Estado</label>
							<select class="form-control"
								name="estado">
								<?php echo "<option value=". $ficha -> getEstadoficha() ." >". $ficha -> getEstadoficha() ."</option>";
								for( $i=0 ; $i<1; $i++){
									if($ficha -> getEstadoficha() == "Activo"){
										echo "<option value=". "Inactivo" .">". "Inactivo" ."</option>";
									}else{
										echo "<option value=". "Activo" .">". "Activo" ."</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
						<label>Programa</label>
						<select class="custom-select" name="programa" style="color:grey">
								
								<?php
									echo "<option value=". $ficha -> getIdprograma() -> getId() ." >". $ficha -> getIdprograma() -> getNombre() ."</option>";
									$programa = new programa();
									$programas = $programa -> consultarTodos();
									foreach($programas as $p){
										if($ficha -> getIdprograma() -> getId() != $p -> getId()){
											echo "<option value=". $p -> getId() .">". $p -> getNombre() ."</option>";
										}
									}  
								
								?>
						</select>
						</div>

						<div class="text-center">
						<button type="submit" name="editar" class="btn btn-primary" style="width:100% ;height:50px; border-radius: 10px;">Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
