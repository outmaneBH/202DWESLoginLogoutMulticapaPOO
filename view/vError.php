<!DOCTYPE html>
<html>
    <title>Errores Try Catch</title>
    <link rel="stylesheet" href="webroot/css/w3css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="webroot/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
    <body>
        <form>
            <button style="margin-top: 10px;" type="submit" name="btndestroy" class="w3-button w3-blue w3-hover-blue ">Volver</button> 
        </form>
        <div class="w3-panel w3-yellow w3-card-4 w3-container">
            <!--Mostramos el codigo del error y su mensage-->
            <h1>Error Codigo :<?php echo $code; ?></h1>
            <p><strong>Mensaje :</strong><?php echo $msg; ?></p>
        </div>



