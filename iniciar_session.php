<?php
session_start();
header('Access-Control-Allow-Origin: *');
require('conexion.php');
@$correo = $_GET['correo'];
@$password = $_GET['password'];
$sql = "select nombre,id,permisos from usuarios where correo='$correo' and contrasena='$password'";
@$resultadoConsulta = mysqli_query(Conectar::conexion(),$sql);
//Aqui recorremos los resultados obtenidos
@$respuesta->respuesta=array("nombre"=>'',"id"=>'',"permisos"=>'');
while($filaObtenida = mysqli_fetch_array($resultadoConsulta)){
		@$respuesta->respuesta=array("nombre"=>$filaObtenida[0],"id"=>$filaObtenida[1],"permisos"=>$filaObtenida[2]);
}

echo json_encode(@$respuesta,JSON_FORCE_OBJECT);
$json = json_encode(@$respuesta,JSON_FORCE_OBJECT);
require('persistencia_login.php');
$persistencia = new Persistencia($json);
