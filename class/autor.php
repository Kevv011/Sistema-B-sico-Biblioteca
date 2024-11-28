<?php
class Autor {

    //Propiedades
    private $id;
    private $nombreAutor;

    //Constructor
    public function __construct($idParam, $nombreAutorParam) {

        $this->id = $idParam;
        $this->nombreAutor = $nombreAutorParam;
    }

    //Metodos GETTER
    public function getId() {
        return $this->id;
    }
    public function getNombreAutor() {
        return $this->nombreAutor;
    }
}