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
<div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4 p-5 shadow-sm border rounded-5 border-primary">
                <h2 class="text-center mb-4 text-primary">Regístrate :)</h2>
                <form  method="post" action="006nuevoUsuario.php">
                <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control border border-primary" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username: </label>
                        <input type="text" class="form-control border border-primary" id="username"name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control border border-primary" id="password"name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control border border-primary" id="email" aria-describedby="emailHelp" name="email" required>
                    </div>
                    
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Registrarse</button>
                    </div>
                </form>
                
            </div>
        </div>
</body>
</html>

