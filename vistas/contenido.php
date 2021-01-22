<?php
session_start();
if(!$_SESSION["Ingreso"]){
    header("location: ../index.php");
}
require_once "../controladores/ControladorProductos.php";
require_once "../Modelos/ModeloProducto.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Orquidea Principal</title>
        <!-- Estilo -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                        <span class="btn btn-info">Floreria </span>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Registrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productos.php">Listas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="salir.php">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- registros de productos-->
            <br><br>
            <div align="center">
             <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <div class="panel panel-primary">
            <div class="panel panel-heading" align="center"><h2>NUEVO PEDIDO</h2></div>
            <div class="panel panel-body">
            <div class="text-center">
            </div>
                <form method="post">
                <p></p>
                <input type="text" name="nombre" class="form-control input-sm"  placeholder="Nombre producto">
                <br>
                <input type="text" name="pu" class="form-control input-sm"  placeholder="precio unitario">
                <div align="center">
                <br>
                <input type="text" name="piezas" class="form-control input-sm"  placeholder="Numero Piezas">
                <br>
                <input type="text" name="proveedor" class="form-control input-sm"  placeholder="Nombre del proveedor">
                <br>
                <input type="text" name="empleado" class="form-control input-sm"  placeholder="Nombre del empleado">
                <br>
                <input class="btn btn-success" type="submit" value="Registrar Nuevo">
                </form>
                </div>
                <br>
                <h5>Para ver el listado de productos da clic <a href="productos.php">aqui</a></h5>
              </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="line"></div>
</div>
</div>
<?php
$registrar = new ControladorProductos();
$registrar -> registrar();

?>
</body>
</html>