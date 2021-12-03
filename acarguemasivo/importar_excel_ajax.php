<?php
  if(is_array($_FILES['archivoexcel']) && count($_FILES['archivoexcel'])>0){
  	//llamamos a nuestra libreria
  	require_once 'PHPExcel/Classes/PHPExcel.php';

  	$tmpfname = $_FILES['archivoexcel']['tmp_name'];
//crear el excel para luego leerlo
  	$leerexcel = PHPExcel_IOFactory::createReaderForFile($tmpfname);
  
 //cargar excel
  $excelobj = $leerexcel->load($tmpfname);

  //cargar en que hojas trabajaremos
  $hoja = $excelobj ->getSheet(0);
  $filas = $hoja->getHighestRow();

  echo "<table id='tabla_ficha'  style='width:100%' table-layout:fixed>
  <thead>
     <tr bgcolor='oragen' style='color:#FFFFFF'>
		<td>Numero</td>
		<td>Tipo</td>
		<td>FechaIni </td>
		<td>FechaFin</td>
		<td>Estado</td>
		<td>Programa</td>
     </tr>
     </thead><tbody id='tbody_tabla_ficha'>";
   
     for($row = 2;  $row<=$filas;  $row++){
     	$Numero = $hoja ->getCell('A'.$row)->getValue();
		 
     	$Tipo = $hoja ->getCell('B'.$row)->getValue();
     	$FechaIni = $hoja ->getCell('C'.$row)->getFormattedValue();
     	$FechaFin = $hoja ->getCell('D'.$row)->getFormattedValue();
     	$Estado = $hoja ->getCell('E'.$row)->getValue();
     	$Programa = $hoja ->getCell('F'.$row)->getValue();
		 if($Numero==""){

		 }else{
     	echo "<tr>";
     	echo "<td>".$Numero."</td>";
     	echo "<td>".$Tipo ."</td>";
     	echo "<td>".$FechaIni."</td>";
     	echo "<td>".$FechaFin."</td>";
     	echo "<td>".$Estado."</td>";
     	echo "<td>".$Programa."</td>";
     	echo "</tr>";
		 }
     }
     echo "</tbody></table>";
}
?>