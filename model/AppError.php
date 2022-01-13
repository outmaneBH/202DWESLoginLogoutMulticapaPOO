<?php
class AppError {

    // Properties de la clase Usuario
    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
    private $paginaSiguiente;


    
    /* constroctor */
    function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }

    
    function get_codError() {
        return $this->codError;
    }

    function set_codError($codError) {
        $this->codError = $codError;
    }

 

    function get_descError() {
        return $this->descError;
    }

    function set_descError($descError) {
        $this->descError = $descError;
    }

   

    function get_archivoError() {
        return $this->archivoError;
    }

    function set_archivoError($archivoError) {
        $this->archivoError = $archivoError;
    }

  

    function get_lineaError() {
        return $this->lineaError;
    }

    function set_lineaError($lineaError) {
        $this->lineaError = $lineaError;
    }

    

    function get_paginaSiguiente() {
        return $this->paginaSiguiente;
    }

    function set_fechaHoraUltimaConexionAnterior($paginaSiguiente) {
        $this->paginaSiguiente = $paginaSiguiente;
    }

   
}
