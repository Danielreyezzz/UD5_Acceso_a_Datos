<?php
include_once "conexion.php";

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
            <input type="text" id="form4Example1" class="form-control" name="nombre" required />
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label fw-bold fs-2">Rol</label>
            <select class="form-select form-select-lg" name="rol" id="rol">
                <option value="Tanque">Tanque</option>
                <option value="Luchador">Luchador</option>
                <option value="Mago">Mago</option>
                <option value="Support">Support</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="dificultad" class="form-label fw-bold fs-2">Dificultad</label>
            <select class="form-select form-select-lg" name="dificultad" id="dificultad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label fw-bold fs-2" for="form4Example1">Descripción</label>
            <input type="text" id="form4Example1" class="form-control" name="descripcion" required />
        </div>
        <button name="submit" type="submit" class="btn btn-primary">MODIFICAR</button>
    </form>
</body>

</html>


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
