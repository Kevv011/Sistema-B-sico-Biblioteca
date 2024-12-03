<?php
require "./public/login_process.php"; //Funcionamiento de simulacion de LOGIN
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--CDN FONTAWESOME-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            font-size: 1.8rem;
            color: #333333;
            margin-bottom: 20px;
        }

        .login-container .form-control {
            margin-bottom: 15px;
        }

        .login-container .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>
    <main class="login-container text-center">
        <!-- Título -->
        <h1 class="mb-4">
            <i class="fas fa-book-reader me-2"></i> BIBIOTECH Login
        </h1>

        <!-- Formulario -->
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Escribe tu nombre" required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Ingresar
            </button>
        </form>
    </main>

    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
