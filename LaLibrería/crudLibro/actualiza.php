<?php
include "conexion.php";
include "header.php";
?>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                <div class="card">
                    <div class="card-header display-6">
                        Actualización de libro
                    </div>
                </div>
                <div class="row mt-3 justify-content-md-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Libros:
                            </div>
                            <?php
                            mysqli_select_db($conexion, "libreria");
                            $consulta = "SELECT * FROM libros";

                            //Recogemos las filas
                            $registros = mysqli_query($conexion, $consulta);
                            ?>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Título</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Género</th>
                                        <th scope="col">Fecha publicación</th>
                                        <th scope="col">Disponibilidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($registro = mysqli_fetch_row($registros)) {
                                        //CIERRA EL WHILE EN EL SIGUIENTE SCRIPT
                                    ?>
                                        <tr class="align-middle">
                                            <td><?php echo $registro[1]; ?></td>
                                            <td><?php echo $registro[2]; ?></td>
                                            <td><?php echo $registro[3]; ?></td>
                                            <td><?php echo $registro[4]; ?></td>
                                            <td><?php echo $registro[5]; ?></td>
                                            <td><a href="actualiza2.php?id=<?php echo $registro[0]; ?>"><i class="bi-pencil px-1" style="font-size: 2rem; color:green"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--otro icono curioso de back: bi bi-backspace -->
                    <a href="dashboard.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
                </div>

            </div>

        </div>

    </div>
</body>
<?php include("footer_libros.php"); ?>