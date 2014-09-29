<head>
	<meta charset="UTF-8"/>
</head>

<?php
### Buffering de output ###
/*
 * ob_start([callback]): altera a saída do programa para um buffer
 * 		- callback: função chamada quando o buffer vai ser limpo
 * 
 * ob_get_length(): se buffering estiver desabilitado retorna false.
 * ob_get_contents(): se buffering estiver desabilitado retorna false.
 * 
 * ob_clean(): limpa o buffer mas não desliga o buffering
 * ob_end_clean(): limpa o buffer e desabilita o buffering
 * 
 * ob_flush(): manda o conteúdo do buffer para o servidor e limpa o buffer
 * ob_end_flush(): manda o conteúdo do buffer para o servidor, limpa o buffer e desabilita o buffering.
 */
ob_start();
phpinfo();
$phpinfo = ob_get_contents();
ob_end_clean();

if (strpos($phpinfo, "module_gd") === false) {
	echo "Você não tem suporte aos gráficos GD no seu PHP, desculpe.";
} else {
	echo "Parabéns! Você tem suporte aos gráficos GD.";
}
?>

<?php
### Compressão do output ###
/*
 * Função ob_gzhandler comprime o output de acordo com o header Accept-Encoding enviado pelo browser
 * 
 * Pode-se modificar o php.ini para que esse callback seja feito em toda página, sem a necessidade do ob_start,
 * modificando o output_handler=ob_gzhandler.
 */
ob_start('ob_gzhandler'); 
?>