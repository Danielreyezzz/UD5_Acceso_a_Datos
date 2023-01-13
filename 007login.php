<?php
try {
    include_once "conexionPDO.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!isset($username) || !isset($password)) {
        echo "ERROR! Algun valor no ha sido bien introducido en el formulario";
    }else{
    $sql = "SELECT * FROM `user` WHERE username = :username";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':username', $username);

    $sentencia->execute();

    $usuario = $sentencia->fetch();

    if (password_verify($password, $usuario['password'])) {
        echo "<h1>Bienvenido $usuario[username]</h1>";
        header('refresh:2;url=002campeones.php');
    }else{
        echo "Usuario o contraseña INCORRECTA";
        header('refresh:2;url=008loginView.php');
    }
}
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}
