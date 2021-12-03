<?php

require 'Controlador/coordinadorDAO.php';

class coordinador extends Persona{
    private $conexion;
    private $imagen;
    private $estado;
    private $coordinadorDAO;
    
    function coordinador($id="", $imagen="", $nombre="", $apellido="", $correo="", $contraseña="" ,$estado="" ){
        $this -> Persona($id, $nombre, $apellido, $correo, $contraseña, $estado);
        $this -> imagen = $imagen;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> coordinadorDAO = new coordinadorDAO($id, $imagen, $nombre, $apellido, $correo, $contraseña, $estado);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();
            $this -> id = $registro[0];
            $this -> estado = $registro[1];
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }


    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> insertar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> imagen = $registro[1];
        $this -> nombre = $registro[2];
        $this -> apellido = $registro[3];
        $this -> correo = $registro[4];
        $this -> estado = $registro[6];
        $this -> conexion -> cerrar();
    }


    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new coordinador($registro[0], $registro[1], $registro[2], $registro[3],"",$registro[4]);
        }
        return $registros;
    }
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->administradorDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }








    function cambiarPerfil(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO-> cambiarPerfil());
        $this -> conexion -> cerrar();
    }

    function actualizarClave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> actualizarClave());
        $this -> conexion -> cerrar();
    }

    function autenticarclave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> coordinadorDAO -> autenticarclave());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();
            $this -> nombre = $registro[0];
            $this -> apellido = $registro[1];
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

/*----------------------------------------------------------------------------*/
    function cambiarima() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this-> coordinadorDAO -> cambiarima());
        $this -> conexion -> cerrar();
    }








    
    function getImagen(){
        return $this -> imagen;
    }
    function getEstado(){
        return $this -> estado;
    }
}
