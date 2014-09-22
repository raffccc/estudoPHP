<?php
/*
 * No seguinte exemplo vamos conectar ao banco de dados e listar
 * os livros no pdf
 */
require_once 'fpdf/fpdf.php';

class TabelaPDF extends FPDF {
	function buildTable($cabecalho, $dado) {
		$this->setFillColor(255, 0, 0);
		$this->setTextColor(255);
		$this->setDrawColor(128, 0, 0);
		$this->setLineWidth(0.3);
		$this->setFont('', 'B');
		
		$larguras = array(85, 40, 15);
		
		//Monta o cabeçalho
		for ($i = 0; $i < count($cabecalho); $i++) {
			$this->cell($larguras[$i], 7, $cabecalho[$i], 1, 0, 'C', 1);
		}
		
		$this->ln();
		
		//Reiniciando as cores para o texto
		$this->setFillColor(175);
		$this->setTextColor(0);
		$this->setFont('');
		
		$preenchido = 0;
		$url = "http://www.oreilly.com";
		
		foreach ($dado as $linha) {
			/*
			 * cell(largura [, altura [, texto [, borda[, quebraLinha [, alinhamento [, preenchimento [, link]]]]]]]);
			 */
			$this->cell($larguras[0], 6, $linha[0], 'LR', 0, 'L', $preenchido);
			
			//Cores de estilo de link
			$this->setTextColor(0, 0, 255);
			$this->setFont('', 'U');
			//LR de bordas à esquerda e direita
			$this->cell($larguras[1], 6, $linha[1], 'LR', 0, 'L', $preenchido, $url);
			
			//Cores normais novamente
			$this->setTextColor(0);
			$this->setFont('');
			$this->cell($larguras[2], 6, $linha[2], 'LR', 0, 'C', $preenchido);
			
			$this->ln();
			$preenchido = ($preenchido) ? 0 : 1;
		}
		
		//T de Top
		$this->cell(array_sum($larguras), 0, '', 'T');
	}
}

//Mongo
$db = new SQLite3("C:/Rafael/biblioteca.sqlite");

$sql = "SELECT * FROM livros ORDER BY titulo";
$resultado = $db->query($sql);

//Monta um array com os dados
while ($linha = $resultado->fetchArray()) {
	$dados[] = array($linha['titulo'], $linha['ISBN'], $linha['anoPublicacao']);
}

//Começa a montar o PDF
$pdf = new TabelaPDF();

//Colunas
$cabecalho = array("Titulo", "ISBN", "Ano");
$pdf->setFont("Arial", '', 14);
$pdf->addPage();
$pdf->buildTable($cabecalho, $dados);
$pdf->output();
?>