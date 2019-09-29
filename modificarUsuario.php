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
$rs = mysqli_query(Conectar::conexion(),"update Alumno set Nombre = '$nombre',Apellido='$apellido',Direccion='$direccion',Cedula='$cedula',Curso='$curso',Turno='$turno' where id='$id'");
if($rs){
	echo "Modificado correctamente";
}else{
	echo "No es posible modificar";
}