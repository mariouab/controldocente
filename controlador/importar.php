<?php 
require_once('../modelo/class.conexion.php');
//require_once('../modelo/class.consultas.php');

$modelo = new Conexion();
$conexion = $modelo->get_conexion();

//if (isset($_POST['enviar']))
//{
  $filename=$_FILES["file"]["name"];
  $info = new SplFileInfo($filename);
  $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
  if($extension == 'csv')
	{
	$filename = $_FILES['file']['tmp_name'];
	$handle = fopen($filename, "r");
  	while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE )
   	{
		$q="INSERT INTO reunion(topic, meetingId, userName, userEmail, Departament, Group, ZoomRooms, Creation, StartZoom, EndZoom, Duration, Participants, Source) 
			VALUES (:$data[0],:$data[1],:$data[2],:$data[3],:$data[4],:$data[5],:$data[6],
					:$data[7],:$data[8],:$data[9],:$data[10],:$data[11],:$data[12])";
		//echo $q;
		$statement = $conexion->prepare($q);
		$statement->bindParam('topic',$data[0]);

		$mysqli->query($q);
		echo $q;
		echo "<br>";
   	}
	fclose($handle);
	echo "Importacion completada...";
   	}
//}


?>
