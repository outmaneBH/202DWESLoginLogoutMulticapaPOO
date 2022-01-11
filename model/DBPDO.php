<?php

/*
 * @author: OUTMANE BOUHOU
 * @updated: 02/01/2022
 * @see : Desarrollo de una aplicación (Proyecto LoginLogout MultiCapa) con control de acceso e identificación del
  usuario basado en un formulario */

class DBPDO implements interfaceDB {

    public static function ejecutaConsulta($sentenciaSql, $entradaParametros = null) {
        /* Establecemos la connection con pdo en global */
        $miDB = new PDO(HOST, USER, PASSWORD);

        /* configurar las excepcion */
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* ejecutamos la Consulta y devolver la en el return */
        $resultadoConsulta = $miDB->prepare($sentenciaSql);
        $resultadoConsulta->execute($entradaParametros);

        return $resultadoConsulta;
    }
}
?>