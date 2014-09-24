<?php
/*
 * XSLT: Extensible Stylesheet Language Transformations
 * 
 * Transforma XML em HTML, XML diferente ou qualquer outro formato.
 */

//1º) Criar o processador XSLT
$processor = new XSLTProcessor();

//2º) Dar input de transformação 
$xsl = new DOMDocument();
$xsl->load("rules.xsl");
$processor->importStyleSheet($xsl);

//3º) Realizar a transformação utilizando transformToDoc(), transformToUri() ou transformToXml()
$xml = new DomDocument;
$xml->load("feed.xml");
$result = $processor->transformToXml($xml);

echo "<pre>{$result}</pre>"
?>