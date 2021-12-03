<?php
include 'presentacion/validacionInstructor.php';
include 'presentacion/Instructor/menuInstructor.php';


$filtro = $_GET['idFicha'];

$Aprendiz= new Aprendiz();
$Aprendices = $Aprendiz->consultarAprendiz($filtro);

$ficha= new ficha( $_GET['idFicha']);
$ficha -> consultar();
$filtro2 = $ficha -> getIdprograma();

$hoy = date("20y-m-d")  ;  
$cont=0;
$Asistencia = Array();

if(isset($_POST['registrar'])){
    foreach ($Aprendices as $a){
        $Asistencia=new asistencia("","",$hoy, $a -> getId(),$_POST['programa'],$_SESSION['id']);
        $Asistencia -> insertar();
    
}
 

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
                                    <div class="col-7">
                                        <div class="col-5 align-self-center">
                                                    <h3 style="font-family: 'Lobster', cursive; color:orange;">Fecha</h3>
                                            <div class="customize-input float-left">
                                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius" style="color:grey">
                                                <option Value=> <?php echo $hoy ?> </option>
                                            </select>
                                            </div>
                                        </div>
                                        
                                   </div>
                                   <form  method="post" action="index.php?pid=<?php echo base64_encode("presentacion/instructor/ConsultarAprendizFicha.php") ?>
                                   &idFicha=<?php echo $_GET['idFicha']?>">
                                        <div class="col-5">
                                           <div class="customize-input float-right position: absolute ">
                                                    <div class="form-group">
                                                    <h3 style="font-family: 'Lobster', cursive; color:orange;">Actividad</h3>
                                                        <select class="form-control"
                                                            name="programa" id="programa">
                                                            <?php
                                                            $Programa = new programa();
                                                            $asignacion = new Asigprograma();
                                                            $asignaciones = $asignacion -> consultarActividades($filtro2);
                                                            foreach ($asignaciones as $p){
                                                                echo "<option value='" . $p -> getIdAsignacion() . "'>" . $p -> getPrograma() ." - ". $p -> getActividad() . "</option>";
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
                                                <select class="form-control" Style="height:30px;"
                                                name="asistencia">
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
                                        <button type="submit" name="registrar"  class="btn btn-warning btn-lg btn-block" style="border-radius: 5px; " ><font COLOR="white">Registrar</font></button>
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

<?php } ?>
