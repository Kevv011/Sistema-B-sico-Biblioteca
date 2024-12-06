<?php  
include "../class/autor.php";
include "../class/categoria.php";
include "../class/libro.php";

session_start();

if(!isset($_SESSION['autores'], $_SESSION['categorias'])) { //Inicializa los arrays al iniciar la sesion
  $_SESSION['categorias'] = [];
  $_SESSION['autores'] = [];
}

//Inicializacion de Array para guardar libros y hacer el CRUD
if(!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}

$libros = $_SESSION['libros']; //Array de libros

if(isset($_POST['librosForm'])) { //Contenido que se manda del form de CREACION

  //Obtencion de las variables de los campos con POST
  if(isset($_POST['nomLibro'], $_POST['autor'], $_POST['category'], $_POST['estado'])) {
    
    $id = count($libros) + 1;
    $nombreLibro = $_POST['nomLibro'];
    $nombreAutor = $_POST['autor'];
    $nombreCategoria = $_POST['category'];
    $estado = $_POST['estado'];
  
    $libro = new Libro($id, $nombreLibro, $nombreAutor, $nombreCategoria, $estado); //Instancia
  
    $libros[] = $libro;
  
    $_SESSION['libros'] = $libros;
  
    //Redireccion al ser enviado el form
    header("location: inicio.php");
    exit;
  }
}

//Funcion para obtener una aerolinea por su ID
function obtenerId($id, $libros) {
    foreach($libros as $libro) {
        if($libro->getId() == $id) {
            return $libro;
        }
    }
  }

  //Actualizar un registro de libro
  if(isset($_POST['updateBookForm'])) {
    foreach($libros as $libroEditado) {

        if($libroEditado->getId() == $_POST['id']) {
            $libroEditado->setNombre($_POST['editNombre']);
            $libroEditado->setAutor($_POST['editAutor']);
            $libroEditado->setCategoria($_POST['editCategoria']);    
        }
    }
    header("location: inicio.php");
  }

  //Eliminacion de un libro
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    foreach($libros as $key => $libro){
        if($libro->getId() == $id){
            unset($libros[$key]);
            break;
        }
    }
    $_SESSION['libros'] = $libros;
    header("location: inicio.php"); 
   }

   //Busqueda de un libro
   $busquedaEncontrada = []; //Array que guardara al resultado encontrado

   if(isset($_GET['buscarLibro'])) { //Obtencion del input de busqueda
    $buscar = trim($_GET['buscarLibro']);

    foreach($libros as $libroBuscar) {

        //stripos busca un elemento sin importar mayus y minus
        if(stripos($libroBuscar->getNombreLibro(), $buscar) !== false) {
            $busquedaEncontrada[] = $libroBuscar;
        }
    }
   }
?>