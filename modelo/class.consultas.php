<?php 
class Consultas
{
	
	public function insertarProducto($arg_nombre, $arg_descripcion, $arg_categoria, $arg_precio)
	{  //insertar producto
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql = "insert into productos(nombre, descripcion, categoria, precio) values(:nombre, :descripcion, :categoria, :precio)";
		$statement =$conexion->prepare($sql);
		//var_dump($arg_precio);
		$statement->bindParam(':nombre', $arg_nombre);
		$statement->bindParam(':descripcion', $arg_descripcion);
		$statement->bindParam(':categoria', $arg_categoria);
		$statement->bindParam(':precio', $arg_precio);
		if (!$statement) {
			return "Error al crear el registro";
		}else{
			$statement->execute();
			return "Registro creado correctamente";
		}

	}
	public function CargarProductos(){
		$row = null;
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql="select * from productos";
		$statement= $conexion->prepare($sql);
		$statement->execute();
		while ($result = $statement->fetch()) {
			$row[]=$result;
		}
		return $row;
	}

	public function eliminarProducto($arg_id_producto){
		$modelo= new Conexion();
		$conexion = $modelo->get_conexion();
		$sql = "delete from productos where id_producto = :id_producto";
		$statement= $conexion->prepare($sql);
		$statement->bindParam(':id_producto',$arg_id_producto);
		if (!$statement) {
			return "Error al elimiar el producto.";
		}else{
			$statement->execute();
			return "Producto eliminado correctamente...";
		}
	}
	public function CargarProducto($arg_id_producto){
		$row = null;
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql="select * from productos where id_producto= :id_producto";
		$statement= $conexion->prepare($sql);
		$statement->bindParam(':id_producto',$arg_id_producto);
		$statement->execute();
		while ($result = $statement->fetch()) {
			$row[]=$result;
		}
		return $row;
	}

	public function modificarProducto($arg_campo,$arg_valor,$arg_id_producto){
		$modelo= new Conexion();
		$conexion = $modelo->get_conexion();
		$sql = "update productos set $arg_campo = :valor where id_producto = :id_producto";
		$statement= $conexion->prepare($sql);
		$statement->bindParam(':valor',$arg_valor);
		$statement->bindParam(':id_producto',$arg_id_producto);
		if (!$statement) {
			return "Error al modificar el producto.";
		}else{
			$statement->execute();
			return "Producto modificado correctamente...";
		}
	
	}

	public function buscarProductos($arg_nombre){
		$row = null;
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$nombre = "%".$arg_nombre."%";
		//var_dump($nombre);
		$sql="select * from productos where nombre like :nombre";
		$statement= $conexion->prepare($sql);
		$statement->bindParam(':nombre',$nombre);
		$statement->execute();
		while ($result = $statement->fetch()) {
			$row[]=$result;
		}
		return $row;
	}
}

?>