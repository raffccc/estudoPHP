<html>

<head>
	<title>Minha Biblioteca</title>
</head>

<body>

<?php
class ListaLivros {
	const TIPO_CAMPO_UNICO = 1;
	const TIPO_CAMPO_ARRAY = 2;
	const TIPO_CAMPO_CONTAINER = 3;
	
	var $parser;
	var $record = array();
	var $campoAtual = '';
	
	var $tipoCampo = array(
				'title' => self::TIPO_CAMPO_UNICO,
				'author' => self::TIPO_CAMPO_ARRAY,
				'isbn' => self::TIPO_CAMPO_UNICO,
				'comment' => self::TIPO_CAMPO_UNICO);
	
	var $terminaRecord = array('book' => true);
	var $records;
	
	function __construct($nomeArquivo) {
		$this->parser = xml_parser_create();
		xml_set_object($this->parser, $this);
		xml_set_element_handler($this->parser, "elementoIniciou", "elementoTerminou");		
		xml_set_character_data_handler($this->parser, "manipulaCData");	
		
		$xml = join('', file($nomeArquivo));
		
		xml_parse($this->parser, $xml);
		xml_parser_free($this->parser);
	}
	
	function elementoIniciou($parser, $elemento, &$attributos) {
		$elemento = strtolower($elemento);
		if (array_key_exists($elemento, $this->tipoCampo)) {
			$this->campoAtual = $elemento;
		} else {
			$this->campoAtual = '';
		}
	}
	
	function elementoTerminou($parser, $elemento) {
		$elemento = strtolower($elemento);
		if (array_key_exists($elemento, $this->terminaRecord)) {
			$this->records[] = $this->record;
			$this->record = array();
		}
		$this->campoAtual = '';
	}
	
	function manipulaCData($parser, $texto) {
		if ($this->campoAtual) {
			if ($this->tipoCampo[$this->campoAtual] == self::TIPO_CAMPO_UNICO) {
				if (!array_key_exists($this->campoAtual, $this->record)) {
					$this->record[$this->campoAtual] = $texto;
				} else {
					$this->record[$this->campoAtual] .= $texto;
				}
			} else if ($this->tipoCampo[$this->campoAtual] == self::TIPO_CAMPO_ARRAY) {
				$this->record[$this->campoAtual][] = $texto;
			}
		}
	}
	
	function mostraMenu() {
		echo "<table>\n";
		foreach ($this->records as $livro) {
			echo "<tr>";
			echo "<th>";
			echo "<a href=\"{$_SERVER['PHP_SELF']}?isbn={$livro['isbn']}\">{$livro['title']}</a>";
			echo "</th>";
			echo "<td>" . join(', ', $livro['author']) . "</td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
	
	function mostraLivro($isbn) {
		foreach ($this->records as $livro) {
			if ($livro['isbn'] == $isbn) {
				echo "<p><b>{$livro['title']}</b> por " . join(', ', $livro['author']) . "<br />";
				echo "ISBN: {$livro['isbn']}<br />";
				echo "Comentario: {$livro['comment']}</p>\n";
			}
		}
		echo "<p>De volta para a <a href=\"{$_SERVER['PHP_SELF']}\">lista de livros</a>.</p>";
	}
}

$library = new ListaLivros("livros.xml");
if (isset($_GET['isbn'])) {
	//Retorna a informação para um livro.
	$library->mostraLivro($_GET['isbn']);
} else {
	//Mostra a lista de livros
	$library->mostraMenu();
}
?>

</body>

</html>