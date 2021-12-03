<?php

require 'modelo.php';

$MG = new modelo();
$consulta = $MG -> datos();
 echo json_encode($consulta);

?>