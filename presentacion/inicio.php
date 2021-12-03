<?php

  $correo = "";
  if (isset($_POST['correo'])) {
      $correo = $_POST['correo'];
  }
  $clave = "";
  if (isset($_POST['clave'])) {
      $clave = $_POST['clave'];
  }
  $error = 0;

  if(isset($_POST['ingresar'])){
    $administrador = new Administrador("", "", "", $correo, $clave);
    $coordinador = new Coordinador("","", "", "", $correo, $clave);
    $aprendiz = new Aprendiz("","", "", "", $correo, $clave);
    $instructor = new instructor("", "","", "", $correo, $clave);

    if ($administrador -> autenticar()) {
          if($administrador -> getEstado() == 1){
            $_SESSION['id'] = $administrador -> getId();
            $_SESSION['rol'] = "administrador";
            $pid = base64_encode("presentacion/sesionAdministrador.php");
            header('Location: index.php?pid='. $pid);
          }else{
                $error=2;
               } 
        }
          elseif ($coordinador -> autenticar()){
            if($coordinador -> getEstado() == 1){
              $_SESSION['id'] = $coordinador -> getId();
              $_SESSION['rol'] = "coordinador";
              $pid = base64_encode("presentacion/sesionCoordinador.php");
              header('Location: index.php?pid='. $pid);
            }else{
              $error=2;
                }

          }
                elseif ($aprendiz -> autenticar()){
                  if($aprendiz -> getEstado() == 1){
                    $_SESSION['id'] = $aprendiz -> getId();
                    $_SESSION['rol'] = "aprendiz";
                    $pid = base64_encode("presentacion/sesionAprendiz.php");
                    header('Location: index.php?pid='. $pid);
                  }else{
                    $error = 2;
                  }

              }
                      elseif ($instructor -> autenticar()){
                        if($instructor -> getEstado() == 1){
                          $_SESSION['id'] = $instructor -> getId();
                          $_SESSION['rol'] = "instructor";
                          $pid = base64_encode("presentacion/sesionInstructor.php");
                          header('Location: index.php?pid='. $pid);
                        }else{
                          $error=2;
                        }
                    }
                    else{
                      $error=1;
                    }
  }

?>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="Login/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Login/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="Login/css/style.css">
    <script type="text/javascript">
    $(function () {
    	  $('[data-toggle="tooltip"]').tooltip()
    	})
    </script>
</head>
<body style="background-color: #FFFFFF;">
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="Login/images/Telework-rafiki.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                  <a class="navbar-brand logo_h" href="index.html"><img src="Login/images/logo.png" alt=""></a>
                  <br>
                  <br>

              <h3>Iniciar Sesión</h3>
              <p class="mb-4"></p>
            </div>
            <?php if ($error == 1) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert"> Error de correo o clave
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <?php } else if ($error == 2) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert"> Usuario inhabilitado
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                   <?php } ?>
            <form class="" action="index.php?pid=<?php echo base64_encode("presentacion/inicio.php")?>" method="post">
              <div class="form-group first">
                <label for="username">Nombre Usuario</label>
                <input type="email" name="correo" class="form-control" id="correo" required="required" aria-describedby="emailHelp" >

              </div>
              <div class="form-group last mb-4">
                <label for="password">Contraseña</label>
                <input type="password" name="clave" class="form-control" id="clave" required="required" >
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Recuerdame</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Has olvidado tu contraseña</a></span> 
              </div>

              <input type="submit" name="ingresar" value="Iniciar Sesión" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; iniciar sesión con &mdash;</span>
              
              <div class="social-login">
                
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        <script src="Login/js/jquery-3.3.1.min.js"></script>
    <script src="Login/js/popper.min.js"></script>
    <script src="Login/js/bootstrap.min.js"></script>
    <script src="Login/js/main.js"></script>
      </div>
    </div>
  </div>
</body>

