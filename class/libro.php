<?php

class Libro {

    //Propiedades
    private $id;
    private $nombreLibro;
    private $autor;
    private $categoria;
    
    //Constructor
    public function __construct($idParam, $nombreLibroParam, $autorParam, $categoriaParam) {

        $this->id = $idParam;
        $this->nombreLibro = $nombreLibroParam;
        $this->autor = $autorParam;
        $this->categoria = $categoriaParam;
    }

    //Metodos GETTERS
    public function getId() {
        return $this->id;
    }
    public function getNombreLibro() {
        return $this->nombreLibro;
    }
    public function getAutor() {
        return $this->autor;
    }
    public function getCategoria() {
        return $this->categoria;
    }

    //Metodos SETTERS
    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombreLibro = $nombre;
    }
    public function setAutor($autor) {
        $this->autor = $autor;
    }
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
}

?>