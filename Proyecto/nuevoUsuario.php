<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<style>
    body{
        text-align: center;
    }

	a{
		color: blue;
        text-decoration: none;
	}

    a:hover{
        text-decoration: underline;
    }

</style>
<body>
    <h1>Creacion de nuevo usuario</h1>
    <form action="creacionUsuario.php">
        <label for="nombre">Nombre usuario</label><br>
        <input type="text" id="nombre" name="nombre" placeholder="Pon tu nombre "><br><br>

        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" placeholder="Pon tu email"><br><br>

        <label for="contrasena">Contraseña: </label><br>
        <input type="password" id="contrasena" name="contrasena" placeholder="Pon tu contraseña"><br><br>

        <input type="submit" value="Enviar">
    </form>


    <?php
    echo("<br><a href='iniciarSesion.php?'>Pulsa aqui para volver al formulario de inicio de sesion</a>");print("<br>"); 

    ?>
</body>
</html>