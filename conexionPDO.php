<?php
try{
$dsn = "mysql:host=localhost;dbname=lol";

$conexion = new PDO($dsn, 'root', '');
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ms){
    echo "Fallo en conexión a BBDD " + $ms;
}