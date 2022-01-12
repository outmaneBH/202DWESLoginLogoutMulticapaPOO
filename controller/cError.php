<?php

if (isset($_REQUEST['btndestroy'])) {
    $_SESSION['paginaEnCurso'] = 'login';
    session_destroy(); 
    header("Location:index.php");
    exit;
}

$code = $_SESSION['CodeError'];
$msg = $_SESSION['MsgError'];

$paginaEnCurso = 'error';
require_once $views['layout'];
