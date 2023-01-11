<?php
include_once "conexion.php";


if (isset( $_GET['key'])) {
    $dato = $_GET['key'];
    $orden = $_GET['orden'];
    $consulta = "SELECT * FROM champ ORDER BY $dato $orden";
}else {
    $consulta = "SELECT * FROM champ";
}




$ordered = mysqli_query($conexion, $consulta);

if (!$ordered) {
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
                <?php foreach ($ordered as $key => $lista) {
                    echo "<tr>";
                    foreach ($lista as $key => $insideLista) {
                        echo "<td>" . $insideLista . "<a href='003campeones.php?key=$key&&orden=ASC'><i class='bi bi-arrow-up-short'></i></a> 
                        <a href='003campeones.php?key=$key&&orden=DESC'><i class='bi bi-arrow-down-short'></i></a> 
                        </td>";
                    }
                    echo "</tr>";
                }


                ?>
            </tbody>
        </table>
        
    </body>
</html>