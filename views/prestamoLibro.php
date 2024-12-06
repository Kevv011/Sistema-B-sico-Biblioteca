<?php 
require "../class/prestamo.php";  // Clase Prestamo
require "../php/CRUD_libros.php"; // Procesamiento de CRUD de libros

// Inicializa el array de préstamos si no está definido
if (!isset($_SESSION['prestamos'])) {
    $_SESSION['prestamos'] = [];
}

$prestamos = $_SESSION['prestamos']; // Array de prestamos

if (isset($_POST['prestamoForm'])) { // Contenido que se manda del form de PRESTAMOS

    $editarLibro = obtenerId($_GET['edit'], $libros);

    // Obtención de las variables de los campos con POST
    if (isset($_POST['nombreUser'], $_POST['prestamo'], $_POST['devolucion'])) {

        $idPrestamo = count($prestamos) + 1;
        $idLibro = $_POST['idLibro']; 
        $nombreUser = $_POST['nombreUser'];
        $fechaPrestamo = $_POST['prestamo'];
        $fechaDevolucion = $_POST['devolucion'];
        $estado = $_POST['estado'];

        // Crear la instancia del objeto Prestamo
        $prestamo = new Prestamo($idPrestamo, $idLibro, $nombreUser, $fechaPrestamo, $fechaDevolucion);

        // Validacion de que $prestamos sea un array
        if (is_array($prestamos)) {
            $prestamos[] = $prestamo;  
        } else {
            $_SESSION['prestamos'] = [$prestamo];  
        }

        //Almacenamiento en la sesion
        $_SESSION['prestamos'] = $prestamos;

        //Cambiar el estado del libro a PRESTADO
        if (isset($_POST['estado'])) {
            $editarLibro = obtenerId($_GET['edit'], $libros);
            $editarLibro->setEstado($_POST['estado']);
        }

        header("location: prestamoLibro.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo de libros</title>
</head>

<body>
    <?php include "../partials/navbar.php"; ?>

    <main>
        <!-- Título -->
        <section class="text-center my-4">
            <h1 class="display-6 text-dark">LIBROS DISPONIBLES</h1>
        </section>

        <!-- Tabla de resultados -->
        <div class="table-responsive my-4 container">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del Libro</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if(!count($libros) > 0) { ?>
                    <tr>
                        <td class="text-center" colspan="6">Aún no existen libros registrados</td>
                    </tr>

                    <?php }else { ?>

                    <?php foreach($libros as $librosForeach) { ?>
                    <tr>
                        <th scope="row">
                            <?php echo $librosForeach->getId(); ?>
                        </th>
                        <td class="text-capitalize">
                            <?php echo $librosForeach->getNombreLibro(); ?>
                        </td>
                        <td class="text-capitalize">
                            <?php echo $librosForeach->getAutor(); ?>
                        </td>
                        <td class="text-capitalize">
                            <?php echo $librosForeach->getCategoria(); ?>
                        </td>
                        <td>
                            <?php if($librosForeach->getEstado() == "disponible") { ?>
                                <button class="btn btn-success text-capitalize">
                                    <?php echo $librosForeach->getEstado(); ?>
                                </button>
                            <?php }else { ?>
                                <button class="btn btn-danger text-capitalize">
                                    <?php echo $librosForeach->getEstado(); ?>
                                </button>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($librosForeach->getEstado() == "disponible") {
                                echo "
                                <a class='btn btn-ligth border border-black btn-sm' href='?edit={$librosForeach->getId()}'> 
                                    <i class='fas fa-edit'></i> Generar prestamo
                                </a>
                                "; 
                            }else {
                                echo "
                                <button class='btn btn-ligth border border-black btn-sm' disabled> 
                                    <i class='fas fa-edit'></i> Libro prestado
                                </button>
                                "; 
                            }?>
                        </td>
                    </tr>
                    <?php } } ?>

                </tbody>
            </table>
        </div>

        <!-- Form para generar un PRESTAMO -->
        <?php if(isset($_GET['edit'])) { 
            $editarLibro = obtenerId($_GET['edit'], $libros)
        ?>

        <div class="container">

            <div class="card shadow-lg">
                <div class="card-header text-white text-center"
                    style="background-color: #007bff; background: #7e0707 !important;">
                    <h4 class="mb-0">Realizar prestamo</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
    
                        <input type="hidden" name="prestamoForm" value="prestamoLibro">
                        <input type="hidden" name="idLibro" value="<?php echo $editarLibro->getId() ?>">
    
                        <div class="mb-4">
                            <div class="d-flex flex-row align-items-center justify-content-center mb-3">
                                <i class="fa-solid fa-book p-3 fs-2"></i>
                                <p class="h1 fs-3">Registro Seleccionado: Id #
                                    <?php echo $editarLibro->getId(); ?>
                                </p>
                            </div>
    
                            <div
                                class="d-flex flex-column flex-lg-row flex-wrap align-items-center justify-content-center gap-2">
                                <!-- Nombre del libro -->
                                <div class="mb-4 col-10 col-lg-3">
                                    <label for="nomLibro" class="form-label fw-bold">Nombre del libro:</label>
                                    <input class="form-control" type="text"
                                        value="<?php echo $editarLibro->getNombreLibro(); ?>" readonly>
                                </div>
    
                                <!-- Autor -->
                                <div class="mb-4 col-10 col-lg-3">
                                    <label for="autor" class="form-label fw-bold">Nombre del autor:</label>
                                    <input class="form-control" type="text" value="<?php echo $editarLibro->getAutor(); ?>"
                                        readonly>
                                </div>
    
                                <!-- Categoría -->
                                <div class="mb-4 col-10 col-lg-3">
                                    <label for="category" class="form-label fw-bold">Categoría:</label>
                                    <input class="form-control" type="text" value="<?php echo $editarLibro->getCategoria(); ?>" readonly>
                                </div>
                            </div>
                        </div>
    
                        <hr>

                        <div class="mb-1 mt-2">
                            <div class="d-flex flex-row align-items-center justify-content-center mb-2">
                                <i class="fa-solid fa-pen-to-square p-3 fs-2"></i>
                                <p class="h1 fs-3">Formulario de prestamo</p>
                            </div>

                            <input type="hidden" name="estado" value="prestado"> <!--Input para cambiar el estado del libro-->

                            <div class="alert alert-warning text-center" role="alert">
                                <i class="fas fa-exclamation-circle"></i> Si no se cumple la fecha de devolucion, el usuario obtendra una multa adecuada al tiempo que haya sobrepasado.
                            </div>
    
                            <div
                                class="d-flex flex-column flex-lg-row flex-wrap align-items-center justify-content-center gap-2">
                                <!-- Nombre de usuario -->
                                <div class="mb-4 col-10 col-lg-3">
                                    <label for="nomLibro" class="form-label fw-bold">Nombre usuario:</label>
                                    <input class="form-control" type="text" name="nombreUser" placeholder="Nombre y apellido">
                                </div>
    
                                <!-- Fecha prestamo -->
                                <div class="mb-4 col-10 col-lg-3">
                                    <label for="autor" class="form-label fw-bold">Fecha de prestamo:</label>
                                    <input class="form-control" name="prestamo" type="date">
                                </div>
    
                                <!-- Fecha devolucion -->
                                <div class="mb-4 col-10 col-lg-3">
                                    <label for="autor" class="form-label fw-bold">Fecha de devolucion:</label>
                                    <input class="form-control" name="devolucion" type="date">
                                </div>
                            </div>
                        </div>

                        <!-- Botón -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5">Generar prestamo</button>
                            <a href="prestamoLibro.php" class="btn btn-danger px-5">Cancelar</a>
                        </div> 
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="container mt-4">
    <h2 class="text-center">Préstamos Realizados</h2>
    <div class="row">
        <?php

        if (count($prestamos) > 0) {

            foreach ($prestamos as $prestamo) {
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white text-center">
                            <h5 class="card-title">Préstamo #<?php echo $prestamo->getIdPrestamo(); ?></h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Libro ID:</strong> <?php echo $prestamo->getIdLibro(); ?></p>
                            <p><strong>Usuario:</strong> <?php echo $prestamo->getNombreUsuario(); ?></p>
                            <p><strong>Fecha de Préstamo:</strong> <?php echo $prestamo->getFechaPrestamo(); ?></p>
                            <p><strong>Fecha de Devolución:</strong> <?php echo $prestamo->getFechaDevolucion(); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12 text-center">
                <p class="alert alert-warning">No hay préstamos registrados.</p>
            </div>
        <?php } ?>
    </div>
</div>
    </main>

    <?php include "../partials/footer.php" ?>

</body>

</html>