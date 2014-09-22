<?php
/*
 * Biblioteca FPDF
 */
require("fpdf/fpdf.php") ;

$pdf = new FPDF('L');
$pdf->addPage();

/*
 * cell(float w [, float h [, string txt [, mixed border[, int ln [, string align [, int fill [, mixed link]]]]]]]);
*
* 	- w: width
* 	- h: height
* 	- txt: texto
* 	- border:
* 	- ln: controle de nova linha
* 	- align: Alinhamento
* 	- fill: Cor de background
* 	- link: se deseja que o conteúdo seja um link
*/
$pdf->setFont("Arial", '', 12);

//R G e B com mesmo valor 128.
$pdf->SetTextColor(128);
$pdf->Cell(0, 5, "Texto em Arial tamanho 12, alinhado a esquerda, sem borda.", 0, 1, 'L');
//nova linha
$pdf->ln();

$pdf->setFont("Arial", 'IBU', 20);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0, 15, "Texto em Arial tamanho 20, italico, bold e underscore, alinhado a esquerda", 0, 0, 'L');
$pdf->ln();

$pdf->SetTextColor(0,255,0);
$pdf->setFont("Times", 'IU', 15);
$pdf->Cell(0, 5, "Texto em Times tamanho 15, italico e underscore, alinhado a esquerda", 0, 0, 'L');

$pdf->Output();
?>