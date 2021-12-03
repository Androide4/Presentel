<?php

	session_start();
	require 'logica/Administrador.php';
	require 'logica/instructor.php';
	require 'logica/Ficha.php';
	require 'logica/Programa.php';
	require 'logica/Aprendiz.php';
	require 'Logica/Coordinador.php';
	require 'logica/Actividad.php';
	require 'logica/Asigprograma.php';
	require 'logica/Asistencia.php';
	require 'logica/Control.php';

	require 'Controlador/Conexion.php';

?>
<html>

<head>
<link rel="icon" type="image/png" sizes="16x16" href="Vista/Administrador/assets/images/favicon.png">
</head>


<body style="background-color: #FFFFFF;">
	<?php
	if(isset($_GET['pid'])){
	    include base64_decode($_GET['pid']);
	}else{
	    if(isset($_GET['salir'])){
	        $_SESSION['id']=null;
	        $_SESSION['rol']=null;
	    }
	    // include 'presentacion/encabezado.php';
	    include 'presentacion/inicio.php';
	}
	?>
</body>
</html>
