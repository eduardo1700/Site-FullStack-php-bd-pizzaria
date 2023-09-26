<?php
session_start();
require('fpdf/fpdf.php');
include 'config.php';

// ligação à bd
$link = $con;

//imprimir data
$data = date('d-m-Y');

//declarar a query
$sql = "select * from clientes";

//executar a query
$run = $link->query($sql);

//fecha a ligação à bd
$link->close();

//traz os resultados da bd e guarda num array
while ($row = mysqli_fetch_array($run)) {
    $grupo[] = $row;
}

//copia os valores do array para a variavel, que contém todos os registos da bd
$cliente = $grupo;

// cria uma instância da classe
$pdf = new FPDF('L', 'pt', 'legal');

//cria a página 
$pdf->AddPage();

//titulo principal na página
$pdf->SetTitle(mb_convert_encoding('Gestão de xxx','UTF-8'));

//informo as caracteristicas da fonte: tipo,bold ou italic, tamanho
$pdf->SetFont('Arial', 'B', 24);

/***  informar os dados que quero que apareçam no relatório */

//crio a célula: largura,altura, texto,border,saltar uma linha depois desta celula,centrar texto na celula: C ,L, R
$pdf->Cell(950, 200, utf8_decode('Registo de Utilizador'), 0, 30, "C");

//saltar linhas: numero de linhas
$pdf->Ln(3);

//imagem tipo logo
//$pdf->Image('assets/dist/img/gim.png',10,8, 150);


//cabeçalho da tabela
$pdf->SetFont('Arial', 'I', 10);

//colunas da tabela
$pdf->Cell(140, 30, utf8_decode('Emitido: ' . $data), 0, 10, "C");
$pdf->Cell(140, 30, utf8_decode('Número de Utilizador: '.count($cliente)), 0, 10, "C");
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(60, 30, utf8_decode("IdUtilizador"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("Nome"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("Morada"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("NIF"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("Telefone"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("Email"), 1, 0, "C");
$pdf->Cell(60, 30, utf8_decode("Password"), 1, 0, "C");
 $pdf->Ln(); //salta uma linha

 // criar os dados
foreach ($cliente as $cliente) {
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(60, 30, ($cliente["id"]), 1, 0, "C");
    $pdf->Cell(120, 30,($cliente["nome"]), 1, 0, "C");
    $pdf->Cell(120, 30,($cliente["morada"]), 1, 0, "C");
    $pdf->Cell(120, 30,($cliente["nif"]), 1, 0, "C");
    $pdf->Cell(120, 30,($cliente["telefone"]), 1, 0, "C");
    $pdf->Cell(120, 30,($cliente["email"]), 1, 0, "C");
    $pdf->Cell(60, 30, utf8_decode($cliente["pass"]), 1, 0, "C");
   $pdf->Ln();
}

$pdf->Output();
?>