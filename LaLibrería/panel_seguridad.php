<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Seguridad</title>
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
    <div class="container text-center bg-success">
    <form method="post" action="creacion_admin.php">
        <fieldset>
            <legend>Panel de Seguridad</legend>
            <label for="contraseña">Contraseña:</label><br>
            <input type="password" id="contraseña" name="contraseña" placeholder="Pon la contraseña" required><br><br>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </fieldset>
    </form>
    <br>
    <a href="iniciar_sesion.php">Pulsa aquí para volver al formulario de inicio de sesión</a>
    </div>
</body>

</html>