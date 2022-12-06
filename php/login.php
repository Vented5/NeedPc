<?php
    $email_login= $_POST["email-login"];
    $pwd_login= $_POST["pwd-login"];

    if(isset($_POST['btn-login'])){ //Evento de login

        include("conexion.php"); //Prende la BD
        include("verify_user.php");
       //// Consultar contraseña 
       
       $query = 'SELECT pwd FROM users WHERE email = "' . $email_login . '"';
       foreach ($con -> query($query) as $row) {
            $stored_pwd = $row['pwd']; 
       }

       //// Evaluar contraseña 
       if(pwd::verify($pwd_login, $stored_pwd)){
            echo "La contraseña es correcta";
            session_start();
            $_SESSION["email"] = $email_login;

               $query = 'SELECT * FROM users WHERE email LIKE "'.  $_SESSION["email"] .'"';
               foreach ($con->query($query) as $row){
                    $_SESSION["user_id"] = $row['id_user'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["user_image"] = $row['user_image'];
                    $_SESSION["created_at"] = $rew['created_at'];
               }
          if (!isset($_SESSION["user_image"])) {
               $_SESSION["user_image"] = "default-user-icon-8.jpg";
               
          }

            header('Location: ../index.php  ');
       } else {
            echo "La contreseña es incorrecta";
       }
       
        $conn = false; //cierra la coneccion

    }
     
?>