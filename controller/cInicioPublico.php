<?php
/*Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar*/
if (isset($_REQUEST['btnlogin'])) {
    $_SESSION['paginaEnCurso'] = $controllers['login'];
    header("Location:index.php");
    exit;
}


/* meter la vista de login en un variable y devolver layout */
$paginaEnCurso = $views['inicioPublico'];
require_once $views['layout'];
?>
