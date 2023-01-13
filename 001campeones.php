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
                <!-- He decidido pintar la tabla con un foreach dentro de otro foreach-->
                <?php foreach ($listaChamps as $lista) {
                    echo "<tr>";
                    foreach ($lista as $insideLista) {
                        echo "<td>" . $insideLista . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
</body>

</html>