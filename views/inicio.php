<?php require "../php/CRUD_libros.php"; //Procesamiento de CRUD de libros ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Biblioteca</title>
    <style>
        .second-nav {
            background: #e6dbe6 !important;
        }
    </style>
</head>

<body>
    <?php include "../partials/navbar.php"; ?>

    <!--NAV SECUNDARIO-->
    <nav class="second-nav p-2 bg-light">
        <div class="text-center d-flex flex-column flex-sm-row justify-content-between align-items-center mx-3">
            <span class="navbar-brand h1 fs-5">
                ¡Bienvenido,
                <?php echo $_SESSION['$username']; ?>!
            </span>

            <form class="d-flex flex-row" action="./inicio.php" method="get">
                <input class="form-control" type="search" name="buscarLibro" placeholder="Buscar libro...">
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </nav>

    <main class="container py-4">

        <!-- Título -->
        <section class="text-center mb-5">
            <h1 class="display-5 text-dark">BIBLIOTECH</h1>
        </section>

        <div class="container mt-5">
            <div class="alert alert-danger text-center shadow-sm" role="alert">
                <h4 class="alert-heading">¡Bienvenido a la gestión de tu biblioteca!</h4>
                <p>
                    Aquí puedes ingresar tus libros preferidos y visualizarlos en la tabla inferior.
                    <?php if (!count($_SESSION['autores']) > 0 or !count($_SESSION['categorias']) > 0) { ?>
                        Para iniciar a agregarlos, primero debes crear tus autores y tus categorías.
                    <?php } else{ ?>
                        Crea tus autores y categorias preferidas si deseas registrar mas libros.
                <?php } ?>
                </p>
                <hr>
                <div>
                    <a href="./addAutor_addCategoria.php" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i> Agregar autores y categorias
                    </a>
                    <?php if (count($_SESSION['autores']) > 0 && count($_SESSION['categorias']) > 0) { ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLibro">
                            <i class="fas fa-plus me-1"></i> Agregar Libro
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Resultados de la búsqueda -->
        <div class="container my-4">
            <?php if (!empty($busquedaEncontrada)) { // Si hay libros encontrados ?>
                <hr>
            <div class="row">
                <div class="alert alert-success text-center d-flex justify-content-between" role="alert">
                    <div class="d-flex flex-row gap-2 align-items-center">
                        <i class="fa-solid fa-magnifying-glass fs-5"></i>
                        <p class="h1 fs-5">Busqueda encontradas</p>
                    </div>
                    <a class="btn btn-danger" href="javascript:window.location.href='inicio.php';">Cerrar</a>
                </div>
                <?php foreach ($busquedaEncontrada as $libro) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <strong>
                                    <?php echo $libro->getNombreLibro(); ?>
                                </strong>
                            </h5>
                            <p class="card-text">
                                <strong>Id:</strong>
                                <?php echo $libro->getId(); ?><br>
                                <strong>Categoría:</strong>
                                <strong>Autor:</strong>
                                <?php echo $libro->getAutor(); ?><br>
                                <strong>Categoría:</strong>
                                <?php echo $libro->getCategoria(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } else if (isset($_GET['buscarLibro'])) { // Si no se encontraron resultados y se realizó la búsqueda ?>
            <div class="alert alert-warning text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> No se encuentran libros coincidentes con la búsqueda.
            </div>
            <?php } ?>
        </div>

        <hr>

        <!-- Tabla de resultados -->
        <div class="table-responsive my-4">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del Libro</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if(!count($libros) > 0) { ?>
                    <tr>
                        <td class="text-center" colspan="5">Aún no existen libros registrados</td>
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
                        <td class="text-center">
                            <?php 
                            echo "
                            <a class='btn btn-ligth border border-black btn-sm' href='?edit={$librosForeach->getId()}'> 
                                <i class='fas fa-edit'></i> 
                            </a>
                            <a type='button' class='btn btn-danger btn-sm' href='?delete={$librosForeach->getId()}'>
                                <i class='fas fa-trash-alt'></i>
                            </a>
                            "; ?>
                        </td>
                    </tr>
                    <?php } } ?>

                </tbody>
            </table>
        </div>

        <!-- Form para EDITAR libros ingresados -->
        <?php if(isset($_GET['edit'])) { 
            $editarLibro = obtenerId($_GET['edit'], $libros)
        ?>

        <div class="card shadow-lg">
            <div class="card-header text-white text-center"
                style="background-color: #007bff; background: #7e0707 !important;">
                <h4 class="mb-0">Editar valores</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">

                    <input type="hidden" name="updateBookForm" value="updateBookForm">
                    <input type="hidden" name="id" value="<?php echo $editarLibro->getId() ?>">

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
                                <input class="form-control" type="text"
                                    value="<?php echo $editarLibro->getCategoria(); ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-2 mt-4">
                        <div class="d-flex flex-row align-items-center justify-content-center mb-3">
                            <i class="fa-solid fa-pen-to-square p-3 fs-2"></i>
                            <p class="h1 fs-3">Registro a editar:</p>
                        </div>

                        <div
                            class="d-flex flex-column flex-lg-row flex-wrap align-items-center justify-content-center gap-2">
                            <!-- Nombre del libro -->
                            <div class="mb-4 col-10 col-lg-3">
                                <label for="nomLibro" class="form-label fw-bold">Nombre del libro:</label>
                                <input class="form-control" type="text" name="editNombre"
                                    value="<?php echo $editarLibro->getNombreLibro(); ?>">
                            </div>

                            <!-- Autor -->
                            <div class="mb-4 col-10 col-lg-3">
                                <label for="autor" class="form-label fw-bold">Nombre del autor:</label>
                                <select class="form-select" name="editAutor" required>
                                    <?php foreach ($_SESSION['autores'] as $autor) { ?>
                                    <option value="<?php echo $autor->getNombreAutor(); ?>">
                                        <?php echo $autor->getNombreAutor(); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Categoría -->
                            <div class="mb-4 col-10 col-lg-3">
                                <label for="category" class="form-label fw-bold">Categoría:</label>
                                <select class="form-select" name="editCategoria" required>
                                    <?php foreach ($_SESSION['categorias'] as $categoria) { ?>
                                    <option value="<?php echo $categoria->getNombreCategoria(); ?>">
                                        <?php echo $categoria->getNombreCategoria(); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- Botón -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5">Guardar Cambios</button>
                        <a href="inicio.php" class="btn btn-danger px-5">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>

        <?php } ?>


        <!-- Modal con formulario para agregar libro -->
        <div class="modal fade" id="addLibro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header text-white" style="background: #7e0707 !important;">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Libro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="" method="post">

                            <input type="hidden" name="librosForm" value="librosForm"> <!--Input que obtiene valor del form-->
                            <input type="hidden" name="estado" value="disponible"> <!--Input que obtiene valor del estado DISPONIBLE-->

                            <div class="col my-2 mx-3">

                                <!-- Nombre del libro -->
                                <div class="row mb-4">
                                    <label class="h5">Nombre del libro:</label>
                                    <input class="form-control" type="text" name="nomLibro" placeholder="Los viajes de Gulliver..." required>
                                </div>

                                <!-- Autor -->
                                <div class="row mb-4">
                                    <label class="h5">Nombre del autor:</label>
                                    
                                    <select class="form-select" name="autor" required>
                                        <?php foreach ($_SESSION['autores'] as $autor) { ?>
                                        <option value="<?php echo $autor->getNombreAutor(); ?>">
                                            <?php echo $autor->getNombreAutor(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- Categoría -->
                                <div class="row mb-4">
                                    <label class="h5">Categoría:</label>

                                    <select class="form-select" name="category" required>
                                        <?php foreach ($_SESSION['categorias'] as $categoria) { ?>
                                        <option value="<?php echo $categoria->getNombreCategoria(); ?>">
                                            <?php echo $categoria->getNombreCategoria(); ?>
                                        </option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                            <!-- Botones -->
                            <?php if (count($_SESSION['autores']) > 0 && count($_SESSION['categorias']) > 0) { ?>
                            <div class="buttons text-center">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include "../partials/footer.php" ?>
</body>


</html>