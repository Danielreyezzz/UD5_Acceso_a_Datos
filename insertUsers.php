<?php
try {

    $dsn = "mysql:host=localhost;dbname=lol";

    $conexion = new PDO($dsn, 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pass1 = password_hash('1234', PASSWORD_DEFAULT);
    $pass2 = password_hash('5555', PASSWORD_DEFAULT);
    $pass3 = password_hash('1111', PASSWORD_DEFAULT);


    $sql = "INSERT INTO `user`(`name`,username,`password`,email) 
    VALUES('Dani', 'Danielreyezzz', '$pass1', 'daniel@daniel.com'),
    ('Pedro', 'peter1234', '$pass2', 'pericopeter@peter.com'),
    ('Oscar', 'gallito21', '$pass3', 'oscarelgallo@gallito.com');";
    $sentencia = $conexion->prepare($sql);

    $sentencia->execute();
        
    
} catch (PDOException $ms) {
    echo "Fallo en la conexión a la BBDD: " . $ms->getMessage();
}
