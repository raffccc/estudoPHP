<?php
/*
 * 3 Formas de Parse:
 * - Orientada a eventos
 * - Orientada a DOM
 * - Biblioteca para transformar documentos XML simples, SimpleXML
 */

### Biblioteca orientada a eventos ###

### Manipulador de Elemento ###
/*
 * xml_set_element_handler(parser, start_element, end_element);
 * 		- start_element e end_element: Nomes das funções a serem chamadas quando encontra o começo ou fim de um elemento.
 * 
 * startElementHandler(parser, element, &attributes);
 * 		- parser: XML parser que chamou o handler
 * 		- element: Nome do elemento que foi aberto
 * 		- attributes: Atributos que o parser encontrou para o elemento.
 * 
 * O seguinte exemplo imprime o nome do elemento em negrito e seus atributos em cinza.
 */
function startElement($parser, $name, $attributes) {
	$outputAttributes = array();
	if (count($attributes)) {
		foreach ($attributes as $key -> $value) {
			$outputAttributes[] = "<font color=\"gray\">{$key}=\"{$value}\"</font>";
		}
	}
	echo "&lt;<b>{$name}</b> " . join(' ', $outputAttributes) . "&gt;" ;
}

/*
 * endElementHandler(parser, element):
 * 		- parser: XML parser que chamou o handler
 * 		- element: Nome do elemento que está sendo fechado
 */
function endElement($parser, $name) {
	echo "&lt;<b>/{$name}</b>&gt;<br/>";
}
?>

<?php
/*
 * ### Manipulador de dados de caracteres ###
 * 
 * xml_set_character_data_handler(parser, handler): Chamado depois do bloco de dados
 * 
 * characterDataHandler(parser, cdata);
 */ 
function characterData($parser, $data) {
	echo $data;
}
?>

<?php
/*
 * ### Processando Instruções ###
 * 
 * xml_set_processing_instruction_handler(parser, handler): Chamado quando uma instrução é encontrada
 * 		- Uma instrução parece com <? target instructions ?>
 * 
 * processingInstructionHandler(parser, target, instructions)
 */
function processing_instruction($parser, $target, $code) {
	if ($target === 'php') {
		eval($code);
	}
} 
?>

<?php
### Manipulador de Entidade ###

/*
 * Entidades são &lt; &gt; ....
 * 
 * Documentos XML podem definir suar próprias entidades.
 * 
 * Dois tipos de entidades: Externas e Unparsed:
 * 	1) O texto que substituirá é identificado por um nome de arquivo ou URL, ao invés de estar no próprio XML.
 *  2) Deve ser acompanhada por uma declaração de anotação.
 *  	<!DOCTYPE doc [
 *			<!NOTATION jpeg SYSTEM "image/jpeg">
 *			<!ENTITY logo SYSTEM "php-tiny.jpg" NDATA jpeg>
 *		]>
 *  
 *  1) xml_set_external_entity_ref_handler(parser, handler);
 *  
 *  externalEntityHandler(parser, entity, base, system, public):
 *  	- entity: Nome da entidade
 *  	- base: URI base para resolver o identificador da entidade
 *  	- system: Identificador do sistema (como o nome do arquivo)
 *  	- public: Identificador público para a entidade, como definido na declaração da entidade.
 */
function externalEntityReference($parser, $names, $base, $systemID, $publicID) {
	if ($systemID) {
		if (!list ($parser, $fp) = createParser($systemID)) {
			echo "Error opening external entity {$systemID}<br/>";
			return false;
		}
		return parse($parser, $fp);
	}
	return false;
}

/*
 * 2) xml_set_notation_decl_handler(parser, handler);
 * 
 * notationHandler(parser, notation, base, system, public)
 * 
 * xml_set_unparsed_entity_decl_handler(parser, handler);
 * 
 * unparsedEntityHandler(parser, entity, base, system, public, notation):
 * 		- notation identifica a declaração de notation que a entidade unparsed está associada.
 *  
 */
?>

<?php
### Manipulador Padrão ###
 
/*
 * Chamado em qualquer outro evento como declaração XML e tipo de documento XML.
 * 
 * xml_set_default_handler(parser, handler);
 * 
 * defaultHandler(parser, text);
 */
function defaultHandler($parser, $data) {
	echo "<font color=\"red\">XML: Manipulador padrão chamado com '{$data}'</font><br/>";
}
?>

<?php
### Opções ###

/*
 * xml_parser_set_option(parser, option, value): Controla as opções do parser.
 * 
 * $value = xml_parser_get_option(parser, option);
 * 
 * ## Character encoding ###
 * - Padrão é ISO-8859-1. Se caractere inválido for encontrado, erro é retornado e o parsing é abandonado.
 * - Constante XML_OPTION_TARGET_ENCODING  é a que diz qual o encoding deve ser usado no texto enviado aos callbacks.
 * 
 * ## Case Folding ##
 * - Por padrão nomes de elemtnsoe e atributos ficam todos em maiúsculo.
 * - XML_OPTION_CASE_FOLDING para false para mudare sse comportamento.
 * xml_parser_set_option(XML_OPTION_CASE_FOLDING, false);
 */
?>

<?php
### Usando o Parser ###

/*
 * 1) $parser = xml_parser_create([encoding]): cria o parser
 * 2) Seta os manipuladores e as opções no parser
 * 3) Passa os dados para o parser com o xml_parse() até acabarem os dados ou dar um erro
 * 4) xml_parser_free() para liberar o parser
 * 
 * $success = xml_parse(parser, data[, final ]);
 * 		- final pe true para o último pedaço de dado a ser processado.
 * 
 */
function createParser($filename) {
	//r é readonly
	$fh = fopen($filename, 'r');
	
	$parser = xml_parser_create();
	xml_set_element_handler($parser, "startElement", "endElement");
	xml_set_character_data_handler($parser, "characterData");
	xml_set_processing_instruction_handler($parser, "processing_instruction");
	xml_set_default_handler($parser, "defaultHandler");
	return array($parser, $fh);
}

function parse($parser, $fh) {
	$blockSize = 4 * 1024; // read in 4 KB chunks
	while ($data = fread($fh, $blockSize)) {
		if (!xml_parse($parser, $data, feof($fh))) {
			// an error occurred; tell the user where
			echo 'Parse error: ' . xml_error_string($parser) . " at line " . xml_get_current_line_number($parser);
			return false;
		}
	}
	return true;
}

//list copia os valores do array para as variáveis
if (list($parser, $fh) = createParser("livros.xml")) {
	parse($parser, $fh);
	fclose($fh);
	xml_parser_free($parser);
}

/*
 * Pode-se carregar no parser o objeto que conterá os métodos de handling. O parser buscará os métodos no escopo
 * do objeto ao invés de procurar nas funções globais.
 * 
 * xml_set_object(object);
 */
?>