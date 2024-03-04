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

    img{
        align-items: center;
        width: 5%;
    }

</style>
<body>
    <h1>Bievenido a la libreria</h1>
    <img src="libreria.png"><br><br>
	<?php
    //Envia al inicio de sesion
        echo("<a href='iniciarSesion.php?Opcion=1'>1. Iniciar Sesion</a>");print("<br>");  
	?>
</body>
</html>