<?php

if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location:index.php");
    exit;
}
if (isset($_REQUEST['btnupdate'])) {
    $_SESSION['paginaEnCurso'] = 'wip';
    header("Location:index.php");
    exit;
}

/* Varible de entrada correcta inicializada a true */
$entradaOK = true;

/* definir un array para alamcenar errores del nombre y la altura */
$aErrores = ['password' => null,
    'password1' => null,
    'password2' => null
];

/* Array de respuestas inicializado a null */
$aRespuestas = ['password' => null,
    'password1' => null,
    'password2' => null
];

$error = "";


/* comprobar si ha pulsado el button entrar */
if (isset($_REQUEST['btnupdate'])) {
    $entradaOK = false;
//Para cada campo del formulario: Validar entrada y actuar en consecuencia
//Validar entrada
//Comprobar si el campo password esta rellenado
    $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 1, 2, OBLIGATORIO);

//Comprobar si el campo password esta rellenado
    $aErrores["password1"] = validacionFormularios::validarPassword($_REQUEST['password1'], 8, 1, 2, OBLIGATORIO);

//Comprobar si el campo password esta rellenado
    $aErrores["password2"] = validacionFormularios::validarPassword($_REQUEST['password2'], 8, 1, 2, OBLIGATORIO);


    /* devolver el usuario si esta si esta valido */
    $objetoUsuario = UsuarioPDO::validarUsuario($_REQUEST['username'], $_REQUEST['password']);
    if ($objetoUsuario) {
        
    }



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


    /* Editar la tabla T01_Usuario para  el campo password del usuario  */
    $sql2 = "UPDATE T01_Usuario SET T01_Password=sha2('" . $_SESSION['usuario202DWESAppLoginLogout'] . $aRespuestas['password1'] . "',256) WHERE T01_CodUsuario='" . $_SESSION['usuario202DWESAppLoginLogout'] . "'";

    /* Preparamos  la consulta   */
    $consulta = $miDB->prepare($sql2);
    /* Ejecución de la consulta */
    $consulta->execute();

    if ($consulta->rowCount() > 0) {
        /* cuando todo esta bien devolverlo a editar de Perfil */
        header("Location:editarPerfil.php");
    } else {
        $error = "Algo mal";
    }
} else {
//Mostrar el formulario hasta que lo rellenemos correctamente
//Mostrar formulario

    $_SESSION['paginaAnterior'] = 'editar';
    require_once $views['layout'];
}
