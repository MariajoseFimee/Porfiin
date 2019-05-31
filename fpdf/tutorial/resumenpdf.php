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
	$this->Cell(65);
	// T�tulo
    $this->Cell(70,10,'Relacion de Reservaciones',0,1,'C');
	// Salto de l�nea
	$this->Ln(9);
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

    $var1 = $_SESSION['admin_id'];

      $sql = "SELECT admin_name FROM admins WHERE admins_id=:admins_id";
      $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $stmt -> bindParam(':admins_id', $var1);
      $stmt -> execute();
      $result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

//CONSULTAS VARIAS 
$sql1 = "SELECT * FROM u_history_view";
$stmt1 = $conn->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt1 -> execute();

$sql2 = "SELECT count(*) FROM meet_view_user";
$stmt2 = $conn->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt2 -> execute();
$sum = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql3 = "SELECT price FROM ticket WHERE ticket_id=5";
$stmt3 = $conn->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt3 -> execute();
$precio = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$suma2 = $sum[0] * $precio[0];

while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $suma += $row[5];}

//CONSULTA PARA BOLETOS 
$sql4 = "SELECT count(*) FROM history WHERE ticket_id=1";
$stmt4 = $conn->prepare($sql4, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt4 -> execute();
$boleto1 = $stmt4->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql5 = "SELECT count(*) FROM history WHERE ticket_id=2";
$stmt5 = $conn->prepare($sql5, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt5 -> execute();
$boleto2 = $stmt5->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql6 = "SELECT count(*) FROM history WHERE ticket_id=3";
$stmt6 = $conn->prepare($sql6, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt6 -> execute();
$boleto3 = $stmt6->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql7 = "SELECT count(*) FROM history WHERE ticket_id=4";
$stmt7 = $conn->prepare($sql7, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt7 -> execute();
$boleto4 = $stmt7->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql8 = "SELECT count(*) FROM meet_user";
$stmt8 = $conn->prepare($sql8, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt8 -> execute();
$boleto5 = $stmt8->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql9 = "SELECT count(*) FROM history";
$stmt9 = $conn->prepare($sql9, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt9 -> execute();
$total2 = $stmt9->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

//CONSULTA PARA DISP
$sql44 = "SELECT disp FROM ticket WHERE ticket_id=1";
$stmt44 = $conn->prepare($sql44, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt44 -> execute();
$disp1 = $stmt44->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql55 = "SELECT disp FROM ticket WHERE ticket_id=2";
$stmt55 = $conn->prepare($sql55, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt55 -> execute();
$disp2 = $stmt55->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql66 = "SELECT disp FROM ticket WHERE ticket_id=3";
$stmt66 = $conn->prepare($sql66, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt66 -> execute();
$disp3 = $stmt66->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql77 = "SELECT disp FROM ticket WHERE ticket_id=4";
$stmt77 = $conn->prepare($sql77, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt77 -> execute();
$disp4 = $stmt77->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

$sql10 = "SELECT disp FROM ticket WHERE ticket_id=5";
$stmt10 = $conn->prepare($sql10, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt10 -> execute();
$disp5 = $stmt10->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);


	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',10);	
	

	$pdf->Cell(70,10,'Descripcion',1,0,'C');
	$pdf->Cell(60,10,'Vendidos',1,0,'C');
    $pdf->Cell(60,10,'Disponibles',1,1,'C');

    $pdf->Cell(70,10,'Pase Dia',1,0);
    $pdf->Cell(60,10,$boleto1[0],1,0);
    $pdf->Cell(60,10,$disp1[0],1,1);
    $pdf->Cell(70,10,'VIP Pase Dia',1,0);
    $pdf->Cell(60,10,$boleto2[0],1,0);
    $pdf->Cell(60,10,$disp2[0],1,1);
    $pdf->Cell(70,10,'Pase Completo',1,0);
    $pdf->Cell(60,10,$boleto3[0],1,0);
    $pdf->Cell(60,10,$disp3[0],1,1);
    $pdf->Cell(70,10,'Pase Completo VIP',1,0);
    $pdf->Cell(60,10,$boleto4[0],1,0);
    $pdf->Cell(60,10,$disp4[0],1,1);
    $pdf->Cell(70,10,'Meet&Greet',1,0);
    $pdf->Cell(60,10,$boleto5[0],1,0);
    $pdf->Cell(60,10,$disp5[0],1,1);
    $boletos = $total2[0] + $boleto5[0];
    $pdf->Cell(75);
    $pdf->Cell(0,10,'Total de voletos vendidos: '.$boletos,0,1);
    $pdf->Ln(9);

    $pdf->Cell(95,10,'Descripcion',1,0,'C');
    $pdf->Cell(95,10,'Ganancia',1,1,'C');
    
    $pdf->Cell(95,10,'Ventas en boletos',1,0);
    $pdf->Cell(95,10,'$'.$suma,1,1);
    $pdf->Cell(95,10,'Ventas en Meet&Greet',1,0);
    $pdf->Cell(95,10,'$'.$suma2,1,1);
    $total = $suma + $suma2;
    $pdf->Cell(150);
    $pdf->Cell(0,10,'Total : $'.$total,0,1);


    $pdf->Cell(0,10,'Obtenido desde: '.$result[0],0,1);
	$pdf->Cell(0,10,'LATINLIVE del 19 al 21 de marzo del 2020.',0,1);
	$pdf->Cell(0,10,'Todos los derechos reservados.',0,1);

	$pdf->Output();
?>