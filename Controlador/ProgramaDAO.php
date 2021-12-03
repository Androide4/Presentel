<?php
class ProgramaDAO {


    private $id;
    private $Nombre;
    private $Version;
    
    function ProgramaDAO($id="", $Nombre="", $Version=""){
        $this -> id = $id;
        $this -> Nombre = $Nombre;
        $this -> Version = $Version;
    }
    
    function insertar(){
        return "insert into
                programa(Nombre, Version)
                values('" . $this -> Nombre . "','" . $this -> Version . "')";
    }
    
    function consultar(){
        return "select p.idPrograma, p.Nombre, P.Version
                from programa as p
                where p.idPrograma = '" . $this -> id . "'";
    }

    function consultarTodos(){
        return "select p.idPrograma, p.Nombre, p.Version
                from programa as p";
    }

    
    
}
?>