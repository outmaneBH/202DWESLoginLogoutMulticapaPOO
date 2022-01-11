<!DOCTYPE html>
<html>
    <head>
        <title>OB - Cambiar Perfil</title>
        <link rel="stylesheet" href="webroot/css/w3css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
        <script src="webroot/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            body{
                background-image: url(webroot/media/building-g458550d32_1920.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            #form1{

                height:  430px;
                display: flex;
                justify-content: center;
                flex-flow: column wrap;
                align-content: center;
                gap:8px;

            }
            #bg{
                border-radius: 10px;
                width: 10%;  
            }
            input{
                padding: 10px;
                background: none;
                text-align: center;
                color: white;

            }
            span:nth-of-type(1){
                color: white;
                text-align: center;
                font-size: 30px;
            }
            span:nth-of-type(2), span:nth-of-type(3){
                color: red;
                text-align: center;
                font-size: 15px;
                margin-top: -30px;
                margin-bottom: -20px;
            }
            input:nth-of-type(1){
                border: 2px solid yellow;
                border-radius: 25px;

            }
            input:nth-of-type(2),input:nth-of-type(3),input:nth-of-type(4),input:nth-of-type(5){
                border: 2px solid blue;
                border-radius: 25px;

            }
            section input:nth-of-type(1){
                border: 2px solid green;
                align-self: center;
                border-radius: 25px;
                width: 100px;
                display: inline;
            }
            section input:nth-of-type(2){
                display: inline;
                border: 2px solid red;
                align-self: center;
                border-radius: 25px;
                width: 100px;
            }
            ::placeholder{
                text-transform: uppercase;
                color: #978686;
            }
        </style>
    </head>
    <body>
        <div class="w3-bar w3-black  ">
            <p style="padding: 10px;font-size: 18px;font-weight: bold;" class="w3-center ">Web Application Login-Logout</p>
        </div>
        <form action="">
            <button style="margin: 10px;font-weight: bold;float: right;" name="btnupdatePass" class="btn btn-primary" type="submit">Cambiar Password</button>
        </form>
        <div class="container mt-3">
            <div class="d-flex mb-3">
                <div class="p-2  flex-fill"></div>
                <div id="bg" class="p-2 flex-fill bg-dark">
                    <form id="form1" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <span> Editar Perfil </span>
                        <input type="text" name="DescUsuario"   value="<?php echo  $_SESSION['usuario202DWESAppLoginLogout']->get_descUsuario(); ?>"  placeholder="DescUsuario">
                        <input type="text" name="username" disabled value="<?php echo $_SESSION['usuario202DWESAppLoginLogout']->get_codUsuario(); ?>"  placeholder="username">
                        <input type="text" name="T01_NumConexiones"  disabled value="Numero de Conexiones : <?php echo $_SESSION['usuario202DWESAppLoginLogout']->get_numAccesos(); ?>"  placeholder="NumConexiones">
                        <input type="text" name="T01_FechaHoraUltimaConexion" disabled value="UltimaConexion: <?php echo date("d/m/Y H:i:s",$_SESSION['usuario202DWESAppLoginLogout']->get_fechaHoraUltimaConexion()); ?>"  placeholder="FechaHoraUltimaConexion">
                        <input type="text" name="T01_Perfil" disabled value="Perfil : <?php echo $_SESSION['usuario202DWESAppLoginLogout']->get_perfil(); ?>"  placeholder="Perfil">
                        <section>
                            <input type="submit" name="btnupdate" class="w3-hover-green w3-hover-text-black" value="Editar">
                            <input type="submit" name="btncancelar" class="w3-hover-red w3-hover-text-white" value="Cancel">
                            <button style="margin: 10px;" name="btndelete" class="btn btn-danger" type="submit">Delete Account</button>
                        </section>
                  
                        <span><?php echo $error; ?></span>
                    </form> 
                </div>
                <div class="p-2 flex-fill"></div>
            </div>
        </div>
        <div style="height:200px;"></div>