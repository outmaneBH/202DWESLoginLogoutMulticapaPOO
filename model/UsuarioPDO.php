<?php

/*
 * @author: OUTMANE BOUHOU
 * @updated: 08/1/2022
 * @see : Desarrollo de una aplicación (Proyecto LoginLogout MultiCapa) con control de acceso e identificación del
  usuario basado en un formulario */

class UsuarioPDO implements interfaceUsuarioDB {

    /**
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
        try {
            $sql = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario='" . $codUsuario . "' and T01_Password=sha2('" . $codUsuario . $password . "',256)";
            $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
            $resultado = $resultadoConsulta->fetchObject();
            if ($resultado != null) {
                $valideUsuario = new Usuario($resultado->T01_CodUsuario,
                        $resultado->T01_Password,
                        $resultado->T01_DescUsuario,
                        $resultado->T01_NumConexiones,
                        $resultado->T01_FechaHoraUltimaConexion,
                        $resultado->T01_Perfil);

                $ofecha = new DateTime();
                $time = $ofecha->getTimestamp();

                $sql2 = "UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1 ,T01_FechaHoraUltimaConexion=$time WHERE T01_CodUsuario='" . $codUsuario . "'";
                DBPDO::ejecutaConsulta($sql2);
            }
        } catch (PDOException $exception) {
            /* llamar al fichero de configuracion de Catch */
            require 'error/catchConfig.php';
        } finally {
            unset($miDB);
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
        try {
            $sql2 = "INSERT INTO T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario)  VALUES ('" . $CodUsuario . "', sha2('" . $CodUsuario . $Password . "',256), '" . $DescUsuario . "')";
            $resultadoConsulta = DBPDO::ejecutaConsulta($sql2);
            if ($resultadoConsulta->rowCount() > 0) {
                $altaUsuario = true;
            }
        } catch (PDOException $exception) {
            /* llamar al fichero de configuracion de Catch */
            require 'error/catchConfig.php';
        } finally {
            unset($miDB);
        }
        return $altaUsuario;
    }
/**
 * 
 * @param type $DescUsuario
 * @param type $CodUsuario
 * @return true si ha modifacado el usuario con el codigo dado y el campo modificado $DescUsuario
 */
    public static function modificarUsuario($DescUsuario, $CodUsuario) {
        $update = false;
        try {
            $sql = "UPDATE T01_Usuario SET T01_DescUsuario='" . $DescUsuario . "' WHERE T01_CodUsuario='" . $CodUsuario . "'";
            $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
            $update = true;
        } catch (PDOException $exception) {
            /* llamar al fichero de configuracion de Catch */
            require 'error/catchConfig.php';
        } finally {
            unset($miDB);
        }
        return $update;
    }

    /**
     * @param type $CodUsuario para borrar este usuario como parametro.
     * @return boolean (true) si ha borrado el usuario desde la base de datos  sino devuelve false
     */
    public static function borrarUsuario($CodUsuario) {
        $delete = false;
        try {
            $sql = "DELETE FROM T01_Usuario WHERE T01_CodUsuario='" . $CodUsuario . "'";
            $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
            $resultado = $resultadoConsulta->rowCount();
            if ($resultado > 0) {
                $delete = true;
            }
        } catch (PDOException $exception) {
            /* llamar al fichero de configuracion de Catch */
            require 'error/catchConfig.php';
        } finally {
            unset($miDB);
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
        try {
            $sql = "SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='" . $CodUsuario . "'";
            $resultadoConsulta = DBPDO::ejecutaConsulta($sql);
            $resultado = $resultadoConsulta->fetchObject();

            if ($resultado != null) {
                $CodNoExiste = "Ya hay Cuenta con este Usuario.";
            }
            /* llamar al fichero de configuracion de Catch */
        } catch (PDOException $exception) {
            /* llamar al fichero de configuracion de Catch */
            require 'error/catchConfig.php';
        } finally {
            unset($miDB);
        }
        return $CodNoExiste;
    }

}

?>