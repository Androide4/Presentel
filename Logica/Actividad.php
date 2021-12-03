<?php

require 'Controlador/ActividadDAO.php';

class Actividad {
    private $id;
    private $trimestre;
    private $nombre;
    private $conexion;
    private $ActividadDAO;
    
    function Actividad($id="", $trimestre="", $nombre=""){
        $this -> conexion = new Conexion();
        $this -> id = $id;
        $this -> trimestre = $trimestre;
        $this -> nombre = $nombre;
        $this -> ActividadDAO = new ActividadDAO($id, $trimestre, $nombre);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ActividadDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> trimestre = $registro[1];
        $this -> nombre = $registro[2];
        $this -> conexion -> cerrar();
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ActividadDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ActividadDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Actividad($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }
    function getId(){
        return $this -> id;
    }
    function getNombre(){
        return $this -> nombre;
    }
    function getTrimestre(){
        return $this -> trimestre;
    }

} 
?>