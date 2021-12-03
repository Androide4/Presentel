<?php
class FichaDAO {
    private $id;
    private $numeroficha;
    private $tipoficha;
    private $fechainicio;
    private $fechafin;
    private $estadoficha;
    private $idprograma;
    
    function FichaDAO($id="", $numeroficha="", $tipoficha="", $fechainicio="", $fechafin="", $estadoficha="", $idprograma=""){
        $this -> id = $id;
        $this -> numeroficha = $numeroficha;
        $this -> tipoficha = $tipoficha;
        $this -> fechainicio = $fechainicio;
        $this -> fechafin = $fechafin;
        $this -> estadoficha = $estadoficha;
        $this -> idprograma = $idprograma;
    }
    
    function insertar(){
        return "insert into
                ficha(Numero, Tipo, FechaIni, FechaFin, Estado, Programa)
                values('" . $this -> numeroficha . "','" . $this -> tipoficha . "',
                        '". $this -> fechainicio . "','" . $this -> fechafin . "',
                        '" . $this -> estadoficha . "','" . $this -> idprograma . "')";
    }

    
    
    function consultar(){
        return "select *
                from ficha f
                where f.idFicha = '" . $this -> id . "'";
    }

    function consultarFicha($id){
        return "select *
                from ficha f
                where f.idFicha = '" . $this -> id . "'";
    }


    function consultarTodos(){
        return "select IdFicha, Numero, Tipo, FechaIni, FechaFin, Estado, Programa
                from ficha";
    }
    
    function existeFicha(){
        return "select numero
                from ficha
                where numero = '" . $this -> numeroficha . "'";
    }

    function editar(){
        return "update ficha
                set Numero='".$this -> numeroficha."', Tipo='". $this -> tipoficha ."',
                 FechaIni='" . $this-> fechainicio . "', Estado='". $this -> estadoficha ."',
                 Programa='". $this -> idprograma ."'
                where IdFicha = '" .$this -> id . "'";
    }
    function Eliminar(){
        return "delete from ficha
                where IdFicha = '" . $this -> id . "'";
    }

    
}
?>