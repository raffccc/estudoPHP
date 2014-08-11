<?php
/*
 * Dois construtores para incluir c�digo e html: require e include.
 * 
 * Require: Se a p�gina n�o existir, erro.
 * include: Se a p�gina n�o existir, warn.
 * 
 * Se um erro ocorre ao incluir a p�gina, um warn � gerado, mas a execu��o continua.
 * Pode-se silenciar o warn colocando um '@' antes do include ou require.
 * 
 * allow_url_fopen configurado no php.ini? Pode-se incluir p�ginas de site remoto. 
 * Ex: include "http://www.example.com/codelib.php";
 * 
 * Existem os construtores require_once e include_once que previnem a inser��o repetida
 * de um recurso.
 * 
 * As vari�veis do recurso inclu�do ficam vis�veis no escopo em que foram inclu�das.
 * 
 * M�todo get_included_files() retorna um array com o caminho dos arquivos que o 
 * script incluiu ou requiriu (s� as que foram inclu�das com sucesso).
 */
	
@include "basicoOO.php";

echo "<br/> Edison inclu�do, {$ed->name} <br/>";
foreach (get_included_files() as $arquivoIncluido) {
	echo $arquivoIncluido . "<br/>";
}
?>