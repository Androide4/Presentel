<?php

require 'Asistencia.php';

$MG = new Asistencia();
$consulta = $MG -> Graficos();
echo json_encode($consulta);

?>