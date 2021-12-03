<?php
class AdministradorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contraseña;
    private $estado;

    
    function AdministradorDAO($id="", $nombre="", $apellido="", $correo="", $contraseña="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> contraseña = $contraseña;
        $this -> estado = $estado;
        
    }
    
    function autenticar(){
        return  "select a.idAdministrador, a.estado
                  from administrador a
                  where a.correo = '" . $this -> correo . "' and a.contraseña = '" . md5($this->contraseña) . "'";
    }
    
    function consultar(){
        return "select *
                from administrador a
                where a.idAdministrador = '" . $this -> id . "'";
    }
    
    function existeCorreo(){
        return "select correo
                from administrador
                where correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "select idAdministrador, Nombre, Apellido, Tipodoc, Numerodoc, correo
                from administrador";
    }
    function cambiarEstado() {
        return "update administrador
                set estado='" . $this->estado . "'
                where idAdministrador ='" . $this->id . "'";
    }
    



    function cambiarPerfil() {
        return "update administrador
                set Nombre='". $this-> nombre . "'
                , Apellido='" . $this-> apellido . "', correo='" . $this-> correo . "'
                where idAdministrador=" . $this->id . "";
    }


    function actualizarClave() {
        return "update administrador
                set contraseña='". md5($this -> contraseña) ."'
                where idAdministrador=" . $this->id . "";
    }

    function autenticarclave(){
       return "select * from administrador a where a.idAdministrador = " . $this -> id . " and a.contraseña = '" . md5($this->contraseña) . "'";
    }
  
    

}
?>