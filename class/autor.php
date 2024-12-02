<?php
class Autor {

    //Propiedades
    private $id;
    private $nombreAutor;
    private $pais;
    private $generoLit;

    //Constructor
    public function __construct($idParam, $nombreAutorParam, $paisParam, $generoLitParam) {

        $this->id = $idParam;
        $this->nombreAutor = $nombreAutorParam;
        $this->pais = $paisParam;
        $this->generoLit = $generoLitParam;
    }

    //Metodos GETTER
    public function getId() {
        return $this->id;
    }
    public function getNombreAutor() {
        return $this->nombreAutor;
    }
    public function getPais() {
        return $this->pais;
    }
    public function getGeneroLit() {
        return $this->generoLit;
    }
}