<?php
class AsistenciaDAO {
    private $idAsistencia;
    private $tipoa;
    private $fecha;
    private $aprendiz;
    private $actividad;
    private $ficha;
    private $instructor;
   
    
    function AsistenciaDAO($idAsistencia="", $tipoa="", $fecha="", $aprendiz="", $actividad="", $instructor="", $ficha=""){
        $this -> idAsistencia = $idAsistencia;
        $this -> tipoa = $tipoa;
        $this -> fecha = $fecha;
        $this -> aprendiz = $aprendiz;
        $this -> actividad = $actividad;
        $this -> instructor = $instructor;
        $this -> ficha = $ficha;
      
    }
 
    
    function consultar(){
        return "select *
                from asistencia a
                where a.idAsistencia = '" . $this -> idAsistencia. "'";
    }

    function consultarActividades($filtro, $filtro2){
        return "select actividad from asistencia where instructor='" . $filtro . "'
        and  ficha= '" . $filtro2 . "' GROUP BY  actividad";
    }

    function consultarAprendiz($filtro4, $filtro, $filtro2, $filtro3){
        return "select s.idAsistencia, s.tipoa, s.fecha, a.nombre, s.actividad 
                from asistencia as s inner join aprendiz as a on s.aprendiz=a.idAprendiz
                where instructor='" . $filtro2 . "' and  actividad= '" . $filtro . "' and  s.ficha= '" . $filtro3 . "'
                and  s.fecha= '" . $filtro4 . "'";
    }

    function consultarAprendiz2($filtro4, $filtro, $filtro2, $filtro3){
        return "select s.idAsistencia, s.tipoa, s.fecha, s.aprendiz , s.actividad 
                from asistencia as s inner join aprendiz as a on s.aprendiz=a.idAprendiz
                where instructor='" . $filtro2 . "' and  actividad= '" . $filtro . "' and  s.ficha= '" . $filtro3 . "' 
                and  s.fecha= '" . $filtro4 . "'";
    }

    function consultarAprendiz3($filtro, $filtro2, $filtro3){
        return "select s.idAsistencia, s.tipoa, s.fecha, a.nombre , s.actividad 
                from asistencia as s inner join aprendiz as a on s.aprendiz=a.idAprendiz
                where instructor='" . $filtro2 . "' and  actividad= '" . $filtro . "' and  s.ficha= '" . $filtro3 . "'";
    }

    function consultarAprendiz4($filtro, $filtro2, $filtro3){
       return "select s.idAsistencia, s.tipoa, s.fecha, a.nombre , s.actividad 
                from asistencia as s inner join aprendiz as a on s.aprendiz=a.idAprendiz
                where instructor='" . $filtro2 . "' and  actividad= '" . $filtro. "' and  s.ficha= '" . $filtro3 . "'";
    }





    function consultarAsistencia($filtros1){
        return "select t.idAsistencia,  t.tipoa,  t.fecha,  t.actividad, i.Nombre, i.Apellido from asistencia as t  inner join instructor
        as i  on t.instructor=i.idInstructor inner join aprendiz as a on t.aprendiz
       =a.idAprendiz where a.idAprendiz  = '" . $filtros1 . "'  order by t.idAsistencia DESC";
    }
    






    function existeAsistencia(){
        return "select fecha, aprendiz, actividad, ficha
                from asistencia
                where  fecha= '" . $this -> fecha . "'   and  aprendiz= '" . $this -> aprendiz . "'
                and  actividad= '" . $this -> actividad . "' and  ficha= '" . $this -> ficha . "'" ;
    }
    
    function consultarTodos(){
        return "select *
                from asistencia";
    }



    function insertar(){
        return "insert into
                asistencia(tipoa, fecha, aprendiz, actividad, instructor, ficha )
                values('" . $this -> tipoa . "','" . $this -> fecha . "'
                ,'" . $this -> aprendiz . "','" . $this -> actividad . "','" . $this -> instructor . "','" . $this -> ficha . "')";
    }


    function editarAsistencia(){
        return  "update Asistencia 
                set tipoa='".$this -> tipoa."'
                where fecha = '" .$this -> fecha . "' and aprendiz='" . $this -> aprendiz . "' and actividad='" . $this -> actividad . "'";
    }
    
}

        function Graficos(){
            return "select tipoa, fecha, count(actividad) from asistencia where  actividad in
            ('cables','Programación Avanzada en Laravel','Conexiones','Seguimiento a Proyecto') group by tipoa";
        }
?>