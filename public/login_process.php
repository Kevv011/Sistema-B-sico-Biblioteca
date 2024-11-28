<?php

session_start();

if(isset($_POST['username'], $_POST['password'])) {

    //Capturas la informacion y almacenarla en la sesion
    $_SESSION['$username'] = trim($_POST['username']);
    $_SESSION['$password'] = trim($_POST['password']);

    //Dirigirse a la pagina de INICIO de la biblioteca
    header('location: views/inicio.php');
}

?>