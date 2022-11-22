<?php
    $server = "localhost";
    $user = "root";
    $pwd = "";

    $con = new PDO("mysql:host=$server; dbname=NeedPc", $user, $pwd);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    $con = null;
    ?>