<?php
require("fpdf/fpdf.php") ;

### O TEXTO ###

/*
 * Parâmetros do construtor
 *
 * - Orientação: P (Portrait, Default), L (Landscape)
 * - Unidade de Medida: pt (1/72 de um inch, default), in, mm, cm
 * - Tamanho da Página: Letter (Default), Legal, A5, A3, A4 ou tamanho customizável.
 */

//Página toda em inches
$pdf = new FPDF('P', 'in', 'Letter');

$pdf->addPage();
$pdf->setFont('Arial', 'B', 24);

/*
 * cell(float w [, float h [, string txt [, mixed border[, int ln [, string align [, int fill [, mixed link]]]]]]]);
*
* 	- w: width
* 	- h: height
* 	- txt: texto
* 	- border:
* 	- ln: controle de nova linha
* 	- align: Alinhamento
* 	- fill: Cir de vacjgriybd
* 	- link: se deseja que o conteúdo seja um link
*/
$pdf->cell(0, 0, "Top Left!", 0, 1, 'L');
$pdf->cell(6, 0.5, "Top Right!", 1, 0, 'R');

//Move 4.5 inches para baixo
$pdf->ln(4.5);

$pdf->cell(0, 0, "This is the middle!", 0, 0, 'C');

//Move 5.3 inches para baixo
$pdf->ln(5.3);

$pdf->cell(0, 0, "Bottom Left!", 0, 0, 'L');
$pdf->cell(0, 0, "Bottom Right!", 0, 0, 'R');

$pdf->output();
?>