<?php
/* Si el usuario ha pulsado en borrarcuenta cambiamos la vista y devolver la pagina de borrarcuenta */
if (isset($_REQUEST['btndelete'])) {
    $_SESSION['vistaEnCurso'] = $controllers['borrar'];
    header("Location:index.php");
    exit;
}

/* Si el usuario ha pulsado en cancelar cambiamos la vista y devolver la pagina de inicio */
if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['vistaEnCurso'] = $controllers['inicio'];
    header("Location:index.php");
    exit;
}
/* Si el usuario ha pulsado en cambiarpassword cambiamos la vista y devolver la pagina de Password */
if (isset($_REQUEST['btnupdatePass'])) {
    // $_SESSION['vistaEnCurso'] = $controllers['inicio'];
    header("Location:error/enConstruccion.html");
    exit;
}

/* Varible de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del DescUsuario */
$aErrores = [
    'DescUsuario' => null
];
if (isset($_REQUEST['btnupdate'])) {
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo DescUsuario esta rellenado
    $aErrores["DescUsuario"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 1, OBLIGATORIO);

//recorrer el array de errores
    foreach ($aErrores as $nombreCampo => $value) {
        //Comprobar si el campo ha sido rellenado
        if ($value != null) {
            $_REQUEST[$nombreCampo] = "";
            // cuando encontremos un error
            $entradaOK = false;
        }
    }
} else {
    //El formulario no se ha rellenado nunca
    $entradaOK = false;
}
if ($entradaOK) {
    //Tratamiento del formulario - Tratamiento de datos OK
    //Si los datos estan correctos
    $CodUsuario = $_SESSION['usuario202DWESAppLoginLogout']->get_codUsuario(); //metemos el codigo de la session en un variable

    $updateUsuario = UsuarioPDO::modificarUsuario($_REQUEST['DescUsuario'], $CodUsuario); //hagamos la actualizacion

    if ($updateUsuario) {//Si es true cambamos la descripcion de la session con set_descUsuario y cambiar vista a inicio.
        $_SESSION['usuario202DWESAppLoginLogout']->set_descUsuario($_REQUEST['DescUsuario']);
        $_SESSION['vistaEnCurso'] = $controllers['inicio'];
        header('Location: index.php');
        exit;
    }
} else {
    //Mostrar el formulario hasta que lo rellenemos correctamente
    //Mostrar formulario

    /* meter la vista de editar en un variable y devolver layout */
    $vistaEncurso = $views['editar'];
    require_once $views['layout'];
}
?>