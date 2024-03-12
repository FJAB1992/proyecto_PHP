<?php
include "conexion.php";
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Listado de libros
                </div>
            </div>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-6">
                    <div class="card">
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
                                        <td scope="row"><?php echo $registro[1]; ?></td>
                                        <td><?php echo $registro[2]; ?></td>
                                        <td><?php echo $registro[3]; ?></td>
                                        <td><?php echo $registro[4]; ?></td>
                                        <td><?php echo $registro[5]; ?></td>
                                        <td><a href="baja2.php?id=<?php echo $registro[0]; ?>"><i class="bi-trash px-1" style="font-size: 2rem; color:red"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!--otro icono curioso de back: bi bi-backspace -->
                <a href="panel_admin.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
            </div>

        </div>

    </div>

</div>

<?php include("../footer_libros.php"); ?>