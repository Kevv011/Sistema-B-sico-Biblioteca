<?php 
require "../class/categoria.php"; //Agregando Clase Categoria

session_start();

if(!isset($_SESSION['categorias'])) { //Inicializando array si no lo estuviera
  $_SESSION['categorias'] = [];
}

$categorias =  $_SESSION['categorias']; //Array

if(isset($_POST['category-form'])) { //Obtencion de datos del formulario

  $id = count($categorias) + 1;
  $nomCategoria = $_POST['categoria'];
  $codCategoria = $_POST['codCategoria'];

  $categoria = new Categoria($id, $nomCategoria, $codCategoria); //Instancia

  $categorias[] = $categoria; //Ingreso de datos por medio del objeto al array

  $_SESSION['categorias'] = $categorias; //Mantener datos en la sesion

  //Redireccion al ser enviado el form
  header("location: addCategoria.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Categoria</title>

  <!--ESTILOS-->
  <style>
    .category-form {
      background: #e9c196 !important;
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
      <i class="fas fa-exclamation-circle"></i> Ingresa al menos una categoria para registrar un libro.
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

    <!--FORM PARA INGRESAR UNA CATEGORIA-->
    <div class="container">
      <form class="category-form p-4 rounded-4 mt-4 border border-black" action="" method="post">
        <input type="hidden" name="category-form" value="category-form"> <!--INPUT PARA OBTENER DATOS DE LA CATEGORIA-->

        <div class="col my-2 mx-3">

          <!--NOMBRE CATEGORIA-->
          <div class="row mb-4">
            <label class="h5">Categoria de libro:</label>
            <input class="form-control" type="text" name="categoria" placeholder="Suspenso..." required>
          </div>

          <!--COD CATEGORIA-->
          <div class="row mb-4">
            <label class="h5">Código Categoria (Código único para nombrar una categoria):</label>
            <input class="form-control" type="text" name="codCategoria" placeholder="SPS-001..." required>
          </div>

          <!--BOTONES-->
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success" type="submit">Agregar</button>
          </div>
      </form>
    </div>

    <div class="container">

      <!--TABLA DE RESULTADOS AÑADIDOS-->
      <div class="container my-5">
        <h2 class="text-center mb-4">Autores registrados</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead class="table-primary text-center">
              <tr>
                <th>Id</th>
                <th>Categoria de libro</th>
                <th>Código de Categoria</th>
              </tr>
            </thead>
            <tbody class="text-center text-capitalize">

            <?php if(!count($categorias) > 0) { ?>
              <tr>
                <td colspan="3">Aún no existen registros de categorias</td>
              </tr>
            <?php }else { ?>
              
            <?php foreach($categorias as $categoriasForeach) { ?>
              <tr>
                <td><?php echo $categoriasForeach->getId(); ?></td>
                <td><?php echo $categoriasForeach->getNombreCategoria(); ?></td>
                <td><?php echo $categoriasForeach->getcodCategoria(); ?></td>
              </tr>
            <?php } } ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <?php include "../partials/footer.php" ?>

</body>

</html>