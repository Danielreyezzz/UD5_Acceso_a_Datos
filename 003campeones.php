<?php
include_once "conexion.php";

/* Comprobamos que se haya recibido el key por get.
Si es así, la consulta estará ordenada utilizando ambos datos recibidos
Si no se ha recibido nada por url, la consulta será la tabla sin ordenar*/
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
                    <!-- Cada th tiene un enlace que te lleva a la misma página, pero esta vez pasandole por get el tipo de dato a ordenar, 
                    y el orden dependiendo del tipo de flecha -->
                    <th scope="col">ID <a href='003campeones.php?key=id&&orden=ASC'><i class='bi bi-arrow-up-short'></i></a> 
                        <a href='003campeones.php?key=id&&orden=DESC'><i class='bi bi-arrow-down-short'></i></a></th>
                    <th scope="col">Nombre <a href='003campeones.php?key=nombre&&orden=ASC'><i class='bi bi-arrow-up-short'></i></a> 
                        <a href='003campeones.php?key=nombre&&orden=DESC'><i class='bi bi-arrow-down-short'></i></a></th>
                    <th scope="col">Rol <a href='003campeones.php?key=rol&&orden=ASC'><i class='bi bi-arrow-up-short'></i></a> 
                        <a href='003campeones.php?key=rol&&orden=DESC'><i class='bi bi-arrow-down-short'></i></a></th>
                    <th scope="col">Dificultad <a href='003campeones.php?key=dificultad&&orden=ASC'><i class='bi bi-arrow-up-short'></i></a> 
                        <a href='003campeones.php?key=dificultad&&orden=DESC'><i class='bi bi-arrow-down-short'></i></a></th>
                    <th scope="col">Descripción <a href='003campeones.php?key=descripcion&&orden=ASC'><i class='bi bi-arrow-up-short'></i></a> 
                        <a href='003campeones.php?key=descripcion&&orden=DESC'><i class='bi bi-arrow-down-short'></i></a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordered as $key => $lista) {
                    echo "<tr>";
                    foreach ($lista as $key => $insideLista) {
                        echo "<td>" . $insideLista . "</td>";
                    }
                    echo "</tr>";
                }


                ?>
            </tbody>
        </table>
        
    </body>
</html>