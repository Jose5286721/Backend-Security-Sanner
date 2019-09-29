<?php
require('../src/sentencias.php');
$fechaInicio = $_GET['fechaInicio'];
$fechaFinal = $_GET['fechaFinal'];
require '../src/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\IOFactory;
$rutaArchivo = "hello.xlsx";
$spreadsheet = IOFactory::load($rutaArchivo);
$consulta = Sentencias::mostrar("select Sala.Fecha_hora,concat(Alumno.Nombre,' ',Alumno.Apellido),Alumno.Cedula,Sala.Motivo_utilizacion,Sala.Hojas_a_imprimir,concat(Alumno.Curso,' ',Alumno.Turno) from Alumno,Sala where Alumno.Id = Sala.Id and Sala.Fecha_hora BETWEEN '$fechaInicio' and  '$fechaFinal'  order by Sala.Fecha_hora");
$spreadsheet->getSheet(0);
$contador = 3;
while($fila = mysqli_fetch_array($consulta)){
	$spreadsheet->getSheet(0)
				->setCellValue("A".$contador,$fila[0]);
	$spreadsheet->getSheet(0)
				->setCellValue("B".$contador,$fila[1]);
	$spreadsheet->getSheet(0)
				->setCellValue("C".$contador,$fila[2]);
	$spreadsheet->getSheet(0)
				->setCellValue("D".$contador,$fila[3]);
	$spreadsheet->getSheet(0)
				->setCellValue("E".$contador,$fila[4]);
	$spreadsheet->getSheet(0)
				->setCellValue("F".$contador,$fila[5]);
	$contador++;
}
$writer = new Xlsx($spreadsheet);
$writer->save('archivosGenerados/hello.xlsx');
echo "<meta http-equiv='refresh' content='0;url=archivosGenerados/hello.xlsx'/>";
echo "<script languaje='javascript' type='text/javascript'>setTimeout(function(){window.close();},100)</script>";