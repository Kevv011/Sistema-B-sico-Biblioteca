<?php

class Libro {

    //Propiedades
    private $id;
    private $nombreLibro;
    private Autor $autor;
    private Categoria $categoria;
    
    //Constructor
    public function __construct($idParam, $nombreLibroParam, Autor $autorParam, Categoria $categoriaParam) {

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
    public function getAutor(): Autor {
        return $this->autor;
    }
    public function getCategoria(): Categoria {
        return $this->categoria;
    }

    //Metodos SETTERS
    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombreLibro;
    }
    public function setAutor(Autor $autor) {
        $this->autor = $autor;
    }
    public function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
    }
}

?>