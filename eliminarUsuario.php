<?php 

header('Access-Control-Allow-Origin: *');
require('src/sentencias.php');
$id = $_GET["id"];
Sentencias::eliminar("delete from Alumno where Id = '$id'");

