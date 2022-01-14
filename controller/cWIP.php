<?php
if (isset($_REQUEST['cancelwip'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location:index.php");
    exit;
}

$_SESSION['paginaAnterior']='inicio';
require_once $views['layout'];

?>