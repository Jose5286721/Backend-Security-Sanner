<?php

header('Access-Control-Allow-Origin: *');
require('../src/sentencias.php');
$fechaInicio = $_GET['fechaInicio'];
$fechaFinal = $_GET['fechaFinal'];
$consulta = Sentencias::mostrar("select Sala.Fecha_hora,concat(Alumno.Nombre,' ',Alumno.Apellido),Alumno.Cedula,Sala.Motivo_utilizacion,Sala.Hojas_a_imprimir,concat(Alumno.Curso,' ',Alumno.Turno) from Alumno,Sala where Alumno.Id = Sala.Id and Sala.Fecha_hora BETWEEN '$fechaInicio' and  '$fechaFinal' order by Sala.Fecha_hora");
$respuesta;
$resultado= array();
while($row = mysqli_fetch_array($consulta)){
	$resultado['respuesta'][]=array("Fecha"=>$row[0],"Nombre"=>$row[1],"Cedula"=>$row[2],"Motivo"=>$row[3],"Impresiones"=>$row[4],"Curso"=>$row[5]);
		
}
@$resultado->respuesta = $resultado;
echo json_encode($resultado);