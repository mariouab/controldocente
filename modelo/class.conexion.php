<?php 
		$user="developer";
		$pass="Developer@2020";
		$host="localhost";
		$db="g0_docentes";
		try{
			$conexion =new PDO("mysql:host=$host;dbname=$db;",$user,$pass);
			echo "Connected to $db at $host successfully.";
			return $conexion;	
		}catch (PDOException $pe){
			die("Could not connect the database $db: ". $pe->getMessage());
		}

?>

<?
/* CREATE TABLE `g0_docentes`.`usuarios` ( `idUsuario` INT NOT NULL AUTO_INCREMENT , `usuario` VARCHAR(50) NOT NULL , `contrasenha` INT(100) NOT NULL , `activo` BOOLEAN NOT NULL , PRIMARY KEY (`idUsuario`)) ENGINE = InnoDB; 

INSERT INTO `usuarios`(`usuario`, `contrasenha`, `activo`) VALUES ('mario','123456',1)
INSERT INTO `usuarios`(`usuario`, `contrasenha`, `activo`) VALUES ('juan','654321',1)
INSERT INTO `usuarios`(`usuario`, `contrasenha`, `activo`) VALUES ('mariouab@gmail.com','1234',1)

*/

?>