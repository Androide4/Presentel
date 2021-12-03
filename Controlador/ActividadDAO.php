<?php
class ActividadDAO {
    private $id;
    private $trimestre;
    private $nombre;
    
    function ActividadDAO($id="", $trimestre="", $nombre=""){
        $this -> id = $id;
        $this -> trimestre = $trimestre;
        $this -> nombre = $nombre;
    }
    
    function insertar(){
        return "insert into
                actividad(trimestre, nombre)
                values('" . $this -> trimestre . "','" . $this -> nombre . "')";
    }
    
    function consultar(){
        return "select *
                from actividad a
                where a.idActividad = '" . $this -> id . "'";
    }

    function consultarTodos(){
        return "select *
                from actividad";
    }
    
}
?>