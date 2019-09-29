<?php
require('../src/FPDF/fpdf.php');
class PDF extends FPDF{


	public $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
	function Header(){
		$this->Image('icono.png',10,8,33);
		$this->SetFont('Arial','',12);
		$this->Cell(130);
		$this->Cell(50,10,utf8_decode("Asunción ,").date('j').' de '.$this->meses[date('n')-1].' de '.date('Y'),0,0,'C');
		$this->Ln(20);
		$this->Cell(50);
		$this->SetFont('Arial','B',20);
		$this->Cell(50,7,utf8_decode('Coordinación de Informatica'));
		$this->Ln(20);
		$this->SetFont('Arial','',13);
		$this->Cell(30,7,utf8_decode('Fecha y hora'),1,0,'C');
		$this->Cell(37,7,utf8_decode('Nombre Alumno'),1,0,'C');
		$this->Cell(18,7,utf8_decode('Cedula'),1,0,'C');
		$this->Cell(40,7,utf8_decode('Trabajo a realizar'),1,0,'C');
		$this->Cell(35,7,utf8_decode('Hojas impresas'),1,0,'C');
		$this->Cell(32,7,utf8_decode('Curso y Turno'),1,1,'C');
	}
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',10);
		$this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
	}
}
require('../src/sentencias.php');
$fechaInicio = $_GET['fechaInicio'];
$fechaFinal = $_GET['fechaFinal'];
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$consulta = Sentencias::mostrar("select Sala.Fecha_hora,concat(Alumno.Nombre,' ',Alumno.Apellido),Alumno.Cedula,Sala.Motivo_utilizacion,Sala.Hojas_a_imprimir,concat(Alumno.Curso,' ',Alumno.Turno) from Alumno,Sala where Alumno.Id = Sala.Id and Sala.Fecha_hora BETWEEN '$fechaInicio' and  '$fechaFinal'  order by Sala.Fecha_hora");
while($fila = mysqli_fetch_array($consulta)){
	$pdf->Cell(30,7,utf8_decode($fila[0]),1,0,'C');
	$pdf->Cell(37,7,utf8_decode($fila[1]),1,0,'C');
	$pdf->Cell(18,7,utf8_decode($fila[2]),1,0,'C');
	$pdf->Cell(40,7,utf8_decode($fila[3]),1,0,'C');
	$pdf->Cell(35,7,utf8_decode($fila[4]),1,0,'C');
	$pdf->Cell(32,7,utf8_decode($fila[5]),1,1,'C');
}
//$pdf->Output();
$pdf->Output('D','archivosGenerados/informe.pdf',true);
echo "<meta http-equiv='refresh' content='0;url=archivosGenerados/informe.pdf'/>";
echo "<script languaje='javascript' type='text/javascript'>setTimeout(function(){window.close();},500)</script>";