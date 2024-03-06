<?php
session_start();

session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form method="post" action="login.php">
        <fieldset style="width: 15%; border: 2px solid rgb(63, 179, 236); background-color: rgb(236, 251, 255)">
            Sesión cerrada correctamente
            <br>
            <a href="index.php">Volver</a>
        </fieldset>
    </form>
</body>

</html>