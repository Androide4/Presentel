<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "instructor"){
        $instructor = new instructor($_SESSION['id']);
        $instructor -> consultar();
         if($instructor -> getEstado() == 0) {
             header('Location: index.php');
         }
    }else{
        $pid = base64_encode("presentacion/error.php");
        header('Location: index.php?pid='. $pid);
    }
}else{
    header('Location: index.php');
}
?>