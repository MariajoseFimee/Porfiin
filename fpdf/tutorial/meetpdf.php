<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->Image('logopdf.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(70);
	// T�tulo
	$this->Cell(70,10,'Lista de Reservaciones',0,0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
session_start();
require '/var/www/html/LF/database.php';

$var1 = $_SESSION['user_id'];

    $sql = "SELECT user_name FROM users WHERE users_id=:users_id";
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt -> bindParam(':users_id', $var1);
	$stmt -> execute();
	$result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

    $sql2 = "SELECT * FROM meet_view_user WHERE id=:id";
    $stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt2 -> bindParam(':id', $var1);
    $stmt2 -> execute();

    $sql3 = "SELECT price FROM ticket WHERE ticket_id=5";
    $stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt3 -> execute();
    $sum = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',10);	
	
	$pdf->Cell(0,10,'Nombre de reservacion: '.$result[0],0,1);

	$pdf->Cell(40,10,'Artista',1,0,'C');
	$pdf->Cell(80,10,'Escenario',1,0,'C');
    $pdf->Cell(40,10,'Dia',1,0,'C');
    $pdf->Cell(30,10,'Hora',1,1,'C');

	while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
		$pdf->Cell(40,10,$row[2],1,0);
		$pdf->Cell(80,10,$row[3],1,0);
        $pdf->Cell(40,10,$row[4],1,0);
        $pdf->Cell(30,10,$row[6],1,1);
		$suma += $sum[0];
	}

	$pdf->Cell(0,10,'Total: $'.$suma,0,1);

	$pdf->Cell(0,10,'Presentando este documento en taquilla puedes acceder al evento.',0,1);
	$pdf->Cell(0,10,'LATINLIVE del 19 al 21 de marzo del 2020.',0,1);
	$pdf->Cell(0,10,'Todos los derechos reservados.',0,1);

	$pdf->Output();
?>