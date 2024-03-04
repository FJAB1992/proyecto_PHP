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
    <h1>Inicio de sesion</h1>
    <form action="iniciaSesion.php">        
        <label for="email">Email</label><br>
        <input type="text" id="email" name="email" placeholder="Pon tu email"><br><br>

        <label for="contrasena">Contraseña: </label><br>
        <input type="password" id="contrasena" name="contrasena" placeholder="Pon tu contraseña"><br><br>

        <input type="submit" value="Enviar">
    </form>


	<?php
      //Formulario para inciar sesion que nos manda a 2 botones de iniciar o cerrar  con boton para ir al formulario de usuario nuevo
      echo("<br><br><a href='nuevoUsuario.php?Opcion=1'>Crear usuario nuevo</a>");print("<br>"); 


	?>
</body>
</html>