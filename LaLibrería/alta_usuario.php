<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro en Librería</title>
</head>
<body>
    <!-- Formulario de registro -->
    <form method="post" action="registro.php">
        <fieldset style="width: 15%; border: 2px solid rgb(63, 179, 236); background-color: rgb(236, 251, 255)">
            <legend>Registro en mi Librería</legend>
            Nombre usuario:<br> <input type="text" name="nombre" required>
            <br>
            Correo:<br> <input type="email" name="email" required>
            <br>
            Contraseña: <input type="password" name="contraseña" required><br>
            <br>
            <input type="submit" value="Registrarse">
            <br>
        </fieldset>
    </form>

    <br>
    <a href='iniciar_sesion.php'>Pulsa aquí para volver al formulario de inicio de sesión</a>
    <br>
    <a href='panel_seguridad.php'>Crear admin</a>
</body>
</html>
