<?php
/*
 * Dois construtores para incluir código e html: require e include.
 * 
 * Require: Se a página não existir, erro.
 * include: Se a página não existir, warn.
 * 
 * Se um erro ocorre ao incluir a página, um warn é gerado, mas a execução continua.
 * Pode-se silenciar o warn colocando um '@' antes do include ou require.
 * 
 * allow_url_fopen configurado no php.ini? Pode-se incluir páginas de site remoto. 
 * Ex: include "http://www.example.com/codelib.php";
 * 
 * Existem os construtores require_once e include_once que previnem a inserção repetida
 * de um recurso.
 * 
 * As variáveis do recurso incluído ficam visíveis no escopo em que foram incluídas.
 * 
 * Método get_included_files() retorna um array com o caminho dos arquivos que o 
 * script incluiu ou requiriu (só as que foram incluídas com sucesso).
 */
	
@include "basicoOO.php";

echo "<br/> Edison incluído, {$ed->name} <br/>";
foreach (get_included_files() as $arquivoIncluido) {
	echo $arquivoIncluido . "<br/>";
}
?>