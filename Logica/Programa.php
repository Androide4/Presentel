<?php

require 'Controlador/ProgramaDAO.php';

class Programa {
    private $id;
    private $Nombre;
    private $Version;
    private $conexion;
    private $ProgramaDAO;
    
    function Programa($id="", $Nombre="", $Version=""){
        $this -> conexion = new Conexion();
        $this -> id = $id;
        $this -> Nombre = $Nombre;
        $this -> Version = $Version;
        $this -> ProgramaDAO = new ProgramaDAO($id, $Nombre, $Version);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProgramaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> Nombre = $registro[1];
        $this -> Version = $registro[2];
        $this -> conexion -> cerrar();
    }


    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProgramaDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProgramaDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Programa($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }

    function existeFicha(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> fichaDAO -> existeFicha());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    function getId(){
        return $this -> id;
    }
    function getNombre(){
        return $this -> Nombre;
    }
    function getVersion(){
        return $this -> Version;
    }

} 
?>