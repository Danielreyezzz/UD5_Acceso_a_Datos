<?php
try {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dsn = "mysql:host=localhost;dbname=lol";

    $conexion = new PDO($dsn, 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($username) || !isset($password)) {
        echo "ERROR! Algun valor no ha sido bien introducido en el formulario";
    }


    $sql = "SELECT username, password FROM user WHERE username = :usernamer";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(":usernamer", $username);

    $isOk = $sentencia->execute();

    $usuario = $sentencia->fetch();

    if ($usuario && password_verify($usuario['password'], $password)) {
        echo "TE HAS LOGEADO";
    }else{
        echo "Un mojón pa ti";
    }
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}