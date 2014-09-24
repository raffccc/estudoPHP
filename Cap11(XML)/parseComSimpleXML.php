<?php
/*
 * DOM transforma o XML em um objeto onde as tags são atributos. Usado em XMLs simples.
 * 
 * Recebe arquivo, string ou um documento DOM (usando a extensão DOM) e gera um objeto.
*/
$document = simplexml_load_file("livros.xml");

foreach ($document->book as $livro) {
	echo $livro->title . "<br/>";
}

echo "<br/>Imprimira os atributos!<br/>";

/*
 * children(): Itera-se no filhos de um dado nó.
 * attributes(): Itera nos atributos do nó.
 */
foreach ($document->book->children() as $tag) {
	foreach ($tag->attributes() as $atributo) {
		echo "{$atributo}<br/>";
	}
}

/*
 * asXml(): Converte o objeto para o xml.
 */
foreach ($document->children() as $book) {
	$book->title = "Titulo Atualizado";
}
file_put_contents("BookList.xml", $document->asXml());
?>