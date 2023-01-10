<?php
    $id = $_POST["id"] + 1;

    $conexion = mysqli_connect("localhost", "root", "", "lol");

    $consulta = "SELECT * FROM champ WHERE id = $id";
    $selectedChamp = mysqli_query($conexion, $consulta);

    foreach ($selectedChamp as $value) {
        foreach ($value as $valorsito) {
            echo $valorsito . "</br>";
        }
    }
?>