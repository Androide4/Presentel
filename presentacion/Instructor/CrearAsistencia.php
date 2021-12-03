<?php
include 'presentacion/validacionInstructor.php';
include 'presentacion/Instructor/menuInstructor.php';

date_default_timezone_set('America/Bogota');

$filtro = $_GET['idFicha'];

$Aprendiz= new Aprendiz();
$Aprendices = $Aprendiz->consultarAprendiz($filtro);

$ficha= new ficha( $_GET['idFicha']);
$ficha -> consultar();
$filtro2 = $ficha -> getIdprograma();

$hoy = date("y-m-d");  

$cont=0;


if(isset($_POST['registrar'])){
    $asis = $_POST['asistencia'];
    foreach ($Aprendices as $a){
        $Asistencia=new asistencia("",$asis[$cont],$hoy, $a -> getId(),$_POST['programa'],$_SESSION['id'],$_GET['idFicha']);
        if($Asistencia -> existeAsistencia()){               
            $Asistencia -> editarAsistencia();    
        }else{
            $Asistencia -> insertar();
        }
        $cont = $cont + 1;
    }
    ?>
        <script>

            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro de asistencia éxitoso!',
            showConfirmButton: false,
            timer: 1500
            })
          </script>
        <?php
}


                                                 
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
					<div class="col-lg-8">
                    <div class="card shadow p-3 mb-5">
                            <div class="card">
                            <div class = " bg-white rounded text-orange text-center" >
                            <h3 style="font-family: 'Lobster', cursive;">Registrar Asistencia</h3>
                                <div class="card-header bg-white text-primary text-center" style="border-radius: 10px;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-6 ">
                                                    <h3 style="font-family: 'Lobster', cursive; color:orange;">Fecha</h3>
                                            <div class="customize-input float-left">
                                            <label class="custom-select-set form-control bg-white border-1 custom-shadow custom-radius" style="color:grey">
                                                <option Value=> <?php echo $hoy ?> </option>
                                            </label>
                                            </div>
                                            
                                        </div>

                                   </div>
                                   
                                   
                                   <form  method="post" action="index.php?pid=<?php echo base64_encode("presentacion/instructor/CrearAsistencia.php") ?>
                                   &idFicha=<?php echo $_GET['idFicha']?>">
                                        <div class="col-12">
                                           <div class="customize-input float-right" >
                                                    <div class="form-group " >
                                                    <h3 style="font-family: 'Lobster', cursive; color:orange;">Actividad</h3>
                                                        <select class="form-control  bg-white border-1 custom-shadow custom-radius" style="border-radius: 20px;"
                                                            name="programa" id="programa">
                                                            <?php
                                                            $Programa = new programa();
                                                            $asignacion = new Asigprograma();
                                                            $asignaciones = $asignacion -> consultarActividades($filtro2);
                                                            foreach ($asignaciones as $p){
                                                                echo "<option value='" . $p -> getActividad() . "'>" . $p -> getPrograma() ." - ". $p -> getActividad() . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div> 
                                                    </div>   
                                    </div>
                                    </div>
                             </div>
                             </div>
                             </div> 
                                    
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Identificacion</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Asistencia</th>
										

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($Aprendices as $a){
                                                echo "<tr class='text-center'>";
                                                echo "<td>" .$a -> getId() . "</td>";
                                                echo "<td>". $a -> getNombre() . "</td>";
                                                echo "<td>". $a -> getApellido() . "</td>";
                                                echo "<td>" 

                                                
                                                ?>
                                                <div class="form-group" Style="height: 4px; padding:0px;">
                                                <select class="form-control input-sm selectpicker" Style="height:30px;"
                                                name="asistencia[]">
                                                <?php   echo "<option value=". "Asistio" .">". "Asistio" ."</option>";
                                                        echo "<option value=". "Inasistio" .">". "Inasistio" ."</option>";
                                                        echo "<option value=". "Excusa" .">". "Excusa" ."</option>";
                                                        echo "<option value=". "Retardo" .">". "Retardo" ."</option>";
                                                 echo "</td>";
                                                 
                                                 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    
						                <div class="text-center">
                                        <button type="submit"  name="registrar" class="btn btn-warning  btn-block" style="border-radius: 25px;" > <font COLOR="white">Registrar</font></button>
					                	</div>
					                </form>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
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
  <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

<?php } ?>
