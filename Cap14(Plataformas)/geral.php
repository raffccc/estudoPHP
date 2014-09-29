<head>
	<meta charset="UTF-8"/>
</head>

<?php
/*
 * Constante PHP_OS: "HP-UX", "Darwin" (Mac OS), "Linux", "SunOS", "WIN32" e "WINNT"
 * php_uname(): Mais informações sobre o SO.
 */
if (PHP_OS == 'WIN32' || PHP_OS == 'WINNT') {
	echo "Você está usando Windows";
} else {
	echo "Não está usando Windows.";
}

echo "<br/>" . php_uname();

/*
 * Caminhos com / ou \ são tratados igualmente no PHP
 */
?>

<?php
/*
 * Ambiente do servidor
 * 
 * $_SERVER: Informações do servidor e ambiente de execução.
 */ 
var_dump($_SERVER);
?>

<?php
/*
 * feof(): Identifica fim de arquivo tanto no windows como no Unix.
 */ 
?>

<?php
/*
 * Windows não permite ambiente multithreaded
 */ 
?>