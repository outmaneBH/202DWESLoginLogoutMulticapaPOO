<?php

/* Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar */
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location:index.php");
    exit;
}
$entradaOK = true;
/* definir un array para alamcenar errores del username y la password */
$aErrores = ['username' => null,
    'password' => null
];

if (isset($_REQUEST['btnlogin'])) {
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo username esta rellenado
    $aErrores["username"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['username'], 8, 2, OBLIGATORIO);

    //Comprobar si el campo password esta rellenado
    $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 3, 2, OBLIGATORIO);

    /*Si hay algun error devolvernos el mensaje de $error*/
    if ($aErrores["username"] || $aErrores["password"]) {
        $error = "! Algo mal ¡";
    }


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
    
    /*devolver el usuario si esta si esta valido */
    $objetoUsuario = UsuarioPDO::validarUsuario($_REQUEST['username'], $_REQUEST['password']);

    if ($objetoUsuario) {
        
        $oUsuario=UsuarioPDO::registrarUltimaConexion($objetoUsuario); /*devolver el objeto usuario cambiado   */
        $_SESSION['usuario202DWESLoginLogoutMulticapaPOO'] = $oUsuario;
        
        /* LLevamos el usuario a la pagina de inicio */
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('Location: index.php');
        exit;
    }
} else {
    //Mostrar el formulario hasta que lo rellenemos correctamente
    //Mostrar formulario

    $_SESSION['paginaAnterior'] = 'inicioPublico';
    require_once $views['layout'];
}
?>
