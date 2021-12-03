<?php
require 'Controlador/AprendizDAO.php';
class Aprendiz extends persona{
    private $conexion;
    private $ficha;
    private $imagen;
    private $estado;
    private $aprendizDAO;


    function Aprendiz($id="", $imagen="", $nombre="", $apellido="", $correo="", $contraseña="", $estado="",$ficha=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $contraseña);
        $this -> ficha = $ficha;
        $this -> imagen = $imagen;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> aprendizDAO = new aprendizDAO($id, $imagen, $nombre, $apellido, $correo, $contraseña, $estado, $ficha);
    }
    
    


    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> aprendizDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> imagen = $registro[1];
        $this -> nombre = $registro[2];
        $this -> apellido = $registro[3];
        $this -> correo = $registro[4];
        $this -> estado = $registro[6];
        $this -> ficha = $registro[7];
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultarAprendiz($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO -> consultarAprendiz($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Aprendiz($registro[0], $registro[1], $registro[2], $registro[3],$registro[4],"",$registro[5]);
        }
        return $registros;
    }


    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->aprendizDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }



    function cambiarPerfil(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO-> cambiarPerfil());
        $this -> conexion -> cerrar();
    }

    function actualizarClave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO -> actualizarClave());
        $this -> conexion -> cerrar();
    }

    function autenticarclave(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> aprendizDAO -> autenticarclave());
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
        $this -> conexion -> ejecutar($this-> aprendizDAO -> cambiarima());
        $this -> conexion -> cerrar();
    }





    function getFicha(){
        return $this -> ficha;
    }

    function getImagen(){
        return $this -> imagen;
    }

    function getEstado(){
        return $this -> estado;
    }
}
