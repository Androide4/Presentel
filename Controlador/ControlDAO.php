<?php
 class ControlDAO{

   private $idControl;
   private $idFicha;
   private $idInstructor;

   function ControlDAO($idControl="", $idFicha="", $idInstructor=""){
    $this -> idControl = $idControl;
    $this -> idFicha = $idFicha;
    $this -> idInstructor = $idInstructor;
   }


   

function consultar(){
    return "select *
            from control i
            where i.idControl = '" . $this -> id . "'";
}


function existeControl(){
    return "select idFicha, idInstructor
            from control c
            where c.idFicha = '" . $this -> idFicha . "' and c.idInstructor = '" . $this -> idInstructor . "' ";
}

function consultarInstructor($filtro){
    return "select i.idInstructor, i.nombre, i.apellido
            from control as c inner join instructor as i on c.idInstructor = i.idInstructor 
            and c.idFicha = '" . $filtro ."'";
}
function consultarFicha($filtro){
    return "select f.numero, f.idFIcha, p.nombre from control as c inner join ficha as f on c.idFicha = f.idFicha 
            inner join programa as p on p.IdPrograma=f.Programa
             and c.idInstructor = '" . $filtro ."'";
}



function insertar(){
    return "insert into
            control(idFicha, idInstructor)
            values('" . $this -> idFicha . "','" . $this -> idInstructor . "')";
}

 }
?>