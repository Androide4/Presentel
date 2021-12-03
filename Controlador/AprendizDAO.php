<?php
class AprendizDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contraseña;
    private $ficha;
    private $estado;
    private $imagen;
    
    function AprendizDAO($id="", $imagen="", $nombre="", $apellido="", $correo="", $contraseña="",$estado="",$ficha=""){
        $this -> id = $id;
        $this -> imagen = $imagen;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> contraseña = $contraseña;
        $this -> estado = $estado;
        $this -> ficha = $ficha;
    }
    
    function autenticar(){
        return "select a.idAprendiz, a.estado
                from aprendiz a
                where a.correo = '" . $this -> correo . "' and a.contraseña = '" . md5($this->contraseña) . "'";
    }
    
    function consultar(){
        return "select *
                from aprendiz a
                where a.idAprendiz = '" . $this -> id . "'";
    }
    
    function existeCorreo(){
        return "select correo
                from aprendiz
                where correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "select *
                from aprendiz";
    }

    function consultarAprendiz($filtro){
        return "select idAprendiz, imagen, nombre, apellido, correo, a.estado
        from aprendiz as a INNER JOIN Ficha as f on a.Ficha=f.IdFicha where f.IdFicha = '" . $filtro ."' ";
    }

    function insertar(){
        return "insert into
                aprendiz(imagen, nombre, apellido, correo, contraseña, estado ,ficha)
                values('" . $this -> imagen . "','" . $this -> nombre . "','" . $this -> apellido . "'
                ,'" . $this -> correo . "','" . md5($this->contraseña) . "','" . $this -> estado . "'
                ,'" . $this -> ficha . "')";
    }




    
    function cambiarPerfil() {
        return "update aprendiz
                set nombre='". $this-> nombre . "'
                , apellido='" . $this-> apellido . "', correo='" . $this-> correo . "'
                where idAprendiz=" . $this->id . "";
    }


    function actualizarClave() {
        return "update aprendiz
                set contraseña='". md5($this -> contraseña) ."'
                where idAprendiz=" . $this->id . "";
    }

    function autenticarclave(){
       return "select * from aprendiz a where a.idAprendiz = " . $this -> id . " and a.contraseña = '" . md5($this->contraseña) . "'";
    }
  
    function cambiarima() {
        return "update aprendiz a
                set a.imagen = '" . $this -> imagen . "'
                where a.idAprendiz ='" . $this -> id . "'";
    }
    
}
?>