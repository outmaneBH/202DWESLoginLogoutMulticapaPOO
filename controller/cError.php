<?php

if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['error']->get_paginaSiguiente;
    header("Location:index.php");
    exit;
}

/* creamos array donde almacenamos los datos de la session del Error */

$aError = [
    'codError' => $_SESSION['error']->get_codError(),
    'msgError' => $_SESSION['error']->get_descError(),
    'archivoError' => $_SESSION['error']->get_archivoError(),
    'lineaError' => $_SESSION['error']->get_lineaError()
];
require_once $views['layout'];
?>