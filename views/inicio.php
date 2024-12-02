<?php  
include "../partials/navbar.php"; //NAVBAR posee un session_start(), por ello no se especifica aqui
require "../class/libro.php";

//Inicializacion de Array para guardar libros y hacer el CRUD
if(!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}

$libros = $_SESSION['libros'];

//Obtencion de las variables de los campos con POST
if(isset($_POST['book'], $_POST['autor'], $_POST['category'])) {
  
  $idLibro = count($libros) + 1;
  $nombreLibro = trim($_POST['book']);
  $nombreAutor = trim($_POST['autor']);
  $nombreCategoria = trim($_POST['category']);

  $libro = new Libro($nombreLibro, $nombreAutor, $nombreCategoria ); //Instancia de clase Libro

  $libros[] = $libro;
  print_r($libros);
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<body>

  <main>

    <!--TITULO-->
    <section>
      <h1>BIBLIOTECH</h1>
    </section>

    <!--TABLA DE REGISTRO DE LIBROS Y FILTROS DE BUSQUEDA-->

    <?php print_r($libros); ?>
  </main>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLibro">
    Agregar Libro
  </button>

  <!-- Modal con FORM para agregar un libro-->
  <div class="modal fade" id="addLibro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Libro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!--FORM PARA INGRESAR UN LIBRO-->
        <div class="modal-body">
          <form action="" method="post">

          <div class="col my-2 mx-3">
            
            <!--LIBRO-->
            <div class="row mb-4">
              <label class="h5">Nombre del libro:</label>
              <input class="form-control" type="text" name="book" placeholder="Los viajes de Gulliver..." required>
            </div>

            <!--AUTOR-->
            <div class="row mb-4">
              <label class="h5">Nombre del autor:</label>

              <select class="form-select" name="autor" required>
                <option selected>Selecciona un autor</option>
                <option value="<?php  ?>">One</option>
                <option value="ee">Two</option>
                <option value="ii">Three</option>
              </select>
            </div>
            
            <!--CATEGORIA-->
            <div class="row mb-4">
              <label class="h5">Categoria:</label>

              <select class="form-select" name="category" required>
                <option selected>Selecciona una categoria</option>
                <option value="aa">One</option>
                <option value="ee">Two</option>
                <option value="ii">Three</option>
              </select>
            </div>
          </div>

          <!--BOTONES-->
          <div class="buttons text-center">
            <button class="btn btn-primary">Agregar</button>
          </div>
            
          </form>
          
        </div>
        
      </div>
    </div>
  </div>

</body>

</html>