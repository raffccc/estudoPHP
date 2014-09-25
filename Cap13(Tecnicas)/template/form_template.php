<?php
require_once 'funcoesTemplate.php';

$bindings['DESTINO'] = $_SERVER['PHP_SELF'];
$nome = "";

if (array_key_exists('nome', $_GET)) {
	$nome = $_GET['nome'];
}

if (!empty($nome)) {
	// do something with the supplied values
	$template = "obrigado.template";
	$bindings['NOME'] = $nome;
} else {
	$template = "usuario.template";
}

echo preencherTemplate($template, $bindings);	
?>