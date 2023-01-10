<?php

$conexion = mysqli_connect("localhost", "root", "", "lol");

if (mysqli_connect_errno()) {
    echo "Conexion con la BBDD fallida: " . mysqli_connect_error();
}

$consulta = "SELECT * FROM 'champ'";
$listaChamps = mysqli_query($conexion, $consulta);

if ($listaChamps) {
    foreach ($listaChamps as $key) {
        echo "$key[id] $key[name] </br>";
    }
}