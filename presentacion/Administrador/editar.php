<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';

$error = 0;
if(isset($_POST['editar'])){
    $administradorr= new Administrador($_SESSION['id'], $_POST['nombre'], $_POST['apellido'],"", $_POST['contraseña']);
    if($_POST['contrasen']==$_POST['clavenc']){
        if ( $administradorr -> autenticarclave()){
            $administrador = new Administrador($_SESSION['id'],"","","", $_POST['contrasen']);
            $administrador-> actualizarclave();

        }else{
            $error = 2;
        }
        }else{
            $error=1;
        }
    }
    $administrador = new Administrador($_SESSION['id']);
    $administrador->consultar();

?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <br>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-white text-primary text-center" style="border-radius: 10px;">
          <h4 style="font-family: 'Lobster', cursive;">Perfil</h4>
        </div>
				<div class="card-body">
                <?php if (isset($_POST['editar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php if ($error==0) {
						    echo "Cambio exitoso";
						}else if($error == 1){
						    echo "Las claves no coinciden";
						}else{
						    echo "Clave actual erronea";
						}?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>		


					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/Administrador/editar.php") ?>"enctype="multipart/form-data">
					<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="nombre"
								class="form-control"  value="<?php echo $administrador -> getNombre();?>"
								required="required" readonly>
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="apellido"
								class="form-control" value="<?php echo $administrador -> getApellido();?>"
								required="required" readonly>
						</div>
						<div class="form-group">
							<label>Correo</label> <input name="correo" type="correo"
								class="form-control" value="<?php echo $administrador -> getCorreo();?>"
								required="required" readonly>
						</div>
						<label>Cambio Contraseña</label>
						<div class="form-group">
							<input name="contraseña" type="password" class="form-control" placeholder="Digite Clave Actual" required="required">
						</div>
						<div class="form-group">
							<input name="contrasen" type="password" class="form-control" placeholder="Digite Clave Nueva" required="required">
						</div>
						<div class="form-group">
							<input name="clavenc" type="password" class="form-control" placeholder="Confirmar Clave" required="required">
						</div>
<br>
<br>
            <div class="text-center">
              <button type="submit" name="editar" class="btn btn-primary">Editar</button>
            </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

