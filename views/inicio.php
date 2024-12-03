<?php  
include "../class/autor.php";
include "../class/categoria.php";
include "../class/libro.php";

session_start();

if(!isset($_SESSION['autores'], $_SESSION['categorias'])) { //Inicializa los arrays al iniciar la sesion
  $_SESSION['categorias'] = [];
  $_SESSION['autores'] = [];
}

//Inicializacion de Array para guardar libros y hacer el CRUD
if(!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}

$libros = $_SESSION['libros']; //Array de libros

//Obtencion de las variables de los campos con POST
if(isset($_POST['nomLibro'], $_POST['autor'], $_POST['category'])) {
  
  $id = count($libros) + 1;
  $nombreLibro = $_POST['nomLibro'];
  $nombreAutor = $_POST['autor'];
  $nombreCategoria = $_POST['category'];

  $libro = new Libro($id, $nombreLibro, $nombreAutor, $nombreCategoria); //Instancia

  $libros[] = $libro;

  $_SESSION['libros'] = $libros;

  //Redireccion al ser enviado el form
  header("location: inicio.php");
  exit;
}

?>

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
      <div class=" text-center">
          <span class="navbar-brand h1 fs-5">
              ¡Bienvenido, <?php echo $_SESSION['$username']; ?>!
          </span>
      </div>
  </nav>

  <main class="container py-4">

    <!-- Título -->
    <section class="text-center mb-5">
      <h1 class="display-5 text-dark">BIBLIOTECH</h1>
    </section>

    <!-- Botón para agregar libro -->
    <div class="text-end mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addLibro">
            <i class="fas fa-plus me-1"></i> Agregar Libro
        </button>
    </div>

    <div class="table-responsive my-4">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre del Libro</th>
                <th scope="col">Autor</th>
                <th scope="col">Categoría</th>
                <th scope="col" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php if(!count($libros) > 0) { ?>
            <tr>
              <td class="text-center" colspan="5">Aún no existen libros registrados</td>    
            </tr>

          <?php }else { ?>

            <?php foreach($libros as $librosForeach) { ?>
              <tr>
                  <th scope="row"><?php echo $librosForeach->getId(); ?></th>
                  <td><?php echo $librosForeach->getNombreLibro(); ?></td>
                  <td><?php echo $librosForeach->getAutor(); ?></td>
                  <td><?php echo $librosForeach->getCategoria(); ?></td>
                  <td class="text-center">
                      <button class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i> Editar
                      </button>
                      <button class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i> Eliminar
                      </button>
                  </td>
              </tr>
          <?php } } ?>
  
        </tbody>
    </table>
</div>

    <!-- Modal con formulario para agregar libro -->
    <div class="modal fade" id="addLibro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <div class="col my-2 mx-3">
                            <!-- Nombre del libro -->
                            <div class="row mb-4">
                                <label class="h5">Nombre del libro:</label>
                                <?php if (!count($_SESSION['autores']) > 0 && !count($_SESSION['categorias']) > 0) { ?>
                                    <input class="form-control" type="text" placeholder="Los viajes de Gulliver..." disabled>
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="nomLibro" placeholder="Los viajes de Gulliver..." required>
                                <?php } ?>
                            </div>

                            <!-- Autor -->
                            <div class="row mb-4">
                                <label class="h5">Nombre del autor:</label>
                                <?php if (!count($_SESSION['autores']) > 0) { ?>
                                    <div class="card text-center px-2 py-3 bg-light">
                                        <p class="mb-2">¡Aún no existen autores registrados! Haz click para registrar uno</p>
                                        <a class="btn btn-success mt-2" href="./addAutor.php">+ Agregar</a>
                                    </div>
                                <?php } else { ?>
                                    <select class="form-select" name="autor" required>
                                        <?php foreach ($_SESSION['autores'] as $autor) { ?>
                                            <option value="<?php echo $autor->getNombreAutor(); ?>"><?php echo $autor->getNombreAutor(); ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            </div>

                            <!-- Categoría -->
                            <div class="row mb-4">
                                <label class="h5">Categoría:</label>
                                <?php if (!count($_SESSION['categorias']) > 0) { ?>
                                    <div class="card text-center px-2 py-3 bg-light">
                                        <p class="mb-2">¡Aún no existen categorías registradas! Haz click para registrar una</p>
                                        <a class="btn btn-primary mt-2" href="./addCategoria.php">+ Agregar</a>
                                    </div>
                                <?php } else { ?>
                                    <select class="form-select" name="category" required>
                                        <?php foreach ($_SESSION['categorias'] as $categoria) { ?>
                                            <option value="<?php echo $categoria->getNombreCategoria(); ?>"><?php echo $categoria->getNombreCategoria(); ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
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
</body>


</html>