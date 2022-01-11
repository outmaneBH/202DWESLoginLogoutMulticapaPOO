<?php

/*
 * @author: OUTMANE BOUHOU
 * @updated: 21/12/2021
 * @since : Desarrollo de una aplicación (Proyecto LoginLogout MultiCapa) con control de acceso e identificación del
  usuario basado en un formulario */

/* llamar a las configuraciones de Toda la applicacion */
require_once 'config/confApp.php';
require_once 'config/confDBPDO.php';


/* Si no hay ningun vista en curso mostramos el login sino mostramos la vista en curso */
if (!isset($_SESSION['paginaEnCurso'])) {
    $_SESSION['paginaEnCurso']='inicioPublico';
}

require_once $controllers[$_SESSION['paginaEnCurso']];
?>

