<?php

//recojo variables
if(isset($_GET["telefono"]) && isset($_GET["mensaje"]) && isset($_GET["pin"])){
	$telefono = $_GET["telefono"];
	$mensaje = $_GET["mensaje"];
	$pin = $_GET["pin"];
}
else{
	die();
}

if ($pin <> "0000") {
	die();
}

//Crear conexión a la Base de Datos
$conexion = mysql_connect("qvm602.aprendiendoarduino.com","qvm602","password");
if (!$conexion){
	die("Fallo la conexión a la Base de Datos: " . mysql_error());
}

// Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("qvm602", $conexion);
if (!$seleccionar_bd) {
	die("Fallo la selección de la Base de Datos: " . mysql_error());
}

// compruebo que la conexion es corecta
if (!$conexion || !$seleccionar_bd) {
	die('Fallo la conexión o la selección de la Base de Datos: ');
}

$query = "INSERT INTO SMS (date, txtMsg, remoteNum) VALUES (CURRENT_TIMESTAMP, '{$mensaje}', '{$telefono}')";
	
$result = mysql_query($query,$conexion);

if (!$result) {
		die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
	}
	
mysql_close($conexion);

echo ("GRABADOS");

?>
