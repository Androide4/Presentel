<?php
include 'presentacion/validacionAprendiz.php';
include 'presentacion/Aprendiz/menuAprendiz.php';

$filtros1 = $_GET['idAsistencia'];
$Asistencia= new Asistencia();
$Asistencias = $Asistencia->consultarAsistencia($_SESSION['id'],$filtros1 );
if(count($Asistencias)>0){

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
                                                background: linear-gradient(to right, #F87800, #FBBF50);
                                                color:white;
                                            }
                                        </style>  
							<h3 style="font-family: 'Lobster', cursive;">Consultas</h3>
							<br>
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Identificacion</th>
                                                <th scope="col">Tipo Asistencia</th>
                                                <th scope="col">Fecha Registro</th>
                                                <th scope="col">Tematica</th>
                                                <th scope="col">Nombre</th>
                                                
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($Asistencias as $a){
                                                echo "<tr class='text-center'>";
                                                echo "<td>" .$a -> getidAsistencia() . "</td>";
                                                echo "<td>" .$a -> gettipoa() . "</td>";
                                                echo "<td>". $a -> getFecha() . "</td>";
                                                echo "<td>". $a -> getActividad() . "</td>";
                                                echo "<td>". $a -> getinstructor() . "</td>";
                                       

                                          
                                                
                                            }
                                            ?>
                                        </tbody>
                                       
                                    </table>
                                
                                </div>
                                <br><br>
                                <a href="excel.php" class="btn-small blue">Descargar Excel</a>

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
    <?php }else { ?>
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
      	No tiene Asistencias registradas.
      	<button type="button" class="close" data-dismiss="alert"
      		aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      	</button>
      </div>
    </div>
    </div>
  </div>

<?php } ?>

