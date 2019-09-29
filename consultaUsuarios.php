<?php

header('Access-Control-Allow-Origin: *');
require('src/sentencias.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$consulta = Sentencias::mostrar("select * from Alumno where Id = '$id'");
	$respuesta;
	$resultado= array();
	while($row = mysqli_fetch_array($consulta)){
		$resultado['respuesta'][]=array("Id"=>$row[0],"Cedula"=>$row[1],"Nombre"=>$row[2],"Apellido"=>$row[3],"Direccion"=>$row[4],"Curso"=>$row[5],"Turno"=>$row[6]);
		
	}
	@$resultado->respuesta = $resultado;
	echo json_encode($resultado);
}else{
	$consulta = Sentencias::mostrar("select * from Alumno");
	$respuesta;
	$resultado= array();
	while($row = mysqli_fetch_array($consulta)){
		$resultado['respuesta'][]=array("Id"=>$row[0],"Cedula"=>$row[1],"Nombre"=>$row[2],"Apellido"=>$row[3],"Direccion"=>$row[4],"Curso"=>$row[5],"Turno"=>$row[6]);
		
	}
	@$resultado->respuesta = $resultado;
	echo json_encode($resultado);
}