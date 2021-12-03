<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "administrador"){
        $administrador = new administrador($_SESSION['id']);
        $administrador -> consultar();
         
    }else{
        $pid = base64_encode("presentacion/error.php");
        header('Location: index.php?pid='. $pid);
    }
}else{
    header('Location: index.php');
}
?>