<?php 
class Validacion
{
	
	public function validarusuario($arg_usuario,$arg_pwd){
		$row = null;
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$usuario = $arg_usuario;
		$pwd = $arg_pwd;
		//var_dump($nombre);
		$sql="select * from usuarios where nombre usuario= :usuario and contrasenha= :pwd and activo = 1";
		$statement= $conexion->prepare($sql);
		$statement->bindParam(':usuario',$usuario);
		$statement->bindParam(':pwd',$pwd);
		$statement->execute();
		while ($result = $statement->fetch()) {
			$row[]=$result;
		}
		return $row;
	}
}

?>