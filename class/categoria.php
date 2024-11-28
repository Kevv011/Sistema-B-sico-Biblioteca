<?php
class Categoria {

    //Propiedades
    private $id;
    private $nombreCategoria;

    //Constructor
    public function __construct($idParam, $nombreCategoriaParam) {

        $this->id = $idParam;
        $this->nombreCategoria = $nombreCategoriaParam;
    }

    //Metodos GETTER
    public function getId() {
        return $this->id;
    }
    public function getNombreCategoria() {
        return $this->nombreCategoria;
    }
}