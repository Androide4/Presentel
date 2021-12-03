<?php

require 'Controlador/FichaDAO.php';

class Ficha {
    private $id;
    private $numeroficha;
    private $tipoficha;
    private $fechainicio;
    private $fechafin;
    private $estadoficha;
    private $idprograma;
    private $conexion;
    private $fichaDAO;
    

    function Ficha($id="", $numeroficha="", $tipoficha="", $fechainicio="", $fechafin="", $estadoficha="", $idprograma=""){
        $this -> id = $id;
        $this -> numeroficha = $numeroficha;
        $this -> tipoficha = $tipoficha;
        $this -> fechainicio = $fechainicio;
        $this -> fechafin = $fechafin;
        $this -> estadoficha = $estadoficha;
        $this -> idprograma = $idprograma;
        $this -> conexion = new Conexion();
        $this -> fichaDAO = new fichaDAO($id, $numeroficha, $tipoficha, $fechainicio, $fechafin, $estadoficha, $idprograma);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> fichaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> numeroficha = $registro[1];
        $this -> tipoficha = $registro[2];
        $this -> fechainicio = $registro[3];
        $this -> fechafin = $registro[4];
        $this -> estadoficha = $registro[5];
        $this -> idprograma = $registro[6];
        $this -> conexion -> cerrar();
    }

    function consultarFicha($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> fichaDAO -> consultar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Ficha($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5], $registro[6]);
        }
        return $registros;
    }

    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> fichaDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> fichaDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Ficha($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5], $registro[6]);
        }
        return $registros;
    }

    function consultarTodo1(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> fichaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> numeroficha = $registro[1];
        $this -> tipoficha = $registro[2];
        $this -> fechainicio = $registro[3];
        $this -> fechafin = $registro[4];
        $this -> estadoficha = $registro[5];
        $programa = new programa($registro[6]);
        $programa -> consultar(); 
        $this -> idprograma = $programa;
        $this -> conexion -> cerrar();
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

    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> fichaDAO -> editar());
        $this -> conexion -> cerrar();
    }

    function Eliminar(){
        $this -> conexion -> abrir();
        $this -> conexion ->  ejecutar($this-> fichaDAO -> Eliminar());
        $this -> conexion -> cerrar();
    }

    function getId(){
        return $this -> id;
    }
    function getNumeroficha(){
        return $this -> numeroficha;
    }
    function getTipoficha(){
        return $this -> tipoficha;
    }
    
    function getFechainicio(){
        return $this -> fechainicio;
    }
    
    function getFechafin(){
        return $this -> fechafin;
    }
    
    function getEstadoficha(){
        return $this -> estadoficha;
    }
    
    function getIdprograma(){
        return $this -> idprograma;
    }
    
} 
?>