

<?php
include 'presentacion/validacionInstructor.php';
include 'presentacion/Instructor/menuInstructor.php';


$asistencia= new asistencia();
$asistencias = $asistencia->consultarActividades($_SESSION['id'], $_GET["idFicha"]);


if(count($asistencias)>0){
    ?>
    <br>
	<br>
	<br>
	<br>
    <br>

        <div class="container">
            <div class="row">

    <?php 
        foreach ( $asistencias as $a){
          ?>
          <div class="col-sm-2 "></div>
                    <div class=" col-lg-2 col-md-5 col-sm-12">
                    <div class="card  bg-light " style = "width: 150%; lenght: 21rem" >
                        <div class="card">
                    <div class="card-body">
                                  <h5 class="card-title"><b><?php  echo $a -> getIdAsistencia() ?></b></h5>
                                  <br>
                                  <br>
                                  <br>
                                        <a class="btn btn-primary" style="color:white" 
                                        <?php echo "<a href='index.php?pid=" . base64_encode("presentacion/Instructor/consultarAprendizActividad.php") .
                                         "&idActividad=" . $a -> getIdAsistencia() . "&idFicha=" . $_GET["idFicha"] ."'" ?>>Consultar Aprendices </a>
                                   </div>
                              </div>
                       </div>
                </div>
          <?php
         }
       ?>
        <!-- CSS only -->
      </div> <!--container close div  -->
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
      	No tiene asistencias registradas.
      	<button type="button" class="close" data-dismiss="alert"
      		aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      	</button>
      </div>
    </div>
    </div>
  </div>

<?php } ?>