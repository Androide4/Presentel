<?php
include 'presentacion/validacionCoordinador.php';
include 'presentacion/Coordinador/menuCoordi.php';


date_default_timezone_set('America/Bogota');

$cont=0;
$hoy = date("y-m-d");  
$filtro = $_GET['idActividad'];
$Asistencia= new Asistencia();
if(isset($_POST['Editar'])){
    $asis = $_POST['asistencia'];
    $Asistencias2= $Asistencia->consultarAprendiz2($_GET['date'], $filtro, $_GET['idInstructor'] ,$_GET["idFicha"]);
    foreach ($Asistencias2 as $a){
        $Asistencia=new asistencia("",$asis[$cont],$_GET['date'], $Asistencias2 [$cont] -> getAprendiz() ,$_GET['idActividad'],$_SESSION['id'],$_GET['idFicha']);   
        $_POST['date'] = $_GET['date'];          
        $Asistencia -> editarAsistencia();    
        $cont = $cont + 1;
      }

      ?>
      <script>

          Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Edicion satisfactoria!',
          showConfirmButton: false,
          timer: 1500
          });
        </script>
      <?php
   }
   $Asistencias = $Asistencia->consultarAprendiz($_POST['date'], $filtro, $_GET['idInstructor'], $_GET["idFicha"]);

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
                    <div class="col-3"></div>
					<div class="col-8">
                        <div class="card">
						<div class="card-header bg-white text-primary text-center" style="border-radius: 10px;">
                        <form  method="post" action="index.php?pid=<?php echo base64_encode("presentacion/coordinador/consultarfecha.php") ?>
                                   &idFicha=<?php echo $_GET['idFicha']?> &idActividad=<?php echo $_GET['idActividad']?>">
						<div class="row">
                                    <div class="col-10 ">
                                        <div class="form-inline mb-2">
                                            <label for="date">Date: &nbsp;</label>
                                            <input  v-model="date" name="date" id="date" type="date" class="form-control">
                                            <button @click="save" class="btn btn-primary ml-2">Buscar por Fecha</button>
                                        </div>
                                     </form>
                                </div>
                        </div>
							<h3 style="font-family: 'Lobster', cursive;">Aprendiz</h3>
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Actividad</th>
                                                <th scope="col">Aprendiz</th>
                                                <th scope="col">Tipo Asistencia</th>
										

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <form  method="post" action=">
                                   &idFicha=<?php echo $_GET['idFicha']?> &idInstructor=<?php echo $_GET['idInstructor']?> &idActividad=<?php echo $_GET['idActividad']?> &date=<?php echo $_POST['date']?>">
                                            <?php
                                            
                                            foreach ($Asistencias as $a){
                                                echo "<tr class='text-center'>";
                                                echo "<td>" .$a -> getFecha() . "</td>";
                                                echo "<td>" .$a -> getActividad() . "</td>";
                                                echo "<td>". $a -> getAprendiz() . "</td>";
                                                echo "<td>" .$a -> gettipoa() . "</td>";
                                                ?>
                                           
                                               <?php 
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <div class="mx-auto">
                                   
                                	</div>
					                </form>
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
      	No tiene Asistencias para este Dia.
      	<button type="button" class="close" data-dismiss="alert"
      		aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      	</button>
      </div>
    </div>
    </div>
  </div>

<?php } ?>
