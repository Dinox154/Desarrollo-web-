<?php
    require('../fpdf185/fpdf.php');
    include('../config.php');
    $id = $_GET['id'];

    class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Movernos a la derecha
        $this->Cell(35);
        // Título
        $this->Cell(120,10,'REPORTE DE PEDIDO',0,0,'C');
        // Salto de línea
        $this->Ln(20);
        $this->SetFont('Arial','B',8);
        $this->Cell(20,10,"PRODUCTO",1,0,'C',0);
        $this->Cell(20,10,"MARCA",1,0,'C',0);
        $this->Cell(25,10,"CLIENTE",1,0,'C',0);
        $this->Cell(15,10,"PRECIO",1,0,'C',0);
        $this->Cell(20,10,"CANTIDAD",1,0,'C',0);
        $this->Cell(15,10,"TOTAL",1,0,'C',0);
        $this->Cell(20,10,"PAGADO",1,0,'C',0);
        $this->Cell(25,10,"RESTA",1,1,'C',0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}
$sql = "SELECT * FROM sales WHERE id = $id";
$query = mysqli_query($db_link,$sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = mysqli_fetch_assoc($query)){
    $pdf->Cell(20,10,utf8_decode($row['category']),1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['name']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['customers']),1,0,'C',0);
    $pdf->Cell(15,10,utf8_decode($row['amnt']),1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['quantity']),1,0,'C',0);
    $pdf->Cell(15,10,utf8_decode($row['total']),1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['tendered']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['changed']),1,1,'C',0);

}
$pdf->Output();
?>