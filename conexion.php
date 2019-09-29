<?php
class Conectar{
public static function conexion(){
	$host="localhost";
	$usuarioDB="root";
	$passwordDB="";
	$Database ="Expotecnica";
	$conexion = mysqli_connect($host,$usuarioDB,$passwordDB,$Database);
	return $conexion;
}
}