<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--CDN FONTAWESOME-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">

    <!--ESTILOS CSS-->
    <style>
        .main-nav {
            background: #7e0707 !important;
        }
        .second-nav {
            background: #e6dbe6 !important;
        }
    </style>
</head>

<body>
    <nav class="main-nav navbar navbar-expand-sm">

        <div class="container-fluid px-5 d-flex justify-content-between align-items-center">
            <!--LOGOTIPO-->
            <a class="navbar-brand d-flex gap-3 align-items-center" href="#">
                <div class="logo-container rounded-circle p-3 bg-body-tertiary">
                    <img class="img-fluid" src="../assets/img/logo.png" alt="Logotype" width="60">
                </div>
                <h4 class="text-white d-none d-sm-block"><strong>BIBLIOTECH</strong></h4>
            </a>

            <!--BOTON HAMBURGUESA-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--LISTA DE ELEMENTOS DEL NAV-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">+Agregar</a>

                </li>
                <li class="nav-item">
                  <a class="nav-link text-white fs-5" href="#">Cerrar Sesión</a>
                </li>
              </ul>
        </div>
    </nav>

    <!--NAV SECUNDARIO-->
    <nav class="second-nav p-2">
        <div class="container-fluid text-center">
            <span class="navbar-brand h1 p-3 fs-5 p-3">¡Bienvenido, <?php echo  $_SESSION['$username']; ?>!</span>
        </div>
    </nav>

    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>


</html>