<?php

class Libro {

    //Propiedades
    private $id;
    private $nombreLibro;
    private $autor;
    private $categoria;
    private $estado;
    
    //Constructor
    public function __construct($idParam, $nombreLibroParam, $autorParam, $categoriaParam, $estadoParam) {

        $this->id = $idParam;
        $this->nombreLibro = $nombreLibroParam;
        $this->autor = $autorParam;
        $this->categoria = $categoriaParam;
        $this->estado = $estadoParam;
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
    public function getEstado() {
        return $this->estado;
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
    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>