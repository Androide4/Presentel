<?php

class modeloexcel{
    private $conexion;
    function  __construct(){
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
	}
        function RegistrarExcel($Numero,$Tipo,$FechaIni ,$FechaFin ,$Estado ,$Programa){
			$sql = "call PA_REGISTRAR_FICHA_EXCEL('$Numero','$Tipo','$FechaIni','$FechaFin','$Estado','$Programa')";
			echo $sql;
			if ($resultado = $this->conexion->conexion->query($sql)){
				$id_retornado = mysqli_insert_id($this->conexion->conexion);
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->Cerrar_Conexion();
		}
    }

?>



