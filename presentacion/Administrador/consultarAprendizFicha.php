<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/Administrador/menuAdministrador.php';

$filtro = $_GET['idFicha'];
$Aprendiz= new Aprendiz();
$Aprendices = $Aprendiz->consultarAprendiz($filtro);
if(count($Aprendices)>0){
    ?>
    <br>
	<br>
	<br>
	<br>
	<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-3"></div>
					<div class="col-8">
                        <div class="card">
						<div class="card-header bg-white text-primary text-center" style="border-radius: 10px;">
						
						
							<h3 style="font-family: 'Lobster', cursive;">Aprendiz</h3>
							<br>
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Identificacion</th>
                                                <th scope="col">Imagen</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Estado</th>
										

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($Aprendices as $a){
                                                echo "<tr class='text-center'>";
                                                echo "<td>" .$a -> getId() . "</td>";
                                                echo "<td>" .$a -> getImagen() . "</td>";
                                                echo "<td>". $a -> getNombre() . "</td>";
                                                echo "<td>". $a -> getApellido() . "</td>";
                                                echo "<td>". $a -> getCorreo() . "</td>";
                                                echo "<td>". $a -> getEstado() . "</td>";
                                          
                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <?php } else { ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <br>
  <div class="container">
    <div class="row">
        <div class="col-3"></div>
		<div class="col-8">
      <div class="alert alert-danger alert-dismissible fade show"
      	role="alert">
      	No tiene aprendices.
      	<button type="button" class="close" data-dismiss="alert"
      		aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      	</button>
      </div>
    </div>
    </div>
  </div>

<?php } ?>
