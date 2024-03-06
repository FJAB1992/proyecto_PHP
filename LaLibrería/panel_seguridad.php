<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Seguridad</title>
</head>
<body>
    <form method="post" action="creacion_admin.php">
        <fieldset style="width: 15%; border: 2px solid rgb(63, 179, 236); background-color: rgb(236, 251, 255)">
            <legend>Panel de Seguridad</legend>
            <label for="contraseña">Contraseña:</label><br>
            <input type="password" id="contraseña" name="contraseña" placeholder="Pon la contraseña" required><br><br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
    <br>
    <a href="iniciar_sesion.php">Pulsa aquí para volver al formulario de inicio de sesión</a>
</body>
</html>
