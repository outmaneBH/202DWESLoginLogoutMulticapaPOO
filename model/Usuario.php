<?php
class Usuario {

    // Properties de la clase Usuario
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $fechaHoraUltimaConexionAnterior;
    private $perfil;

    
    /* constroctor */
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
       // $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        $this->perfil = $perfil;
    }

    /* get y set de codUsuario */

    function get_codUsuario() {
        return $this->codUsuario;
    }

    function set_name($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /* get y set de password */

    function get_password() {
        return $this->password;
    }

    function set_password($codUsuario) {
        $this->password = $password;
    }

    /* get y set de descUsuario */

    function get_descUsuario() {
        return $this->descUsuario;
    }

    function set_descUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    /* get y set de numAccesos */

    function get_numAccesos() {
        return $this->numAccesos;
    }

    function set_numAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }

    /* get y set de fechaHoraUltimaConexion */

    function get_fechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    function set_fechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    /* get y set de fechaHoraUltimaConexionAnterior */

    function get_fechaHoraUltimaConexionAnterior() {
        return $this->fechaHoraUltimaConexionAnterior;
    }

    function set_fechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior) {
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
    }

    /* get y set de perfil */

    function get_perfil() {
        return $this->perfil;
    }

    function set_perfil($perfil) {
        $this->perfil = $perfil;
    }
}

?>
