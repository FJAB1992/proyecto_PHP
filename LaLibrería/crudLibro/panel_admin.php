<?php
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Opciones
                </div>
                <div class="p-4">
                    <!-- Shortcut: bs5-table-default -->
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Agregar libro</th>
                                    <th scope="col">Retirar libro</th>
                                    <th scope="col">Actualizar libro</th>
                                    <th scope="col">Listado de libros</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">
                                        <a href="alta.php">
                                            <i class="bi bi-journal-plus px-3" style="font-size: 4rem; color:orange;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="baja.php">
                                            <i class="bi bi-journal-minus px-3" style="font-size: 4rem; color:orange;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="actualiza.php">
                                            <i class="bi bi-journals px-3" style="font-size: 4rem; color:orange;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="listado.php">
                                            <i class="bi bi-journal-bookmark-fill px-3" style="font-size: 4rem; color:orange;"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br><br>
            <button class="btn btn-primary"><a href="../dashboard.php">Volver</a></button>
        </div>
    </div>
</div>

<?php include("../footer_libros.php"); ?>