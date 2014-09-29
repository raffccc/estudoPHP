<head>
	<meta charset="UTF-8"/>
</head>

<?php
### Reportando o erro. ###
/*
 * Mudar no php.ini a opção error_reporting ou usando a função error_reporting()
 * 
 * Elas recebem que erros devem ser exibidos. 
 * Ex: exibir todos os tipos de ERRO,
 * (E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR)
 * Esse indica todos as opções menos notices de runtime:
 * (E_ALL & ~E_NOTICE) 
 */
?>

<?php
### Supressão de erro. ###
/*
 * Basta colocar o @ antes da expressão. Ele não consegue capturar erros de parse, só runtime errors.
 * 
 * Pode-se desabilitar a informação de erro totalmente utilizando error_reporting(0); Todos os erros não serão
 * exibidos, exceto os de parse.
 */
$valor = @(2/0);
?>

<?php
### Disparando erros ###
/*
 * trigger_error(message [, type]);
 * 	- type: ex: E_USER_ERROR, E_USER_NOTICE(default)...
 */ 
function dividir($a, $b) {
	if ($b==0) {
		trigger_error("Divisão por zero!", E_USER_ERROR);
	}
	return $a/$b;
}

echo dividir(6, 3);
?>

<?php
### Definindo manipuladores de erro ###
 /*
  * Criar uma função de manipulação de erro e registrá-la com set_error_handler(), retorna o manipulador de erro atual.
  * Função deve ter 2 a 5 parâmetros. 
  * 	- Os 2 primeiros são o código de erro e uma string descrevendo-o.
  * 	- Os outros 3 parâmetros são o nome do arquivo em que o erro ocorreu, número da linha que o erro ocorreu e uma cópia da tabela de símbolos ativa no momento que o erro ocorreu.
  * A função deve verificar o nível de erros atual sendo reportados com error_reporting()
  */
function mostrarErro($erro, $descricao, $nomeArquivo, $linha, $simbolos) {
	echo "<p>Erro '<b>$descricao</b>' ocorreu.<br />";
	echo "-- no arquivo '<i>$nomeArquivo</i>', linha $linha.</p>";
}

set_error_handler('mostrarErro');
$value = 4 / 0; //erro de divisão por zero

/*
 * ### Logando os erros ###
 * 
 * error_log(message, type [, destination [, extra_headers ]]);
 * 	- type: Onde o erro é logado. 0 - Loga o erro via mecanismo de log padrão do PHP, pode-se mudar o lugar onde o php loga mexendo no atributo error_log do php.ini
 * 								  1 - Manda o email para o atributo destination, opcionalmente adicionando extra_headers à mensagem
 * 								  3 - Loga no arquivo destination
 * 
 * 
 */

/*
 * ### Bufferizando a saída em manipuladores de erro ###
 * 
 */
?>