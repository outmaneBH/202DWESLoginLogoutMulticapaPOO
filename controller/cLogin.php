<?php
/*Si el usuario ha pulsado en registrar cambiamos la vista y devolver la pagina de registrar*/
if (isset($_REQUEST['cancel'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header("Location:index.php");
    exit;
}

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

    if (!$aErrores["username"] || !$aErrores["password"]) {
        /* validamos el usuario si existe */
        $objetoUsuario = UsuarioPDO::validarUsuario($_REQUEST['username'], $_REQUEST['password']);

        if ($objetoUsuario) {
            
            $_SESSION['usuario202DWESLoginLogoutMulticapaPOO'] = $objetoUsuario;//metemos en la session el usuario seleccionado
            
            $ultimaConexionAnterior = $objetoUsuario->get_fechaHoraUltimaConexion();
            if ($ultimaConexionAnterior != null) {
                $_SESSION['T01_FechaHoraUltimaConexionAnterior'] = $ultimaConexionAnterior;//ademas alamcenamos la ultimaEntrada
            }
            
            /*LLevamos el usuario a la pagina de inicio*/
            $_SESSION['paginaEnCurso'] = 'inicio';
            header('Location: index.php');
            exit;
        }
    } else {
        $error = "! Algo mal ¡";
    }
}

/* meter la vista de login en un variable y devolver layout */
$paginaEnCurso = 'login';
require_once $views['layout'];
?>
