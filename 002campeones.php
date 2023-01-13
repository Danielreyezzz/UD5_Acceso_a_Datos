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
                        echo "<td>" . $insideLista . "</td>";
                    }
                    /* Mis botones son td que se pintan despues de los datos en el bucle. 
                    El boton de modificar te llevará a 003editando.php con el id correspondiente de la lista en el momento en el que se encuentre del bucle.
                    El boton del modal para borrar, hará lo mismo pero llevandote a borrando.php */
                    echo "<td><a href='003editando.php?id=$lista[id]' class='btn btn-primary'>MODIFICAR</a></td> 
                    <td>
                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal$lista[id]'>
                      BORRAR
                    </button>
                    <div class='modal fade' id='exampleModal$lista[id]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>¿Está seguro que quiere borrar a <strong>$lista[nombre]</strong>?</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No borrar</button>
                            
                            <a href='borrando.php?id=$lista[id]' class='btn btn-danger'>BORRAR</a>
                            
                          </div>
                        </div>
                      </div>
                    </div></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
</body>

</html>