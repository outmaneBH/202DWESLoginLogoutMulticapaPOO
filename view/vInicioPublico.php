<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index LogIn LogOut</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" href="webroot/media/fav.png" type="image/ico" sizes="16x16">
        <style>
            footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: red;
                color: white;
                text-align: center;
            }
            body {
                background-image: url(webroot/media/sky.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            h3{
                color: white;
                width: 100%;
                padding: 5px;
                font-weight: bold;
            }
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <h3>Web Application Login-Logout Multicapa POO</h3>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <input name="btnlogin" type="submit" style="margin-right: 5px;" value="Login" class="btn btn-primary" />
                        <input name="btnregister" type="submit" style="margin-right: 5px;" value="Register" class="btn btn-success" />
                        <select name="select">      
                            <option value="">Idioma </option>
                            <option value="es">Español</option>
                            <option value="en">Ingles</option>
                            <option value="ar">العربية</option>
                        </select>

                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">

        </div>