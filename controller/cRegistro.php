<?php

/* Si el usuario ha pulsado en cancelar cambiamos la vista y devolver la pagina de login */
if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['vistaEnCurso'] = $controllers['login'];
    header("Location:index.php");
    exit;
}
/* Varible de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del username,password y description */
$aErrores = ['username' => null,
    'password' => null,
    'DescUsuario' => null
];

/* Array de respuestas inicializado a null */
$aRespuestas = ['username' => null,
    'password' => null,
    'DescUsuario' => null
];

$error = "";
/* comprobar si ha pulsado el button entrar */
if (isset($_REQUEST['btncreate'])) {
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    //Validar entrada
    //Comprobar si el campo DescUsuario esta rellenado
    $aErrores["DescUsuario"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 1, OBLIGATORIO);

    //Comprobar si el campo username esta rellenado
    $aErrores["username"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['username'], 8, 2, OBLIGATORIO);

    //Comprobar si el campo password esta rellenado
    $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 3, OBLIGATORIO);

    /* meter el error si este usuario ye tiene cuenta antes */
    if ($aErrores["username"] == null) {
        $aErrores["username"] = UsuarioPDO::validarCodNoExiste($_REQUEST['username']);
        $error = $aErrores["username"];
    }

    /* recorrer el array de errores */
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
    /* Insertamos el nuevo usuario y hagamos la actualizacion de este usuario  */
    UsuarioPDO::altaUsuario($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['DescUsuario']);
    $objetoUsuario = UsuarioPDO::validarUsuario($_REQUEST['username'], $_REQUEST['password']);

    /* Si todo esta bien metemos su datos en la session y cambiamos la vista a inicio */
    if ($objetoUsuario) {
        $_SESSION['usuario202DWESAppLoginLogout'] = $objetoUsuario;
        $ultimaConexionAnterior = $objetoUsuario->get_fechaHoraUltimaConexion();
        if ($ultimaConexionAnterior != null) {
            $_SESSION['T01_FechaHoraUltimaConexionAnterior'] = $ultimaConexionAnterior;
        }
        //Se dirige al usuario al inicio
        $_SESSION['vistaEnCurso'] = $controllers['inicio'];
        header('Location: index.php');
        exit;
    }
} else {
    //Mostrar el formulario hasta que lo rellenemos correctamente
    //Mostrar formulario

    /* meter la vista de registrar en un variable y devolver layout */
    $vistaEncurso = $views['registrar'];
    require_once $views['layout'];
}
?>
