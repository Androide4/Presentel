<?php
require 'Controlador/AsistenciaDAO.php';
class Asistencia{
    private $idAsistencia;
    private $tipoa;
    private $fecha;
    private $aprendiz;
    private $actividad;
    private $instructor;
    private $ficha;
    private $AsistenciaDAO;
    private $conexion;


    function Asistencia($idAsistencia="", $tipoa="", $fecha="", $aprendiz="", $actividad="", $instructor="", $ficha=""){
        $this -> idAsistencia = $idAsistencia;
        $this -> tipoa = $tipoa;
        $this -> fecha = $fecha;
        $this -> aprendiz = $aprendiz;
        $this -> actividad = $actividad;
        $this -> instructor = $instructor;
        $this -> ficha = $ficha;
        $this -> conexion = new Conexion();
        $this -> AsistenciaDAO = new AsistenciaDAO($idAsistencia, $tipoa, $fecha, $aprendiz, $actividad, $instructor, $ficha);
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    function editarAsistencia(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> editarAsistencia());
        $this -> conexion -> cerrar();
    }

    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idAsistencia = $registro[0];
        $this -> tipoa = $registro[1];
        $this -> fecha = $registro[2];
        $this -> aprendiz = $registro[3];
        $this -> actividad = $registro[4];
        $this -> instructor = $registro[5];
        $this -> ficha = $registro[6];
        $this -> conexion -> cerrar();
    }
    
    function existeAsistencia(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> existeAsistencia());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function consultarActividades($filtro, $filtro2){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultarActividades($filtro, $filtro2));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asistencia($registro[0]);
        }
        return $registros;
    }

    function consultarAprendiz($filtro4, $filtro, $filtro2, $filtro3){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultarAprendiz($filtro4, $filtro, $filtro2, $filtro3));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asistencia($registro[0],$registro[1],$registro[2],$registro[3],$registro[4]);
        }
        return $registros;
    }

    function consultarAprendiz2($filtro4,$filtro, $filtro2, $filtro3){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultarAprendiz2($filtro4,$filtro, $filtro2, $filtro3));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asistencia($registro[0],$registro[1],$registro[2],$registro[3],$registro[4]);
        }
        return $registros;
    }

    function consultarAprendiz3($filtro, $filtro2, $filtro3){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultarAprendiz3($filtro, $filtro2, $filtro3));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asistencia($registro[0],$registro[1],$registro[2],$registro[3],$registro[4]);
        }
        return $registros;
    }

    
    function consultarAprendiz4($filtro, $filtro2, $filtro3){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultarAprendiz4($filtro, $filtro2, $filtro3));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asistencia($registro[0],$registro[1],$registro[2],$registro[3],$registro[4]);
        }
        return $registros;
    }






    function consultarAsistencia($filtros1){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsistenciaDAO -> consultarAsistencia($filtros1));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asistencia($registro[0],$registro[1],$registro[2],"",$registro[3],$registro[4]);
        }
        return $registros;
    }



/*-----------------------------------------------------------------------------*/
    function Graficos(){
        $this-> conexion = new conexion();
        $this -> conexion -> abrir();
        $sql = "select tipoa, fecha, count(actividad) from asistencia where  actividad in
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








    function getIdAsistencia(){
        return $this -> idAsistencia;
    }

    function getTipoa(){
        return $this -> tipoa;
    }

    function getFecha(){
        return $this -> fecha;
    }

    function getAprendiz(){
        return $this -> aprendiz;
    }

    function getActividad(){
        return $this -> actividad;
    }


    function getInstructor(){
        return $this -> instructor;
    }

}
