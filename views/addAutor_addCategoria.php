<?php
include "../partials/navbar.php"; //NAVBAR posee un session_start(), por ello no se especifica aqui
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar</title>
</head>

<body>
  <main>
    <div class="m-4 text-center">
      <h2><strong>Agregar autor o categoria</strong></h2>
    </div>

    <div class="container my-5 d-flex justify-content-center">
    <!-- Card -->
    <div class="card shadow-lg" style="width: 24rem; border-radius: 15px;">
      <div class="card-body text-center">
        <!-- Icono atractivo -->
        <div class="d-flex justify-content-center align-items-center mb-3">
          <div class="border border-black rounded-circle">
            <i class="fa-solid fa-plus fs-1 p-2"></i>
          </div>
        </div>

        <!-- Título -->
        <h4 class="card-title mb-3">¿Qué deseas agregar?</h4>

        <!-- Botones -->
        <div class="d-flex justify-content-around">
          <a class="btn btn-light rounded-0 border border-black" href="?form=agregar_autor">Ingresar un autor</a>
          <a class="btn btn-dark rounded-0" href="?form=agregar_categoria">Ingresar una categoria</a>
        </div>
      </div>
    </div>
  </div>

    <?php if(isset($_GET['form'])) { 
      $form = $_GET['form'];

      if($form == 'agregar_autor') {
        require "./addAutor.php";
      }
      elseif ($form == 'agregar_categoria') {
        require "./addCategoria.php";
      }
      else {
        header('location: addAutor_addCategoria.php');
      }
    }
    ?>
  </main>


</body>

</html>