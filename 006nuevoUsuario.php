<?php
try {
    include_once "conexionPDO.php";

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    if (!isset($name) || !isset($username) || !isset($password) || !isset($email)) {
        echo "ERROR! Algun valor no ha sido bien introducido en el formulario";
    }


    $sql = "INSERT INTO `user`(`name`, username, `password`, email)
                  VALUES (:name, :username, :password, :email);";
    $sentencia = $conexion->prepare($sql);

    $isOk = $sentencia->execute(
        [
            "name" => $name,
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "email" => $email
        ]
    );

    echo "Te has registrado con username <strong>$username</strong> y contraseña <strong>$password</strong>";
    header('refresh:3;url=002campeones.php');
    
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}
