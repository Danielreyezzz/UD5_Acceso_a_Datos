<?php
try {
    include_once "conexionPDO.php";

    /* Recibimos los datos del formulario de registro */
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    /* Comprobamos que los valores no sean nulos. Si es así redigiremos al formulario de registro */
    if (!isset($name) || !isset($username) || !isset($password) || !isset($email)) {
        echo "ERROR! Algun valor no ha sido bien introducido en el formulario";
        header('refresh:3;url=005registro.php');
    }


    $sql = "INSERT INTO `user`(`name`, username, `password`, email)
                  VALUES (:name, :username, :password, :email);";
    $sentencia = $conexion->prepare($sql);

    /* En el execute asociamos el esquema del INSERT con los valores que vamos a introducir.
    Importante cifrar la contraseña. */
    $isOk = $sentencia->execute(
        [
            "name" => $name,
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "email" => $email
        ]
    );
    /* Una vez hecha la inserción, avisamos al usuario y redirigimos a la lista de campeones */
    echo "Te has registrado con username <strong>$username</strong> y contraseña <strong>$password</strong>";
    header('refresh:3;url=002campeones.php');
    
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}
