<?php
header('Access-Control-Allow-Origin: *');
require('conexion.php');
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$direccion = $_GET['direccion'];
$cedula = $_GET['cedula'];
$curso = $_GET['curso'];
$turno = $_GET['turno'];
$rs = mysqli_query(Conectar::conexion(),"insert into Alumno values('$id','$cedula','$nombre','$apellido','$direccion','$curso','$turno')");
if($rs){
	echo "Registrado correctamente";
}else{
	echo "No es posible registrar";
}