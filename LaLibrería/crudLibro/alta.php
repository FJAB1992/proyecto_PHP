<?php
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Ingresar datos
                </div>
            </div>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" autofocus placeholder="Titulo" required />
                            </div>
                            <div class="mb-3">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" name="autor" id="autor" placeholder="Introduce autor" required />
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género</label>
                                <input type="text" class="form-control" name="genero" id="genero" placeholder="Introduce genero" required />
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha publicación</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Introduce fecha" required />
                            </div>
                            <div class="mb-3">
                                <label for="disponibilidad" class="form-label">Disponibilidad</label>
                                <select class="form-select" name="disponibilidad" id="disponibilidad" required>
                                    <option value="1">Disponible</option>
                                    <option value="0">No Disponible</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Dar de alta">
                            </div>
                        </form>
                    </div>
                </div>
                <!--otro icono curioso de back: bi bi-backspace -->
                <a href="dashboard.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
            </div>

        </div>

    </div>

</div>
<?php include("footer_libros.php"); ?>