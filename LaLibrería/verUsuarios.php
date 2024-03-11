<?php
    print "<style>
        table,tr,td,th{
            border:1px solid black;
            border-collapse:collapse;
    
    
    </style>";


    //Me traigo la sesion
    session_start();

    // Incluir el archivo de conexión
    require_once('conexion.php');

    print "<h1>Informacion de usuarios</h1>";

    $consultar= "SELECT * FROM usuarios";

    $registros= mysqli_query($conexion, $consultar);
    $cambiado= "";

    print "<table>";
    print"<tr><th>nombre</th>";
    print"<th>email</th>";
    print"<th>contraseña</th>";
    print"<th>rol</th>";
    print"<th>Acciones</th></tr>";
    //PAra poder mandar el id del usuario
    $codigo=1;
    while($registro=mysqli_fetch_row($registros)){
        $nombre= $registro[1];
        $email= $registro[2];
        $contraseña= $registro[3];//Probablemente sea cifrado, convertir a texto
        $rol= $registro[4];

        print"<tr><td>$registro[1]</td>";
        print"<td>$registro[2]</td>";
        print"<td>$registro[3]</td>";
        print"<td>$registro[4]</td>";
        print"<td><a href='eliminarUsuario.php?codigo=$codigo'>Eliminar</a>  ";
        print"<a href='alta_Usuario.php?'>Añadir</a>  ";
        //Al acceder al enlace podemos sacar el id del usuario facilmente
        print"<a href='modificarUsuario.php?codigo=$codigo'>Modificar</a></td></tr>";
        $codigo= $codigo+1;
    }

    print "</table>"

?>