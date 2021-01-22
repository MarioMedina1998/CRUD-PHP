<?php
require_once "controladores/ControladorAdmin.php";
require_once "Modelos/ModeloAdmin.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Orquidea: sesion</title>
        <!-- Estilo -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                        <span class="btn btn-info">Bienvenido</span>
                    </div>
                </div>
            </nav>
            <br><br><br>
            <!-- registrro -->
            <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <div class="panel panel-primary">
            <div class="panel panel-heading" align="center"><h2>Inicia Sesion</h2></div>
            <div class="panel panel-body">
            <div class="text-center">
            <!--<img src="img/logofor.png" class="rounded" style="Max-width: 20%">-->
            </div>
                <form method="post">
                <p></p>
                <input type="text" name="usuario" class="form-control input-sm"  placeholder="Usuario">
                <br>
                <input type="password" name="password" class="form-control input-sm"  placeholder="Contraseña">
                <div align="center">
                <br>
                <input class="btn btn-success" type="submit" value="Iniciar Sesion">
                </form>
                </div>
              </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="line"></div>
</div>
<?php

$ingreso = new ControladorAdmin();
$ingreso -> ingresar();

?>
</body>
</html>