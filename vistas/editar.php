<?php
session_start();
if(!$_SESSION["Ingreso"]){
	header("location: ../index.php");
}
require_once "../controladores/ControladorProductos.php";
require_once "../Modelos/ModeloProducto.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orquidea:editar</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                        <span class="btn btn-info">Floreria Orquidea</span>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="contenido.html">Registrar</a>
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
	<br>
<div align="center">
             <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <div class="panel panel-primary">
            <div class="panel panel-heading" align="center"><h2>EDITAR PEDIDO</h2></div>
            <div class="panel panel-body">
            <div class="text-center">
            </div>
                <form method="post">
                    <?php
                        $editar = new ControladorProductos();
                        $editar -> seleccionarAeditar();

                        $actualizar = new ControladorProductos();
                        $actualizar -> actualizarProducto();
                    ?>
                </form>
                </div>
              </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="line"></div>
</div>
</div>
</body>
</html>




