<?php
$conexion = mysqli_connect("localhost", "root", "", "lol");

if (mysqli_connect_errno()) {
    echo "Conexion con la BBDD fallida: " . mysqli_connect_error();
}