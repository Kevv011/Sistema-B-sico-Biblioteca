<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!--ESTILOS-->
  <style>
    .category-form {
      background: #e9c196 !important;
    }
  </style>
</head>

<body>

<main class="container">

<!--FORM PARA INGRESAR UN AUTOR-->
<div>
  <form class="category-form p-4 rounded-4 mt-4 border border-black" action="" method="post">
    <input type="hidden" name="autor-form" value="autor-form"> <!--INPUT PARA OBTENER DATOS DE AUTOR-->

    <div class="col my-2 mx-3">

      <!--NOMBRE-->
      <div class="row mb-4">
        <label class="h5">Nombre del autor:</label>
        <input class="form-control" type="text" name="book" placeholder="Edgar Allan Poe..." required>
      </div>

      <!--Nacionalidad-->
      <div class="row mb-4">
        <label class="h5">Pais de Origen:</label>
        <input class="form-control" type="text" name="book" placeholder="Estados Unidos..." required>
      </div>

      <!--GENERO LITERARIO-->
      <div class="row mb-4">
        <label class="h5">Genero Literario:</label>

        <select class="form-select" name="category" required>
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
            <th>#</th>
            <th>Nombre</th>
            <th>Género Literario</th>
            <th>Autor</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>El Principito</td>
            <td>Ficción</td>
            <td>Antoine de Saint-Exupéry</td>
            <td class="text-center">
              <button class="btn btn-success btn-sm">Editar</button>
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Cien años de soledad</td>
            <td>Realismo Mágico</td>
            <td>Gabriel García Márquez</td>
            <td class="text-center">
              <button class="btn btn-success btn-sm">Editar</button>
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Orgullo y prejuicio</td>
            <td>Romance</td>
            <td>Jane Austen</td>
            <td class="text-center">
              <button class="btn btn-success btn-sm">Editar</button>
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


</div>
</main>

</body>

</html>