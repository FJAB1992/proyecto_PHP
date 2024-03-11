<?php
//Traerme la sesion
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro en Librería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Formulario de registro -->
    <form id="form1" class="text-center bg-success" method="post" action="registrarUsuario.php">
        <fieldset>
            <legend>Registro en mi Librería</legend>
            <br><br>
            Nombre usuario: <input type="text" name="nombre" required>
            <br><br>
            Correo: <input type="email" name="email" required>
            <br><br>
            Contraseña: <input type="password" name="contraseña" required><br>
            <br>
            tipo (admin/usuario): <input type="text" name="rol" required>
            <input name="registro" id="registro" class="btn btn-primary" type="submit" value="Registrarse" />
        </fieldset>
    </form>
    <div class="text-center bg-secondary"><br>
        <a href="dashboard.php">ir al dashboard</a>
    </div>

</body>

</html>