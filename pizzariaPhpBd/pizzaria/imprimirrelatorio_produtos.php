<?php
session_start();
require('fpdf/fpdf.php');
include 'config.php';

// ligação à bd
$link = $con;

//imprimir data
$data = date('d-m-Y');

//declarar a query
$sql = "select * from produtos";

//executar a query
$run = $link->query($sql);

//fecha a ligação à bd
$link->close();

//traz os resultados da bd e guarda num array
while ($row = mysqli_fetch_array($run)) {
    $grupo[] = $row;
}

//copia os valores do array para a variavel, que contém todos os registos da bd
$produto = $grupo;

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
$pdf->Cell(950, 200, utf8_decode('Registo de Produto'), 0, 30, "C");

//saltar linhas: numero de linhas
$pdf->Ln(3);

//imagem tipo logo
//$pdf->Image('assets/dist/img/gim.png',10,8, 150);


//cabeçalho da tabela
$pdf->SetFont('Arial', 'I', 10);

//colunas da tabela
$pdf->Cell(140, 30, utf8_decode('Emitido: ' . $data), 0, 10, "C");
$pdf->Cell(140, 30, utf8_decode('Número de Produtos: '.count($produto)), 0, 10, "C");
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(60, 30, utf8_decode("IdProduto"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("Nome"), 1, 0, "C");
$pdf->Cell(120, 30, utf8_decode("Preço"), 1, 0, "C");
 $pdf->Ln(); //salta uma linha

 // criar os dados
foreach ($produto as $produto) {
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(60, 30, ($produto["id"]), 1, 0, "C");
    $pdf->Cell(120, 30,($produto["nome"]), 1, 0, "C");
    $pdf->Cell(120, 30,($produto["preco"]), 1, 0, "C");
   $pdf->Ln();
}

$pdf->Output();
?>