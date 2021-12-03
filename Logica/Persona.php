<?php

class Persona {
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $contraseña;
    
    function getId(){
        return $this -> id;
    }
    function getNombre(){
        return $this -> nombre;
    }
    
    function getApellido(){
        return $this -> apellido;
    }
    
    function getCorreo(){
        return $this -> correo;
    }
    
    function Persona($id="", $nombre="", $apellido="", $correo="", $contraseña=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> contraseña = $contraseña;
    }
} 
?>