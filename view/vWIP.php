<!DOCTYPE html>
<html>
    <head>
        <title>Pagina web en Construccion</title>
        <link rel="stylesheet" href="webroot/css/w3css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
        <script src="webroot/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            #divB{
                background-color: black;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 90vh;
                width: 100vw;
            }
        </style>
    </head>
    <body>
        <form action="">
            <button style="margin: 10px;font-weight: bold;float: left;" name="cancelwip" class="btn btn-primary" type="submit">Cancel</button>
        </form>
        <div id="divB">
            <button class="btn btn-primary" disabled>
                <span class="spinner-border spinner-border-sm"></span>
                This Page In Progress ...
            </button>  
        </div>

    </body>
</html>



