<?php
try {
    include_once "conexionPDO.php";
    /* Recibimos los valores del formulario de 008loginView */
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!isset($username) || !isset($password)) {
        echo "ERROR! Algun valor no ha sido bien introducido en el formulario";
        header('refresh:3;url=008loginView.php');
    } else {
        /* Hacemos una consulta por username */
        $sql = "SELECT * FROM `user` WHERE username = :username";
        $sentencia = $conexion->prepare($sql);
        /* Establecemos que :username es el dato recibido en el formulario */
        $sentencia->bindParam(':username', $username);

        $sentencia->execute();

        $usuario = $sentencia->fetch();

        /* Con password_verify comparamos que el valor instroducido por el usuario sea igual que el valor password del usuario en concreto que hemos buscado.
        Por defecto password_verify compara contraseñas cifradas, por lo que es importante que el dato esté cifrado en la base de datos */
        if (password_verify($password, $usuario['password'])) {
            echo "<h1>Bienvenido $usuario[username]</h1>";
            header('refresh:2;url=002campeones.php');
        } else {
            echo "Usuario o contraseña INCORRECTA";
            header('refresh:2;url=008loginView.php');
        }
    }
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}
