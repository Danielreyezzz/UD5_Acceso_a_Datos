<?php

$dsn = "mysql:host=localhost;dbname=lol";

try {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $conexion = new PDO($dsn, 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($name) || !isset($username) || !isset($password) || !isset($email)) {
        echo "ERROR! Algun valor no ha sido bien introducido en el formulario";
    }


    $sql = "INSERT INTO `user`(`name`, username, `password`, email)
                  VALUES (:`name`, :username, :`password`, :email);";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(":`name`", $nombre);
    $sentencia->bindParam(":username", $username);   
    $sentencia->bindParam(":`password`", $password);   
    $sentencia->bindParam(":email", $email);                 
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}
