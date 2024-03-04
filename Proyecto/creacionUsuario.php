<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style>
    body {
        text-align: center;
    }

    a {
        color: blue;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <?php
    //recoger el nombre del formulario
    $minombre = $_GET["nombre"];
    $email = $_GET["email"];
    $contra = $_GET["contrasena"];

    //Siempre añadimos usuarios, no administradores
    $tipoUser = "usuario";


    //Datos de conexion
    $servidor = "localhost";
    $usuario = "root";
    $password = "";

    //Variable de la conexion
    $conexion = mysqli_connect($servidor, $usuario, $password);

    //Si la conexion ha funcionado:
    if ($conexion == true) {
        mysqli_select_db($conexion, "libreria");


        // //Parte para controlar que el email no esté repetido
        // $consultar= "SELECT email FROM usuarios";

        // $registros= mysqli_query($conexion, $consultar);

        // $repetido=false;
        // while($registro=mysqli_fetch_row($registros)){  
        //     if($registro[0]=="$email"){
        //         $repetido=true;
        //     }
        // }

        //Creo el insertar
        $insertar = "INSERT usuarios(nombre,email,contraseña,rol) VALUES ('$minombre', '$email' , '$contra', '$tipoUser')"; //Para meter variable dentro de comillas

        //Lo inserto
        mysqli_query($conexion, $insertar) or die("Ha ocurrido esto: " . mysqli_error($conexion));

        print("Usuario añadido<br>");

        echo ("<a href='iniciarSesion.php?'>Pulsa aqui para volver al formulario de inicio de sesion</a>");
        print("<br>");
    }


    ?>
</body>

</html>