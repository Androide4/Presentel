<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "coordinador"){
        $coordinador = new Coordinador($_SESSION['id']);
        $coordinador -> consultar();
        if($coordinador -> getEstado() == 0) {
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