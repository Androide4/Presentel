<?php
class instructorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $imagen;
    private $estado;
    private $contraseña;
    
    function instructorDAO($id="", $imagen="", $nombre="", $apellido="", $correo="", $contraseña="", $estado="" ){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> contraseña = $contraseña;
        $this -> imagen = $imagen;
        $this -> estado = $estado;

    }
    
    function autenticar(){
        return "select i.idInstructor, i.estado
                from instructor i
                where i.correo = '" . $this -> correo . "' and i.contraseña = '" . md5($this->contraseña) . "'";
    }
    
    function consultar(){
        return "select *
                from instructor i
                where i.idInstructor = '" . $this -> id . "'";
    }
    
    function existeCorreo(){
        return "select correo
                from instructor
                where correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "select *
                from instructor";
    }

    function insertar(){
        return "insert into
                instructor(imagen, nombre, apellido, correo, contraseña, estado)
                values('" . $this -> imagen . "','" . $this -> nombre . "','" . $this -> apellido . "'
                ,'" . $this -> correo . "','" .  md5($this->contraseña). "' ,'" . $this -> estado . "')";
    }





    function cambiarPerfil() {
        return "update instructor
                set nombre='". $this-> nombre . "'
                , apellido='" . $this-> apellido . "', correo='" . $this-> correo . "'
                where idInstructor=" . $this->id . "";
    }


    function actualizarClave() {
        return "update instructor
                set contraseña='". md5($this -> contraseña) ."'
                where idInstructor=" . $this->id . "";
    }

    function autenticarclave(){
       return "select * from instructor a where a.idInstructor = " . $this -> id . " and a.contraseña = '" . md5($this->contraseña) . "'";
    }
  
    function cambiarima() {
        return "update instructor a
                set a.imagen = '" . $this -> imagen . "'
                where a.idInstructor ='" . $this -> id . "'";
    }
    
}
?>