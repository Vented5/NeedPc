<!-- recibe datos del register.html -->
<?php
    echo "Wenas este es el register.php<br>";
    if(isset($_POST['btn-register'])){
        
        ///// Inciar conexion con la base de datos //////////
        include("conexion.php"); 
        include("verify_user.php");

        //Recibir parametros del ususario
        $name = $_POST['user-name'];
        $email = $_POST['user-email'];
        $pwd = $_POST['user-pwd'];
        $pwd_confirm = $_POST['confirmPassword'];
        //Encriptacion de la contraseña
        $pwd_encrypted = pwd::hash($pwd); 

        if($pwd != $pwd_confirm){
            echo "Las contraseñas no coinciden";
            header('Location: ../pages/register.html');
        }
        echo $name;
        echo $email.$pwd.$pwd_confirm;

        //Resgisro del nuevo usuario
        $query = $con->prepare("INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)");
 
        $query->bindParam(1, $name, PDO::PARAM_STR, 25 );
        $query->bindParam(2, $email, PDO::PARAM_STR, 150);
        $query->bindParam(3, $pwd_encrypted, PDO::PARAM_STR, 64);

        $query->execute(); 
        //NOTA: La flechita a un lado de una variable indica que estas llamando un metodo de la clase de ese objeto/variable
    
        //Conexion de BD cerrada
        $conn = FALSE; 
        
        ECHO "Se insertaron los datos correctamente";
        //Redirige al usuario al inicio
        header('Location: ../pages/login.html');
        
    }        
?>
