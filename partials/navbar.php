<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CDN FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">

    <!-- Estilos CSS -->
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
    <!-- Navbar principal -->
    <nav class="main-nav navbar navbar-expand-sm">
        <div class="container-fluid px-5">
            <!-- Logotipo -->
            <a class="navbar-brand d-flex gap-3 align-items-center" href="../views/inicio.php">
                <div class="logo-container rounded-circle p-3 bg-body-tertiary">
                    <img class="img-fluid" src="../assets/img/logo.png" alt="Logotipo" width="60">
                </div>
                <h4 class="text-white d-none d-sm-block"><strong>BIBLIOTECH</strong></h4>
            </a>

            <!-- Botón hamburguesa -->
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>

            <!-- Menú collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto text-center d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-white fs-5" href="../views/addAutor_addCategoria.php">+Agregar</a>
                    </li>
                    <li class="nav-item">
                        <a href="../views/prestamoLibro.php" class="btn text-white fs-5">Prestamos</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn text-white fs-5" data-bs-toggle="modal" data-bs-target="#logOutModal">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar secundaria -->
    <?php if (basename($_SERVER['PHP_SELF']) === 'inicio.php') { ?>
        <div class="p-0 m-0"></div>
    <?php } else { ?>
        <nav class="second-nav pt-2 border-bottom">
            <div class="container-fluid text-center">
                <span class="navbar-brand h1 fs-5 d-flex flex-start align-items-center">
                    <button class="btn btn-secondary py-0 px-3" onclick="history.back();">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                </span>
            </div>
        </nav>
    <?php } ?>

    <!-- Modal de cierre de sesión -->
    <div class="modal fade" id="logOutModal" tabindex="-1" aria-labelledby="logOutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Encabezado del modal -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="logOutModalLabel">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="modal-body text-center">
                    <p class="fs-5">¿Estás seguro de que deseas cerrar sesión?</p>
                    <p class="text-muted">Todos tus cambios guardados serán eliminados de esta sesión.</p>
                </div>

                <!-- Pie del modal -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <form action="../public/logOut_process.php" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
