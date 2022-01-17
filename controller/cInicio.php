<?php

/* Volvernos a login cuando se pulsa logout */
if (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location:index.php");
    exit;
}
if (isset($_REQUEST['detalle'])) {
     $_SESSION['paginaEnCurso'] = 'detalle';
    header("Location:index.php");
    exit;
}
if (isset($_REQUEST['mtoDepartamentos'])) {
    $_SESSION['paginaEnCurso'] = 'wip';
    header("Location:index.php");
    exit;
}
/* cambiamos la vista a editar el usuario */
if (isset($_REQUEST['editPerfil'])) {
    $_SESSION['paginaEnCurso'] = 'editar';
    header("Location:index.php");
    exit;
}
/* cambiamos la vista a borrar para el usuario puede eliminar su cuenta */
if (isset($_REQUEST['deleteAccount'])) {
    $_SESSION['paginaEnCurso'] = 'borrar';
    header("Location:index.php");
    exit;
}

/* Meter la session en un array de variables */
$objectUsuario = $_SESSION['usuario202DWESLoginLogoutMulticapaPOO'];
$aInicioPrivado=[
    'codUsuario'=>$objectUsuario->get_codUsuario(),
    'descUsuario'=>$objectUsuario->get_descUsuario(),
    'numConexiones'=>$objectUsuario->get_numConexiones(),
    'fechaHoraUltimaConexionAnterior'=>$objectUsuario->get_fechaHoraUltimaConexionAnterior(),
    'perfil'=>$objectUsuario->get_perfil()
];

$_SESSION['paginaAnterior']='login';
require_once $views['layout'];
?>

