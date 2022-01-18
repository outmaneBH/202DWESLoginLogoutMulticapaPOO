<?php

/*
 * @author: OUTMANE BOUHOU
 * @updated: 02/1/2022
 * @see : Desarrollo de una aplicación (Proyecto LoginLogout MultiCapa) con control de acceso e identificación del
  usuario basado en un formulario */

/* Añadir las librerias */
require_once "core/LibreriaValidacion.php";

/* definir los variables de la applicacion */
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);
$error = '';

/* Añadir models */
require_once "model/AppError.php";
require_once "model/interfaceDB.php";
require_once "model/interfaceUsuarioDB.php";
require_once "model/Usuario.php";
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";

/* Añadir controladores en Arrays */
$controllers = [
    "error" => "controller/cError.php",
    "login" => "controller/cLogin.php",
    "inicioPublico" => "controller/cInicioPublico.php",
    "detalle" => "controller/cDetalle.php",
    "wip" => "controller/cWIP.php",
    "registrar" => "controller/cRegistro.php",
    "inicio" => "controller/cInicio.php",
    "editar" => "controller/cMiCuenta.php",
    "cambiarpassword" => "controller/cCambiarPassword.php",
    "borrar" => "controller/cBorrarCuenta.php"
];

/* Añadir vistas en Arrays */
$views = [
    "layout" => "view/Layout.php",
    "error" => "view/vError.php",
    "inicioPublico" => "view/vInicioPublico.php",
    "wip" => "view/vWIP.php",
    "detalle" => "view/vDetalle.php",
    "login" => "view/vLogin.php",
    "registrar" => "view/vRegistro.php",
    "inicio" => "view/vInicio.php",
    "editar" => "view/vMiCuenta.php",
    "cambiarpassword" => "view/vCambiarPassword.php",
    "borrar" => "view/vBorrarCuenta.php"
];

/* Iniciamos la session para saber que vista esta en curso y que usuario */
session_start();
?>
