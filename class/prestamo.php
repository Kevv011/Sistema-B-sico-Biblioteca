<?php

class Prestamo {

    //Propiedades
    private $idPrestamo;
    private $idLibro;
    private $nombreUsuario;
    private $fechaPrestamo;
    private $fechaDevolucion;

    //Constructor
    public function __construct($idPrestamoParam, $idLibroParam, $nombreUsuarioParam, $fechaPrestamoParam, $fechaDevolucionParam) {
        $this->idPrestamo = $idPrestamoParam;
        $this->idLibro = $idLibroParam;
        $this->nombreUsuario = $nombreUsuarioParam;
        $this->fechaPrestamo = $fechaPrestamoParam;
        $this->fechaDevolucion = $fechaDevolucionParam;
    }

    // Getters
    public function getIdPrestamo() {
        return $this->idPrestamo;
    }

    public function getIdLibro() {
        return $this->idLibro;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    public function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }
}

?>
