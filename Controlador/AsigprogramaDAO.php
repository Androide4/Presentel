<?php


 class AsigprogramaDAO{

   private $idAsignacion;
   private $programa;
   private $actividad;

   function AsigprogramaDAO($idAsignacion="", $programa="", $actividad=""){
    $this -> idAsignacion = $idAsignacion;
    $this -> programa = $programa;
    $this -> actividad = $actividad;
   }

function consultar(){
    return "select *
            from asignacion_programa i
            where i.idAsignacion = '" . $this -> idAsignacion . "'";
}


function consultarTodos(){
    return "select idAdministrador, Nombre, Apellido, Tipodoc, Numerodoc, correo
            from administrador";
}

function existeAsigprograma(){
    return "select programa, actividad
            from asignacion_programa
            where programa = '" . $this -> programa . "' and actividad = '" . $this -> actividad . "' ";
}


function consultarActividades($filtro){
    return "select IdActividad, trimestre, nombre from actividad as a 
           inner join asignacion_programa as p on a.IdActividad=p.actividad 
           where p.programa = '" . $filtro ."'";
}

function consultarActividades2($filtro){
    return "select IdActividad, trimestre, nombre from actividad as a 
           inner join asignacion_programa as p on a.IdActividad=p.actividad 
           where p.programa = '" . $filtro ."'";
}



function insertar(){
    return "insert into
             asignacion_programa(programa, actividad)
            values('" . $this -> programa . "','" . $this -> actividad . "')";
}

 }
?>