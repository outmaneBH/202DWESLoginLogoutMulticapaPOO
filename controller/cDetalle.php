<?php
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location:index.php");
    exit;
}

$paginaEnCurso = 'detalle';
$_SESSION['paginaAnterior']='inicio';
require_once $views['layout'];

