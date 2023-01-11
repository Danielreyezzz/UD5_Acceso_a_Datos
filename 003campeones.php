<?php
include_once "conexion.php";

$consulta = "SELECT * FROM champ";
$listaChamps = mysqli_query($conexion, $consulta);

if (!$listaChamps) {
    echo "La consulta no se ha realizado con éxito: ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script defer src="js/custom.js"></script>
    <script defer src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <div class="table-responsive container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Dificultad</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaChamps as $key => $lista) {
                    echo "<tr>";
                    foreach ($lista as $insideLista) {
                        echo "<td>" . $insideLista . "<i class='bi bi-arrow-up-short'></i>
                        <i class='bi bi-arrow-down-short'></i>
                        </td>";
                    }
                    echo "</tr>";
                }
               
                ?>
            </tbody>
        </table>