<?php

session_start();

if(isset($_POST['username'])) {

    //Capturas la informacion y almacenarla en la sesion
    $_SESSION['$username'] = trim($_POST['username']);

    //Dirigirse a la pagina de INICIO de la biblioteca
    header('location: views/inicio.php');
}

?>