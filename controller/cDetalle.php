<?php
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location:index.php");
    exit;
}


$_SESSION['paginaAnterior']='inicioPrivado';
require_once $views['layout'];

