<?php
class AppError {

    // Properties de la clase Usuario
    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
    private $paginaSiguiente;


    
    /* constroctor */
    function __construct($codError, $descError, $archivoError, $lineaError, $codXdebug, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->codXdebug = $codXdebug;
        $this->paginaSiguiente = $paginaSiguiente;
    }

    /* get y set de codUsuario */

    function get_codError() {
        return $this->codError;
    }

    function set_codError($codError) {
        $this->codError = $codError;
    }

    /* get y set de password */

    function get_descError() {
        return $this->descError;
    }

    function set_descError($descError) {
        $this->descError = $descError;
    }

    /* get y set de archivoError */

    function get_archivoError() {
        return $this->archivoError;
    }

    function set_archivoError($archivoError) {
        $this->archivoError = $archivoError;
    }

    /* get y set de numAccesos */

    function get_lineaError() {
        return $this->lineaError;
    }

    function set_lineaError($lineaError) {
        $this->lineaError = $lineaError;
    }

    

    /* get y set de fechaHoraUltimaConexionAnterior */

    function get_paginaSiguiente() {
        return $this->paginaSiguiente;
    }

    function set_fechaHoraUltimaConexionAnterior($paginaSiguiente) {
        $this->paginaSiguiente = $paginaSiguiente;
    }

   
}
