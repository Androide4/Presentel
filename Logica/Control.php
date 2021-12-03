<?php

require 'Controlador/ControlDAO.php';
class Control{
    private $conexion;
    private $idControl;
    private $idFicha;
    private $idInstructor;
    private $ControlDAO;
    
    

    function Control($idControl="", $idFicha="", $idInstructor=""){
        $this -> idControl = $idControl;
        $this -> idFicha = $idFicha;
        $this -> idInstructor = $idInstructor;
        $this -> conexion = new Conexion();
        $this -> ControlDAO = new ControlDAO($idControl, $idFicha, $idInstructor);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> idFicha= $registro[1];
        $this -> idInstructor = $registro[2];
        $this -> conexion -> cerrar();
    }

    function consulta1($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> consulta1($filtro));
        $registro = $this -> conexion -> extraer();
        $this -> idFicha= $registro[1];
        $this -> idInstructor = $registro[2];
        $this -> conexion -> cerrar();
    }


    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Control($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }

    function existeControl(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> existeControl());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function consultarInstructor($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> consultarInstructor($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $this -> conexion -> cerrar();
            $registros[$i] = new Control($registro[0],$registro[1],$registro[2]);
        }
        return $registros;
    }

    function consultarFicha($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ControlDAO -> consultarFicha($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion ->  numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Control($registro[0],$registro[1],$registro[2]);
        }
        return $registros;
    }



    function getIdControl(){
        return $this -> idControl;
    }
    function getIdFicha(){
        return $this -> idFicha;
    }
    function getIdInstructor(){
        return $this -> idInstructor;
    }
    
    
} 

?>