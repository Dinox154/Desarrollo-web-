<?php
    require('../fpdf185/fpdf.php');
    include('../config.php');

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
        $this->Cell(120,10,'REPORTE DE PROVEEDORES',0,0,'C');
        // Salto de línea
        $this->Ln(20);
        $this->SetFont('Arial','B',8);
        $this->Cell(20,10,"Proveedor",1,0,'C',0);
        $this->Cell(25,10,"Nombre Contacto",1,0,'C',0);
        $this->Cell(25,10,utf8_decode("Dirección"),1,0,'C',0);
        $this->Cell(25,10,"Telefono",1,0,'C',0);
        $this->Cell(35,10,"Nota",1,1,'C',0);
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
$sql = "SELECT * FROM supplier";
$query = mysqli_query($db_link,$sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = mysqli_fetch_assoc($query)){
    $pdf->Cell(20,10,utf8_decode($row['suppliername']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['contactperson']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['address']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['contactno']),1,0,'C',0);
    $pdf->Cell(35,10,utf8_decode($row['note']),1,1,'C',0);

}
$pdf->Output();
?>