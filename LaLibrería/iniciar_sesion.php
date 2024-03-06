<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post" action="login.php">
    <fieldset style="width: 15%; border: 2px solid rgb(174,175,175); background-color: rgb(222,224,222)">
        <legend>Bienvenido a mi Librería</legend>

        Correo:<br> <input type="text" name="correo" required>
        <br>
        Contraseña: <input type="password" name="contraseña" required><br>
        <br>
        <input type="submit" value="Iniciar sesión">
        <br>
    </fieldset>
</form>
<form method="post" action="alta_usuario.php">
    <fieldset style="width: 15%; border: 2px solid rgb(174,175,175); background-color: rgb(222,224,222)">
        <legend>Nuevo usuario? </legend>
        <a href="alta_usuario.php">Crear cuenta</a>
    </fieldset>
</form>
<br>

<?php
if (isset($_SESSION['id_usuario']) && $_SESSION['rol'] == 'user') {
    echo "Sesión iniciada por: <br>" . $_SESSION['correo'];
}
?>
</body>
</html>
