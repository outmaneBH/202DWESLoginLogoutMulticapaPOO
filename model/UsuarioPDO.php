<?php

/**
 * Login Logout de Users y mantimiento de Departamentos.
 * 
 * Crud en Funccion de Usuario
 * 
 * @author: OUTMANE BOUHOU
 * @updated: 08/1/2022
 * @version 1.0
 */

/**
 * Login Logout de Users y mantimiento de Departamentos.
 * 
 * Crud en Funccion de Usuario
 * 
 * @package LoginLogout
 * @author Sasha
 * @updated: 08/1/2022
 * @version 1.0
 */
class UsuarioPDO implements interfaceUsuarioDB {

    /**
     * validacion de usuario
     * 
     * Combrobacion si hay algun ususario con ese codigo y Password
     * 
     * @param type $codUsuario
     * @param type $password
     * @return $valideUsuario
     * @see es una fuccion que pide el codigo del usuario y su password
     * y verifica en la base de datos si existe ,cuando existe se mete sus 
     * datos en un objeto de clase Usuario . y hace un update para numero de conexiones,
     * y finalmente devuelve eo objeto sacado.
     */
    public static function validarUsuario($codUsuario, $password) {
        $valideUsuario = null;

        $sql = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario='" . $codUsuario . "' and T01_Password=sha2('" . $codUsuario . $password . "',256)";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchObject();
        if ($resultado != null) {

            $valideUsuario = new Usuario($resultado->T01_CodUsuario,
                    $resultado->T01_Password,
                    $resultado->T01_DescUsuario,
                    $resultado->T01_NumConexiones,
                    $resultado->T01_FechaHoraUltimaConexion,
                    time(),
                    $resultado->T01_Perfil,
                    $resultado->T01_ImagenUsuario);
        }
        return $valideUsuario;
    }

    /**
     * 
     * @param type $CodUsuario 
     * @param type $Password
     * @param type $DescUsuario
     * @return boolean (true) si ha insertado todo bien en la base de datos sino devuelve false
     */
    public static function altaUsuario($CodUsuario, $Password, $DescUsuario) {
        $altaUsuario = false;
        $sql2 = "INSERT INTO T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario)  VALUES ('" . $CodUsuario . "', sha2('" . $CodUsuario . $Password . "',256), '" . $DescUsuario . "')";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql2);
        if ($resultadoConsulta->rowCount() > 0) {
            $altaUsuario = true;
        }
        return $altaUsuario;
    }

    /**
     * 
     * @param type $DescUsuario
     * @param type $CodUsuario
     * @return true si ha modifacado el usuario con el codigo dado y el campo modificado $DescUsuario
     */
    public static function modificarUsuario($CodUsuario, $DescUsuario) {
        $sql = "UPDATE T01_Usuario SET T01_DescUsuario='" . $DescUsuario . "' WHERE T01_CodUsuario='" . $CodUsuario . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $update = true;
        return $update;
    }

    /**
     * @param type $CodUsuario para borrar este usuario como parametro.
     * @return boolean (true) si ha borrado el usuario desde la base de datos  sino devuelve false
     */
    public static function borrarUsuario($CodUsuario) {
        $delete = false;
        $sql = "DELETE FROM T01_Usuario WHERE T01_CodUsuario='" . $CodUsuario . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->rowCount();
        if ($resultado > 0) {
            $delete = true;
        }
        return $delete;
    }

    /**
     * 
     * @param type $CodUsuario para validarlo
     * @return string devuelve un mensaje si el codigo del usuario existe en la base de datos.
     */
    public static function validarCodNoExiste($CodUsuario) {
        $CodNoExiste = null;
        $sql = "SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='" . $CodUsuario . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->fetchObject();
        if ($resultado != null) {
            $CodNoExiste = "Ya hay Cuenta con este Usuario.";
        }
        return $CodNoExiste;
    }

    public static function registrarUltimaConexion($oUsuario) {
        /* Hay que cambiar eso */
        $ofecha = new DateTime();
        $time = $ofecha->getTimestamp();
        $oUsuario->set_numConexiones($oUsuario->get_numConexiones() + 1);
        $oUsuario->set_fechaHoraUltimaConexionAnterior($oUsuario->get_fechaHoraUltimaConexion());
        $oUsuario->set_fechaHoraUltimaConexion($time);
        $sql2 = "UPDATE T01_Usuario SET T01_NumConexiones=" . $oUsuario->get_numConexiones() . " ,T01_FechaHoraUltimaConexion=$time WHERE T01_CodUsuario='" . $oUsuario->get_codUsuario() . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql2);
        return $oUsuario;
    }

    public static function cambiarPassword($codUsuario, $password) {
        $updatePassword = false;
        $sql = "UPDATE T01_Usuario SET T01_Password=sha2('" . $codUsuario . $password . "',256) WHERE T01_CodUsuario='" . $codUsuario . "'";
        $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
        $resultado = $resultadoConsulta->rowCount();
        if ($resultado > 0) {
            $updatePassword = true;
        }
        return $updatePassword;
    }

}

?>