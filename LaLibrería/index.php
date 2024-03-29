<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mi Librería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center p-3 bg-success">
        <form id="form1" name="form1">
            <fieldset>
                <legend class="text-center bg-warning">Mi Librería</legend>
                <img class="p-3" src="libreria.jpg" alt="libreria" width="600">
                <br>
                <input class="btn btn-primary p-3" type="button" value="Acceder" onclick="window.location.href='iniciar_sesion.php'">
            </fieldset>
        </form>
        <?php include("footer_libros.php"); ?>
        <div class="text-center pt-2 pb-5 mb-5">
            <h2 class="mt-3">Cookies</h2>
            <?php
            if (!isset($_COOKIE['micookie'])) {
                $caducidad = time() + (60 * 60 * 24 * 365);
                setcookie('micookie', 1, $caducidad);
                echo "La cookie se ha creado con exito";
            } else {
                echo  "La cookie ya existe.";
            }
            ?>
        </div>

</body>
</html>