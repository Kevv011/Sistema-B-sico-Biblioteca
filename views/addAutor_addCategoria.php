<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar</title>
  <!--CSS BOOTSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

  <?php include "../partials/navbar.php"; ?>

  <main class="flex-grow-1">
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
            <a class="btn btn-light rounded-0 border border-black" href="./addAutor.php">Ingresar un autor</a>
            <a class="btn btn-dark rounded-0" href="./addCategoria.php">Ingresar una categoria</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include "../partials/footer.php" ?>

</body>

</html>
