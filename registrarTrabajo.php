<?php
require('src/sentencias.php');
$hora = $_POST['hora'];
$id = $_POST['id'];
$trabajoRealizar = $_POST['trabajo'];
if($trabajoRealizar == "1"){
	$trabajoRealizar = "Investigacion";
}else if($trabajoRealizar == "2"){
	$trabajoRealizar = "Impresion";
}
else{
	$trabajoRealizar = "Investigacion e impresion";
}
$hojasImprimir = $_POST['hojas'];
$palabra = $id;
$aux = new DateTime($hora);
str_replace("\t", "", $palabra);
str_replace("\n", "", $palabra);
str_replace("\r", "", $palabra);
echo $hora;
Sentencias::insertar("insert into Sala values('$hora','$trabajoRealizar','$hojasImprimir','$id')");

