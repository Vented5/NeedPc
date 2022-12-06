<?php
session_start();
//Recibe nueva imagen de usuarui
$file = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$newDirectory = "images/";

$fileLocation = $newDirectory . $fileName;

move_uploaded_file($file, "../".$fileLocation); //La almacena en la carpeta images

if ($_FILES['file']['error'] == 0) {
    require("conexion.php");
    $query = 'UPDATE users SET user_image = "' . $fileName . '" WHERE email LIKE "'.$_SESSION["email"].'"';
    $con->query($query);
    $_SESSION["user_image"] = $fileName;
    echo ("Imagen actualizada con exito :D");
}

if ($_POST['ch-username']) {
    require("conexion.php");
    $query = 'UPDATE users SET username = "' . $_POST['ch-username'] . '" WHERE email LIKE "' . $_SESSION["email"] . '"';
    $con->query($query);
    $_SESSION["username"] = $_POST['ch-username'];
}

if ($_POST['ch-user-pwd']) {
    require("conexion.php");
    include("verify_user.php");
    $pwdEncrypted = pwd::hash($_POST['ch-user-pwd']);
    $query = 'UPDATE users SET pwd = "' . $pwdEncrypted . '" WHERE email LIKE "' . $_SESSION["email"] . '"';
    $con->query($query);
    
}


echo "Filename: " . $_FILES['file']['name']."<br>";
echo "Type : " . $_FILES['file']['type'] ."<br>";
echo "Size : " . $_FILES['file']['size'] ."<br>";
echo "Temp name: " . $_FILES['file']['tmp_name'] ."<br>";
echo "Error : " . $_FILES['file']['error'] . "<br>";

?>