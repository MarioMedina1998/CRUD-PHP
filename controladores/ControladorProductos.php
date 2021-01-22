<?php
class ControladorProductos{
	public function registrar(){
		if(isset($_POST["nombre"])){

			$datos = array("nombre" => $_POST["nombre"],
			     			"pu" => $_POST["pu"],
							"piezas" => $_POST["piezas"],
							"proveedor" => $_POST["proveedor"],
							"empleado" => $_POST["empleado"]);
			$tablapedido ="pedido";
			$tablaproducto = "producto";
			$tablaproveedor = "proveedor";
			$tablaempleado = "empleado";

			$respuesta = ModeloProducto::registrar($datos, $tablapedido, $tablaproducto, 
				$tablaproveedor, $tablaempleado);
			if($respuesta == "Ok"){
				header("location:productos.php");
			}else{
				echo "Error";
			}
		}
	}

	//mostrar la tabla
	public function mostrar(){
	    $tabla ="pedido";
		$respuesta =  ModeloProducto::mostrar($tabla);

		foreach ($respuesta as $key => $value) {
			echo '<tr>
				<td>'.$value['nombre'].'</td>
				<td>'.$value['pu'].'</td>
				<td>'.$value['piezas'].'</td>				
				<td>'.$value['proveedor'].'</td>
				<td>'.$value['empleado'].'</td>				
				<td><a  href="editar.php?id='.$value["id_pedido"].'"><button class="btn btn-warning">Editar</button></td>
				<td><a  href="eliminar.php?id='.$value["id_pedido"].'"><button class="btn btn-danger">Borrar</button></td>
			</tr>';
		}
	}
 

	//editar
	public function seleccionarAeditar(){

		$datos = $_GET["id"];
	    $tabla ="pedido";
		$respuesta =  ModeloProducto::editar($datos, $tabla);
		//var_dump($respuesta); 
		
		echo '<input type="hidden" placeholder="id" value="'.$respuesta["id_pedido"] .'" name="id_pedido" class="form-control input-sm" required>
		<p></p>
		<input type="text" placeholder="Nombre" value="'.$respuesta["nombre"] .'" name="nombre" class="form-control input-sm" required>
		<p></p>
		<input type="text" placeholder="Precio unitario" value="'.$respuesta["pu"] .'" name="pu" class="form-control input-sm" required>
		<p></p>
		<input type="text" placeholder="Piezas" value="'.$respuesta["piezas"] .'" name="piezas" class="form-control input-sm" required>
		<p></p>
		<input type="text" placeholder="Proveedpr" value="'.$respuesta["proveedor"] .'" name="proveedor" class="form-control input-sm" required>		
		<p></p>
		<input type="text" placeholder="Empleado" value="'.$respuesta["empleado"] .'" name="empleado" class="form-control input-sm" required>
		<p></p>
		<input type="submit" class="btn btn-success" value="Actualizar">';
		
	}

	public function actualizarProducto(){
		if(isset($_POST["nombre"])){
			$datos = array("id_pedido" => $_POST["id_pedido"],
							"nombre" => $_POST["nombre"],
			     			"pu" => $_POST["pu"],
							"piezas" => $_POST["piezas"],
							"proveedor" => $_POST["proveedor"],
							"empleado" => $_POST["empleado"]);

			//$tabla ="alumnos";
			$respuesta = ModeloProducto::actualizarProducto($datos);//, $tabla);
			if($respuesta == "Ok"){
				header("location:productos.php");
			}else{
				echo "Error";

			}
		}	
	}

	
	//eliminar
	public function eliminarProducto(){
		if(isset($_GET["id"])){
			$datos = $_GET["id"];
			$respuesta = ModeloProducto::borrarProducto($datos);



			if($respuesta == "Ok"){
				header("location: productos.php");
			}else{
				
				echo "Error";

			}
		}
		
	}
	

}

?>