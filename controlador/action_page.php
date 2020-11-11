<?php

$usuario=$_POST['email'];
$pws=$_POST['pws'];
echo $usuario;
echo "<br>";
echo $pws;
echo "<br>";
if ($usuario=="") {
 header("Status: 301 Moved Permanently");
 header("Location: ..\index.html?mensaje=0");
}
else{
	header("Status: 301 Moved Permanently");
	header("Location: ..\principal.html?mensaje=1");	
}
exit;

 ?>