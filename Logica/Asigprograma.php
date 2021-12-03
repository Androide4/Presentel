<?php

require 'Controlador/AsigprogramaDAO.php';


class Asigprograma{

       private $idAsignacion;
       private $programa;
       private $actividad;
       private $conexion;
       private $AsigprogramaDAO;

    function Asigprograma($idAsignacion="", $programa="", $actividad=""){
        $this -> idAsignacion = $idAsignacion;
        $this -> programa= $programa;
        $this -> actividad = $actividad;
        $this -> conexion = new Conexion();
        $this -> AsigprogramaDAO = new AsigprogramaDAO($idAsignacion, $programa, $actividad);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsigprogramaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> programa= $registro[1];
        $this -> actividad = $registro[2];
        $this -> conexion -> cerrar();
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsigprogramaDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsigprogramaDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asigprograma($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }

    function existeAsigprograma(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsigprogramaDAO -> existeAsigprograma());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function consultarActividades($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsigprogramaDAO -> consultarActividades($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Asigprograma($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }

    function consultarActividades2($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> AsigprogramaDAO -> consultarActividades2($filtro));
        $registro = $this -> conexion -> extraer();
        $this -> idAsignacion= $registro[0];
        $this -> programa= $registro[1];
        $this -> actividad = $registro[2];
        $this -> conexion -> cerrar();
    }

    function getIdAsignacion(){
        return $this -> idAsignacion;
    }
    function getPrograma(){
        return $this -> programa;
    }
    function getActividad(){
        return $this -> actividad;
    }
    
    
} 

?>