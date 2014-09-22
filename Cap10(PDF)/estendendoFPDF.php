<?php
require_once 'fpdf/fpdf.php';

class MeuFPDF extends FPDF {
	
	/*
	 * Sobrescrevendo do FPDF, esse método é vazio lá.
	 */
	function header() {
		global $title;
		
		$this->setFont("Times", '', 12);
		
		//Cor das linhas, retângulos e bordas
		$this->setDrawColor(0, 0, 180);
		
		$this->setFillColor(230, 0, 230);
		$this->setTextColor(0, 0, 255);
		$this->setLineWidth(1);
		
		$width = $this->getStringWidth($title) + 150;
		
		$this->image("php.png", 10, 10.5, 15, 8.5);
		
		//Se ativar o último parâmetro com 1, mostra o background com a cor do fillcolor e não mostra a imagem.
		$this->cell($width, 9, $title, 1, 1, 'C');
		$this->ln(10);
	}
	
	/*
	 * Sobrescrevendo do FPDF, esse método é vazio lá.
	*/
	function footer() {
		//1.5 cm do rodapé
		$this->setY(-15);
		$this->setFont("Arial", 'I', 8);
		
		//nb é um alias para AliasNbPages(), conta o número total de páginas
		$this->cell(0, 10, "Este e o rodape -> Pagina {$this->pageNo()}/{totalPaginas}", 0, 0, 'C');
	}
}

$title = "FPDF Library Page Header";
$pdf = new MeuFPDF('P', 'mm', 'Letter');

//Cria o alias para o total de páginas, o default é {nb}.
$pdf->aliasNbPages('{totalPaginas}');
$pdf->addPage();

$pdf->setFont("Times", '', 24);
$pdf->cell(0, 0, "some text at the top of the page", 0, 0, 'L');
$pdf->ln(225);

$pdf->cell(0, 0, "More text toward the bottom", 0, 0, 'C');

$pdf->addPage();
$pdf->setFont("Arial", 'B', 15);
$pdf->cell(0, 0, "Top of page 2 after header", 0, 1, 'C');

/*
 * 2 tipos de links:
 * 
 * 1) Âncoras, dentro do mesmo doc. Primeiro usa o addLink(), ele retorna um handler para ser usando no setLink()
 * 2) URLs, para fora do doc. Pode ser usado no image(), cell() ou write().
 * 
 * Vamos ao nosso lindo exemplinho
 */
$pdf->write(20, "Para um link para a proxima pagina - Clique ");

$pdf->setFont('', 'U');
$pdf->setTextColor(0, 0, 255);
$linkPagina3 = $pdf->addLink();
$pdf->write(20, "aqui", $linkPagina3);
$pdf->setFont('');


//Página 3
$pdf->addPage();

//Link leva para essa imagem
$pdf->setLink($linkPagina3);

//Imagem leva para a página do PHP
$pdf->image("php.png", 10, 25, 30, 0, '', "http://www.php.net");

$pdf->ln(20);
$pdf->setTextColor(1);
$pdf->cell(0, 5, "Clique no seguinte link ou clique na imagem", 0, 1, 'L');

$pdf->setFont('', 'U');
$pdf->setTextColor(0,0,255);
$pdf->write(5, "www.oreilly.com", "http://www.oreilly.com");

$pdf->output();
?>