<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "aprendiz"){
        $aprendiz = new aprendiz($_SESSION['id']);
        $aprendiz -> consultar();
         
    }else{
        $pid = base64_encode("presentacion/error.php");
        header('Location: index.php?pid='. $pid);
    }
}else{
    header('Location: index.php');
}
?>