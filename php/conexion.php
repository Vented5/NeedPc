<!--Establece la conexion-->
<?php
    //Variables de conexion
    $server = "localhost";
    $user = "root";
    $pwd = "";

    
    try{
        $con = new PDO("mysql:host=$server; dbname=NeedPc", $user, $pwd);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $error){
        echo "Su conexion ha fallado por: " . $error->getMessage();
    }
    
    
?>