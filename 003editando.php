<?php
include_once "conexion.php";
/* Recibimos el id de 002campeones y hacemos una consulta filtrando dicho dato */
$id = $_GET["id"];
$consulta = "SELECT * FROM champ WHERE id = $id";
$selectedChamp = mysqli_query($conexion, $consulta);
foreach ($selectedChamp as $champ) {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=F, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script defer src="js/custom.js"></script>
    <script defer src="js/bootstrap.js"></script>
    <title>Document</title>
</head>

<body>
    <h1 class="h1 text-center mt-5">Modifica a <?php echo $champ["nombre"] ?> </h1>
    <form class="container" method="post">
        <div class="form-outline mb-4">
            <label class="form-label fw-bold fs-2" for="form4Example1">Nombre del Campeón</label>
            <input type="text" id="form4Example1" class="form-control" name="nombre" value='<?= $champ['nombre']?>' required />
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label fw-bold fs-2">Rol</label>
            <select class="form-select form-select-lg" name="rol" id="rol">
                <option value="Tanque"<?php if($champ["rol"] == "Tanque"){echo " selected ";}?>>Tanque</option>
                <option value="Luchador"<?php if($champ["rol"] == "Luchador"){echo " selected ";}?>>Luchador</option>
                <option value="Mago"<?php if($champ["rol"] == "Mago"){echo " selected ";}?>>Mago</option>
                <option value="Support"<?php if($champ["rol"] == "Support"){echo " selected ";}?>>Support</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="dificultad" class="form-label fw-bold fs-2">Dificultad</label>
            <select class="form-select form-select-lg" name="dificultad" id="dificultad">
                <option value="1"<?php if($champ["dificultad"] == "1"){echo " selected ";}?>>1</option>
                <option value="2"<?php if($champ["dificultad"] == "2"){echo " selected ";}?>>2</option>
                <option value="3"<?php if($champ["dificultad"] == "3"){echo " selected ";}?>>3</option>
                <option value="4"<?php if($champ["dificultad"] == "4"){echo " selected ";}?>>4</option>
                <option value="5"<?php if($champ["dificultad"] == "5"){echo " selected ";}?>>5</option>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label fw-bold fs-2" for="form4Example1">Descripción</label>
            <input type="text" id="form4Example1" class="form-control" name="descripcion" value='<?= $champ['descripcion']?>' required />
        </div>
        <button name="submit" type="submit" class="btn btn-primary">MODIFICAR</button>
    </form>
</body>

</html>

<!-- El botón de modificar mandará los datos del formulario a esta parte, que se encarga de hacer el update y volver a cargar 002campeones -->
<?php
if (isset($_POST["submit"])) {
    $update = "UPDATE champ
                SET nombre = '$_POST[nombre]',
                rol = '$_POST[rol]',
                dificultad = $_POST[dificultad],
                descripcion = '$_POST[descripcion]'
                WHERE id = $id;";
    if (mysqli_query($conexion, $update)) {
        header("Location: 002campeones.php");
    };
}
