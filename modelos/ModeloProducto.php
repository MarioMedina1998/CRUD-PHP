<?php
require_once "conexionBD.php"; 
class ModeloProducto{
	
	static public function registrar($datos, $tablapedido, $tablaproducto, $tablaproveedor, $tablaempleado){
		$db_host = 'localhost';
		$db_user = 'root';
		$db_pass = '';
		$db_name = 'orquidea';

		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
		//verifca conexion
		if($mysqli->connect_error){
			die("no hay conexcion al servidor: " . $mysqli->connect_error);
		}		
		$sql = "SHOW TABLE STATUS LIKE 'pedido' ";
		if(!$result = $mysqli->query($sql)){
		    die('There was an error running the query [' . $mysqli->error . ']');
		}
		$row = $result->fetch_assoc();
		$newId= $row['Auto_increment'];
		var_dump($newId); 
		 //insertar en la tabla pedido
		$nombre= $datos["nombre"];
		$pu= $datos["pu"];
		$piezas= $datos["piezas"];
		$proveedor= $datos["proveedor"];
		$empleado= $datos["empleado"];
		var_dump($nombre); 
		//Se inserta el pedido	
		if ($stmtpedido1 = $mysqli->prepare('INSERT INTO 
			pedido (nombre,pu,piezas) VALUES (?,?,?)')) {

		    $stmtpedido1->bind_param("sss",$nombre,$pu,$piezas);
		    $stmtpedido1->execute();		   
		    $stmtpedido1->close();
		    echo "Success";
		}else{
			echo "Error";
		}
		//insertamos el producto en productos
		if ($stmtproducto1 = $mysqli->prepare('INSERT INTO 
			producto (id_pedido,nombre) VALUES (?,?)')) {

		    $stmtproducto1->bind_param("ss",$newId ,$nombre);		    
		    $stmtproducto1->execute();		   
		    $stmtproducto1->close();
		    echo "Success";
		}
		//en la de proveedor
		if ($stmtproveedor1 = $mysqli->prepare('INSERT INTO 
			proveedor (id_pedido,proveedor) VALUES (?,?)')) {

		    $stmtproveedor1->bind_param("ss",$newId ,$proveedor);		    
		    $stmtproveedor1->execute();		   
		    $stmtproveedor1->close();
		    echo "Success";
		}
		//en la de empleado
		if ($stmtempleado1 = $mysqli->prepare('INSERT INTO 
			empleado (id_pedido,empleado) VALUES (?,?)')) {

		    $stmtempleado1->bind_param("ss",$newId ,$empleado);		    
		    $stmtempleado1->execute();		   
		    $stmtempleado1->close();
		    echo "Success";
		}
		return "Ok";
	}
	//mostrar
	static public function mostrar($tablaBd){
		$pdo = ConexionBd::conectar()->prepare("SELECT * from pedido
												inner Join proveedor                   
												on pedido.id_pedido = proveedor.id_pedido
												inner JOIN empleado
												on pedido.id_pedido = empleado.id_pedido");		

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
	}

	//editar
	static public function editar($datos, $tablaBd){
		$pdo = ConexionBd::conectar()->prepare("SELECT * from pedido
												inner Join proveedor                                                            
												on pedido.id_pedido = proveedor.id_pedido
												inner JOIN empleado
												on pedido.id_pedido = empleado.id_pedido 
												WHERE pedido.id_pedido=:id_pedido ");		
		
		$pdo -> bindParam(":id_pedido", $datos, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
	}


	static public function actualizarProducto($datos){
		$db_host 	= 'localhost';
		$db_user 	= 'root';
		$db_pass 	= '';
		$db_name 	= 'orquidea';		


		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); 		
		// Check connection
		if ($mysqli->connect_error) {
		    die("No hay conexión al servidor: " . $mysqli->connect_error);
		} 

		$id= $datos["id_pedido"];
		$nombre= $datos["nombre"];
		$pu= $datos["pu"];
		$piezas= $datos["piezas"];
		$proveedor= $datos["proveedor"];
		$empleado= $datos["empleado"];

		//Se inserta el alumno	
		if ($stmtpedido = $mysqli->prepare('UPDATE pedido 
			SET nombre=?,pu=?,piezas=? WHERE id_pedido=?')) {

		    $stmtpedido->bind_param("sssi",$nombre,$pu,$piezas,$id);		    
		    $stmtpedido->execute();		   
		    $stmtpedido->close();
		    echo "Success";
		}else{
			echo "Error";
		}

		//Actualizamos el correo del alumno			
		if ($stmtproducto = $mysqli->prepare('UPDATE 
			producto SET nombre=? WHERE id_pedido=?')) {

		    $stmtproducto->bind_param("si",$nombre ,$id);		    
		    $stmtproducto->execute();		   
		    $stmtproducto->close();
		    echo "Success";
		}
		//Actualizamos proveedor	
		if ($stmtproveedor = $mysqli->prepare('UPDATE 
			proveedor SET proveedor=? WHERE id_pedido=?')) {

		    $stmtproveedor->bind_param("si",$proveedor ,$id);			    
		    $stmtproveedor->execute();		   
		    $stmtproveedor->close();
		    echo "Success";
		}
		//Actualizamos  empleado	
		if ($stmtempleado = $mysqli->prepare('UPDATE 
			empleado SET empleado=? WHERE id_pedido=?')) {

		    $stmtempleado->bind_param("si",$proveedor ,$id);			    
		    $stmtempleado->execute();		   
		    $stmtempleado->close();
		    echo "Success";
		}



		if($stmtpedido && $stmtproducto && $stmtproveedor && $stmtempleado){
			return "Ok";			
		}else{
			return "Error";			
		}	

		$pdo -> close();
	}

	//elimnar
	static public function borrarProducto($datos){

		$db_host 	= 'localhost';
		$db_user 	= 'root';
		$db_pass 	= '';
		$db_name 	= 'orquidea';		


		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); 		
		// Check connection
		if ($mysqli->connect_error) {
		    die("No hay conexión al servidor: " . $mysqli->connect_error);
		} 

		$id= $datos;

		

		if ($stmtcorreo = $mysqli->prepare('DELETE FROM producto  where id_pedido=?')) {

		    $stmtcorreo->bind_param("i",$id);			    
		    $stmtcorreo->execute();		   
		    $stmtcorreo->close();
		    echo "Success";
		}

		if ($stmttelefono = $mysqli->prepare('DELETE FROM proveedor  where id_pedido=?')) {

		    $stmttelefono->bind_param("i",$id);			    
		    $stmttelefono->execute();		   
		    $stmttelefono->close();
		    echo "Success";
		}

		if ($stmtalumno = $mysqli->prepare('DELETE FROM empleado  where id_pedido=?')) {

		    $stmtalumno->bind_param("i",$id);			    
		    $stmtalumno->execute();		   
		    $stmtalumno->close();
		    echo "Success";
		}else{
			echo "Error"; 
		}
		if ($stmtalumno1 = $mysqli->prepare('DELETE FROM pedido  where id_pedido=?')) {

		    $stmtalumno1->bind_param("i",$id);			    
		    $stmtalumno1->execute();		   
		    $stmtalumno1->close();
		    echo "Success";
		}else{
			echo "Error"; 
		}
		
		
		if($stmtalumno1 && $stmtalumno && $stmtcorreo && $stmttelefono ){
			return "Ok";
		}else{
			return "Error";
		}

		
	}

}
?>