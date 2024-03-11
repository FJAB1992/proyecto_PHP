<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
        a {
            text-decoration: none;
            color: black;
        }

        legend {
            color: yellow;
        }
    </style>
</head>

<body>
    <div class="text-center bg-success p-3">
        <form method="post" action="login.php">
            <fieldset>
                <legend>Bienvenido a mi Librería</legend>

                Correo:<input type="text" name="correo" required>
                <br><br>
                Contraseña: <input type="password" name="contraseña" required><br>
                <br>
                <input class="btn btn-primary" type="submit" value="Iniciar sesión">
                <br>
            </fieldset>
        </form>
    </div>
    <div class="text-center p-3 bg-flat bg-secondary">
        <form method="post" action="alta_usuario.php">
            <fieldset>
                <legend>Nuevo usuario </legend>
                <a href="alta_usuario.php" class="btn btn-primary">Crear cuenta</a>
            </fieldset>
        </form>

        <br>

        <?php
        if (isset($_SESSION['id_usuario']) && $_SESSION['rol'] == 'user') {
            echo "Sesión iniciada por: <br>" . $_SESSION['correo'];
        }
        ?>

        <div class="text-center p-3 m-3 bg-dark">
            <p class="text-white">Proyecto desarrollado por: Daniel A. Molina - Francisco J. Aranda - Carlos Vallejo</p>
        </div>
    </div>
</body>

</html>