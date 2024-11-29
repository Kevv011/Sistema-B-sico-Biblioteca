<?php  
include "../public/login_process.php";
include "../partials/navbar.php"; //NAVBAR posee un session_start(), por ello no se especifica aqui

//Inicializacion de Array para guardar libros y hacer el CRUD
if(isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
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

    <main>

        <!--TITULO-->
        <section>
            <h1>BIBLIOTECH</h1>
        </section>

        <!--TABLA DE REGISTRO DE LIBROS Y FILTROS DE BUSQUEDA-->

        
    </main>
    
</body>
</html>