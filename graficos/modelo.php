<?php
	class modelo{
		private $conexion;
		function __construct()
		{
			require_once('conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function datos(){
			$sql = "SELECT tipoa, fecha, count(actividad), ficha FROM asistencia where ficha and actividad in
			('cables','Programación Avanzada en Laravel','Conexiones','Seguimiento a Proyecto') group by tipoa; ";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
	}
?>