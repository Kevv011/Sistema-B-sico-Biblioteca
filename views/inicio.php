<?php  
include "../class/autor.php";
include "../class/categoria.php";
include "../class/libro.php";

session_start();

if(!isset($_SESSION['autores'], $_SESSION['categorias'])) { //Validacion si no hay autores y categorias creadas
  echo "Aun no existen autores o categrias definidas";
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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Biblioteca</title>
</head>

<body>
  <?php include "../partials/navbar.php"; ?>

  <main>
<?php print_r($libros); ?>
    <!--TITULO-->
    <section>
      <h1>BIBLIOTECH</h1>
    </section>

    <!--TABLA DE REGISTRO DE LIBROS Y FILTROS DE BUSQUEDA-->
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
              <input class="form-control" type="text" name="nomLibro" placeholder="Los viajes de Gulliver..." required>
            </div>

            <!--AUTOR-->
            <div class="row mb-4">
              <label class="h5">Nombre del autor:</label>

              <!--PHP para mandar a llamar a autores registrados en AddAutor-->
              <?php if(!count($_SESSION['autores']) > 0) { ?>

                <div>
                  ¡Aun no existen autores registrados!. Haz click para registrar uno 
                  <a href="./addAutor.php">+ Agregar</a>
                </div>
              
              <?php } else {?>

              <select class="form-select" name="autor" required>
                <?php foreach($_SESSION['autores'] as $autor) { ?>
                  <option value="<?php echo $autor->getNombreAutor(); ?>"><?php echo $autor->getNombreAutor(); ?></option>
                <?php } } ?>
              </select>
            </div>
            
            <!--CATEGORIA-->
            <div class="row mb-4">
              <label class="h5">Categoria:</label>

              <!--PHP para mandar a llamar a categorias registrados en AddCategoria-->
              <?php if(!count($_SESSION['categorias']) > 0) { ?>

                <div>
                  ¡Aun no existen categorias registradas!. Haz click para registrar una
                  <a href="./addCategoria.php">+ Agregar</a>
                </div>
              
              <?php } else {?>

              <select class="form-select" name="category" required>
                <?php foreach($_SESSION['categorias'] as $categoria) { ?>
                  <option value="<?php echo $categoria->getNombreCategoria(); ?>"><?php echo $categoria->getNombreCategoria(); ?></option>
                <?php } } ?>
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