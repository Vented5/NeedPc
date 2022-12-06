<?php
    session_start();
    if(isset($_SESSION["email"])){
        session_destroy();
    echo ("La sesion se cerro con exito :D");
    header('Location: ../index.php');
} else {
    echo ("O la sesion sigue abierta o no se ha cerrado >:3");
    header('Location: ../index.php');
}

?>