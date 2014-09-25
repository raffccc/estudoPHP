<?php
function preencherTemplate($nome, $valores = array(), $tratamento = "apagar") {
	$templateFile = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $nome;
	if ($file = fopen($templateFile, 'r')) {
		$template = fread($file, filesize($templateFile));
		fclose($file);
	}
	
	$chaves = array_keys($valores);
	foreach ($chaves as $chave) {
		//substitui todas as chaves no template, onde existir
		$template = str_replace("{{$chave}}", $valores[$chave], $template);
	}
	
	if ($tratamento == 'apagar') {
		//Apaga as chaves que sobraram
		$template = preg_replace('/{[^ }]*}/i', '', $template);
	} else if ($unhandled == 'comentar') {
		//Comenta as chaves que sobraram
		$template = preg_replace('/{([^ }]*)}/i', '<!-- \\1 indefinido -->', $template);
	}
	return $template;
}
?>