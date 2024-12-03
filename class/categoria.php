<?php
class Categoria {

    //Propiedades
    private $id;
    private $nombreCategoria;
    private $codCategoria;

    //Constructor
    public function __construct($idParam, $nombreCategoriaParam, $codCategoriaParam) {

        $this->id = $idParam;
        $this->nombreCategoria = $nombreCategoriaParam;
        $this->codCategoria = $codCategoriaParam;
    }

    //Metodos GETTER
    public function getId() {
        return $this->id;
    }
    public function getNombreCategoria() {
        return $this->nombreCategoria;
    }
    public function getcodCategoria() {
        return $this->codCategoria;
    }
}