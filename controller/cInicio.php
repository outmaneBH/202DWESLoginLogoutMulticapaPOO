<?php
/*Volvernos a login cuando se pulsa logout*/
if (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location:index.php");
    exit;
}

/*cambiamos la vista a editar el usuario*/
if (isset($_REQUEST['editPerfil'])) {
    $_SESSION['vistaEnCurso'] = $controllers['editar'];
    header("Location:index.php");
    exit;
}
/*cambiamos la vista a borrar para el usuario puede eliminar su cuenta*/
if (isset($_REQUEST['deleteAccount'])) {
    $_SESSION['vistaEnCurso'] = $controllers['borrar'];
    header("Location:index.php");
    exit;
}

/*Meter la session en variables */
$objectUsuario = $_SESSION['usuario202DWESAppLoginLogout'];

/*Los variables*/
$USER=$objectUsuario->get_codUsuario();
$NumAcces=$objectUsuario->get_numAccesos();
$Desc=$objectUsuario->get_descUsuario();
$LastTimeAccess= $_SESSION['T01_FechaHoraUltimaConexionAnterior'];


/*meter la vista de inicio en la variable y devolver layout */
$vistaEncurso=$views['inicio'];
require_once $views['layout'];
?>

