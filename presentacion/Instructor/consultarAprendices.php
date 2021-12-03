<?php
include 'presentacion/validacionInstructor.php';
include 'presentacion/Instructor/menuInstructor.php';


$Ficha= new Ficha();
$Fichas = $Ficha->consultarTodos();


if(count($Fichas)>0){
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
                    <div class="col-2"></div>
					<div class="col-10">
                        <div class="card">
						<div class="card-header bg-white text-primary text-center" style="border-radius: 10px;">
						
                        <style>
                                            table.dataTable thead {
                                                background: linear-gradient(to right, #8853DF, #2D63E8);
                                                color:white;
                                            }
                                        </style>  
							<h3 style="font-family: 'Lobster', cursive;">Fichas</h3>
							<br>
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Identificacion</th>
                                                <th scope="col">Numero Ficha</th>
                                                <th scope="col">Tipo Ficha</th>
                                                <th scope="col">Fecha Inicio</th>
                                                <th scope="col">Fecha Final</th>
                                                <th scope="col">Estado Ficha</th>
												<th scope="col">Acciones</th>
                                                <th scope="col">Opciones</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($Fichas as $f){
                                                echo "<tr class='text-center'>";
                                                echo "<td>" .$f -> getId() . "</td>";
                                                echo "<td>" .$f -> getNumeroficha() . "</td>";
                                                echo "<td>". $f -> getTipoficha() . "</td>";
                                                echo "<td>". $f -> getFechainicio() . "</td>";
                                                echo "<td>". $f -> getFechafin() . "</td>";
                                                echo "<td>". $f -> getEstadoficha() . "</td>";
                                                echo "<td>";
                                                echo "<a href='index.php?pid=" . base64_encode("presentacion/Administrador/consultarInstructorFicha.php") . "&idFicha=" . $f -> getId() . "'>";
                                                echo "<div  class='fas fa-chalkboard-teacher' style='color: black' data-toggle='tooltip' data-placement='left' title='Ver Instructores'></div>\n";

												echo "<a href='index.php?pid=" . base64_encode("presentacion/Administrador/consultarAprendizFicha.php") . "&idFicha=" . $f -> getId() . "'>";
                                                echo "<div  class='fas fa-user-graduate' style='color: black'  data-toggle='tooltip' data-placement='left' title='Ver Aprendices'></div>\n";
												
												echo "<a href='index.php?pid=" . base64_encode("presentacion/Administrador/consultarActividadFicha.php") . "&idPrograma=" . $f -> getIdprograma() . "'>";
                                                echo "<div  class='fas fa-tasks' style='color: black' data-toggle='tooltip' data-placement='left' title='Ver Actividades'></div>";
                                                echo "</td>";
                                                echo "<td>";
                                                echo "<a href='index.php?pid=" . base64_encode("presentacion/Administrador/editarFicha.php") . "&idEditar=" . $f -> getId() . "'>";
                                                echo "<div  class='fas fa-cog' style='color: #FFBD5D' data-toggle='tooltip' data-placement='left' title='Editar'></div>\n";
                                                echo "\n<a href='index.php?pid=" . base64_encode("presentacion/Administrador/EliminarFicha.php") . "&idEliminar=" . $f -> getId() . "'>";
                                                echo "<div  class='fas fa-trash-alt' style='color: #FF6964' data-toggle='tooltip' data-placement='left' title='Eliminar'></div>\n";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                
                                </div>
                            </div>
                            <script src="Vista/Administrador/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
                            <script src="Vista/Administrador/dist/js/pages/datatable/datatable-basic.init.js"></script>
<!-- CSS only -->
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
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
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
  <div class="container">
    <div class="row">
      <div class="alert alert-danger alert-dismissible fade show"
      	role="alert">
      	No tiene asistencias registradas.
      	<button type="button" class="close" data-dismiss="alert"
      		aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      	</button>
      </div>
    </div>
  </div>

<?php } ?>


