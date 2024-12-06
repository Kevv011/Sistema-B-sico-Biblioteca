<?php
require "../class/autor.php"; //Requerimiento de la clase Autor

session_start();

if(!isset($_SESSION['autores'])) { //Inicializacion del array
  $_SESSION['autores'] = [];
}

$autores = $_SESSION['autores']; //Array

if(isset($_POST['autor-form'])) {

  $id = count($autores) + 1;
  $nombreAutor = $_POST['nombre'];
  $pais = $_POST['pais'];
  $generoLit = $_POST['generoLit'];

  //Instancia
  $autor = new Autor($id, $nombreAutor, $pais, $generoLit);

  //Agregacion de elementos al array
  array_push($autores, $autor);

  //Mantener todos los elementos en la sesion
  $_SESSION['autores'] = $autores;

  //Redireccion al ser enviado el form
  header("location: addAutor.php");
  exit;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Autor</title>

  <!--ESTILOS-->
  <style>
    .autor-form {
      background: #e6e4df !important;
    }
  </style>
</head>

<body>

  <main>

  <?php include "../partials/navbar.php"; ?>

    <!-- Botones -->
    <div class="d-flex justify-content-center mt-4">
      <a class="btn btn-light rounded-0 border border-black" href="./addAutor.php">Ingresar un autor</a>
      <a class="btn btn-dark rounded-0" href="./addCategoria.php">Ingresar una categoria</a>
    </div>

    <?php if (!count($_SESSION['autores']) > 0 && !count($_SESSION['categorias']) > 0) { ?>
    <div class="alert alert-warning text-center mx-4 mt-4" role="alert">
      <i class="fas fa-exclamation-circle"></i> Ingresa al menos un autor para registrar un libro.
    </div>
    <?php } elseif (count($_SESSION['autores']) > 0 && !count($_SESSION['categorias']) > 0) { ?>
      <div class="alert alert-warning text-center mx-4 mt-4" role="alert">
      <i class="fas fa-exclamation-circle"></i> Existen autores registrados. Ingresa al menos una categoria para poder registrar un libro.
    </div>
    <?php } elseif (!count($_SESSION['autores']) > 0 && count($_SESSION['categorias']) > 0) { ?>
      <div class="alert alert-warning text-center mx-4 mt-4" role="alert">
      <i class="fas fa-exclamation-circle"></i> Existen categorias registradas. Ingresa al menos un autor para poder registrar un libro.
    </div>
    <?php }else { ?>
      <div class="alert alert-warning text-center mx-4 mt-4 d-flex flex-column align-items-center justify-content-center" role="alert">
      <div>
        <i class="fas fa-exclamation-circle fs-2"></i>
        <p>Existen autores y categorias. ¡Haz ingreso de un libro!</p>
      </div>
      <a class="btn btn-primary" href="./inicio.php">+ Ingresar libro</a>
    </div>
    <?php } ?>
        
    

    <!--FORM PARA INGRESAR UN AUTOR-->
    <div class="container">
      <form class="autor-form p-4 rounded-4 mt-4 border border-black" action="" method="post">
        <input type="hidden" name="autor-form" value="autor-form"> <!--INPUT PARA OBTENER DATOS DE AUTOR-->
        <input type="hidden" name="idAutor" value="<?php  ?>"> <!--INPUT PARA OBTENER ID-->

        <div class="col my-2 mx-3">

          <!--NOMBRE-->
          <div class="row mb-4">
            <label class="h5">Nombre del autor:</label>
            <input class="form-control" type="text" name="nombre" placeholder="Edgar Allan Poe..." required>
          </div>

          <!--Nacionalidad-->
          <div class="row mb-4">
            <label class="h5">Pais de Origen:</label>
            <input class="form-control" type="text" name="pais" placeholder="Estados Unidos..." required>
          </div>

          <!--GENERO LITERARIO-->
          <div class="row mb-4">
            <label class="h5">Genero Literario:</label>

            <select class="form-select" name="generoLit" required>
              <option selected>Selecciona un género literario</option>
              <option value="ficcion">Ficción</option>
              <option value="no_ficcion">No ficción</option>
              <option value="poesia">Poesía</option>
              <option value="drama">Drama</option>
              <option value="aventura">Aventura</option>
              <option value="ciencia_ficcion">Ciencia ficción</option>
              <option value="fantasia">Fantasía</option>
              <option value="romance">Romance</option>
              <option value="misterio">Misterio</option>
              <option value="terror">Terror</option>
              <option value="biografia">Biografía</option>
              <option value="ensayo">Ensayo</option>
              <option value="historico">Histórico</option>
              <option value="infantil">Infantil</option>
            </select>
          </div>
        </div>

        <!--BOTONES-->
        <div class="d-grid gap-2 col-6 mx-auto">
          <button class="btn btn-success" type="submit">Agregar</button>
        </div>

      </form>

      <!--TABLA DE RESULTADOS AÑADIDOS-->
      <div class="container my-5">
        <h2 class="text-center mb-4">Autores registrados</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead class="table-primary text-center">
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>País de origen</th>
                <th>Género Literario</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            if(count($autores) > 0) {
            
            foreach($autores as $autoresForeach) { ?>
              <tr class="text-center text-capitalize">
                <td><?php echo $autoresForeach->getId(); ?></td>
                <td><?php echo $autoresForeach->getNombreAutor(); ?></td>
                <td><?php echo $autoresForeach->getPais(); ?></td>
                <td><?php echo $autoresForeach->getGeneroLit(); ?></td>>
              </tr>

            <?php } } else { ?>
                    <tr>
                      <td colspan="4" class="text-center"><?php echo "Aún no hay registro de autores"; ?></td>
                    </tr>
            <?php } ?>

            </tbody>
          </table>
        </div>
      </div>


    </div>
  </main>

  <?php include "../partials/footer.php" ?>

</body>

</html>