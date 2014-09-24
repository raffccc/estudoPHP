<?php
/*
 * DOM transforma o XML em uma árvore de elementos
 */
$parser = new DOMDocument();
$parser->load("livros.xml");

processarTags($parser->documentElement);

function processarTags(DOMElement $tag) {
	foreach ($tag->childNodes as $filho) {
		if ($filho->nodeType == XML_TEXT_NODE) {
			if (strlen(trim($filho->nodeValue))) {
				echo $filho->nodeValue . "<br/>";
			}
		} else if ($filho->nodeType == XML_ELEMENT_NODE) {
			processarTags($filho);
		}
	}
}
?>