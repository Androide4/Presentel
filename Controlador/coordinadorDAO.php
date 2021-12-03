<?php
class coordinadorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contraseña;
    private $imagen;
    private $estado;
    
    function coordinadorDAO($id="",$imagen="", $nombre="", $apellido="", $correo="", $contraseña="", $estado=""){
        $this -> id = $id;
        $this -> imagen = $imagen;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> contraseña = $contraseña;
        $this -> estado = $estado;
    }
    
    function autenticar(){
        return "select c.idcoordinador, c.estado
                from coordinador c
                where c.correo = '" . $this -> correo . "' and c.contraseña = '" . md5($this->contraseña) . "'";
    }
    
    function consultar(){
        return "select * from coordinador c where c.idcoordinador = '" . $this -> id . "'";
    }
    
    
    function consultarTodos(){
        return "select *
                from coordiandor";
    }

    function insertar(){
        return "insert into
                coordinador(imagen, nombre, apellido, correo, contraseña,estado)
                values('" . $this -> imagen . "','" . $this -> nombre . "','" . $this -> apellido . "'
                ,'" . $this -> correo . "','" . md5($this->contraseña). "','" . $this -> estado . "')";
    }

    function existeCorreo(){
        return "select correo
                from coordinador
                where correo = '" . $this -> correo . "'";
    }




    function cambiarPerfil() {
        return "update coordinador
                set nombre='". $this-> nombre . "'
                , apellido='" . $this-> apellido . "', correo='" . $this-> correo . "'
                where idcoordinador=" . $this->id . "";
    }


    function actualizarClave() {
        return "update coordinador
                set contraseña='". md5($this -> contraseña) ."'
                where idcoordinador=" . $this->id . "";
    }

    function autenticarclave(){
       return "select * from coordinador a where a.idcoordinador = " . $this -> id . " and a.contraseña = '" . md5($this->contraseña) . "'";
    }
  
    function cambiarima() {
        return "update coordinador a
                set a.imagen = '" . $this -> imagen . "'
                where a.idcoordinador ='" . $this -> id . "'";
    }
    
    
}
?>