<?php
  require 'modeloexcel.php';
  $modelo = new modeloexcel();

 $Numero = htmlspecialchars($_POST['n'],ENT_QUOTES,'UTF-8');
 $Tipo = htmlspecialchars($_POST['t'],ENT_QUOTES,'UTF-8');
 $FechaIni = htmlspecialchars($_POST['fini'],ENT_QUOTES,'UTF-8');
 $FechaFin = htmlspecialchars($_POST['fnal'],ENT_QUOTES,'UTF-8');
 $Estado = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
 $Programa = htmlspecialchars($_POST['p'],ENT_QUOTES,'UTF-8');
 

//Cuando se encuentre con una coma lo separa y lo convierte en un arreglo 
 $array_numero = explode(",",$Numero);
 $array_tipo = explode(",",$Tipo);
 $array_fechaini = explode(",",$FechaIni);
 $array_fechafin = explode(",",$FechaFin); 
 $array_estado = explode(",",$Estado);
 $array_programa = explode(",",$Programa);

for($i = 0; $i < count($array_numero); $i++){
  
 $consulta = $modelo->RegistrarExcel($array_numero[$i],  $array_tipo[$i],  $array_fechaini[$i],  $array_fechafin[$i],  $array_estado[$i],  $array_programa[$i]);
}

echo $consulta;

?>