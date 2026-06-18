<?php

require('fpdf19/fpdf.php');
include 'conexao.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT 
            i.idinscricao,
            i.nome,
            g.descricao AS genero,
            c.descricao AS competicao
        FROM inscricao_participante i
        INNER JOIN genero_participante g ON g.idgenero = i.idgenero
        INNER JOIN competicoes c ON c.idcompeticoes = i.idcompeticoes
        WHERE i.idinscricao = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$dado = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dado) {
    die("Inscrição não encontrada.");
}

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 15, 'COMPROVANTE DE INSCRICAO', 0, 1, 'C');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(50, 10, 'Numero da Inscricao:');
$pdf->Cell(0, 10, $dado['idinscricao'], 0, 1);

$pdf->Cell(50, 10, 'Nome:');
$pdf->Cell(0, 10, utf8_decode($dado['nome']), 0, 1);

$pdf->Cell(50, 10, 'Genero:');
$pdf->Cell(0, 10, utf8_decode($dado['genero']), 0, 1);

$pdf->Cell(50, 10, 'Competicao:');
$pdf->Cell(0, 10, utf8_decode($dado['competicao']), 0, 1);

$pdf->Ln(15);

$pdf->Cell(0, 10, 'Inscricao realizada com sucesso.', 0, 1);

$pdf->Output('D', 'Comprovante_Inscricao_'.$dado['idinscricao'].'.pdf');
exit;