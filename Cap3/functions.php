<?php

/*
 * Fun��es php podem possuir c�digo html
 * Por conven��o, todas as fun��es php s�o chamadas com todas as letras min�sculas
 * S�o case insensitive
 */
function coluna() { ?>
	<td></td>
<?php 
}
?>

<html>
	<body>
		<table border="1">
			<tr>
				<?= coluna() ?>
				<td>col2</td>
			</tr>
			<tr>
				<td>oi</td>
				<td>teste</td>
			</tr>
		</table>
	</body>
</html>		

<?php 
/*
 * Pode-se declarar fun��es uma dentro da outra. 
 * As fun��es internas podem ser chamadas normalmente externamente. 
 * A fun��o interna n�o pega os argumentos da fun��o externa automaticamente.
 * A fun��o interna n�o pode ser chamada at� a fun��o externa ter sido chamada primeiro.
 */

function outer($a) {
	function inner($b)	{
		echo "there $b";
	}
	echo "$a, hello";
}
// outputs "well, hello there reader"
outer("well");
inner("reader");
?>

<br/>

<?php
###ESCOPO DAS VARI�VEIS###

//GLOBAL
$a = 2;
function incrementaA() {
	global $a;
	//ou $a = $GLOBALS['a'];
	$a++;
}
incrementaA();
echo $a;

//STATIC
function counter() {
	static $count = 0; //S� tem esse valor quando counter() � chamado pela primeira vez.
	return $count++;
}
for ($i = 1; $i <= 5; $i++) {
	print counter();
}
?>

<br/>

<?php
##PAR�METROS DE FUN��O##

//Passagem de par�metro por valor
function imprime($valor) {
	echo $valor . "<br/>";
}
imprime("abc");

$a = 3;
/*
 * Passagem de par�metro por refer�ncia, colca-se & antes.
 * S� aceita vari�veis, dobrar(7), por exemplo, daria problema.
 */
function dobrar(&$valor) {
	$valor *= 2;
}
dobrar($a);
echo $a . "</br>";

//Par�metros default, n�o pode ser uma express�o complexa
function getPreferences($whichPreference = 'all') {
	// if $whichPreference is "all", return all prefs;
	// otherwise, get the specific preference requested...
}

//N�mero vari�vel de par�metros (como o var-args do java), fun��o n�o pode ter par�metro.
/*
 * func_get_args(): retorna um array com os par�metros providos � fun��o
 * func_num_args(): n�mero de par�metros
 * func_get_arg(num_do_par�metro)
 * 
 * O valor retornado de uma fun��o dessa n�o pode servir de par�metro para o chamado de outra fun��o. Ex:
 * 	- funcA(countList(1,2,3));
 * Deve ser feito assim:
 * 	- $a = countList(1,2,3);
 * 	- funcA($a); 
 */
function countList() {
	if (func_num_args() == 0) {
		return false;
	}
	else {
		$count = 0;
		for ($i = 0; $i < func_num_args(); $i++) {
			$count += func_get_arg($i);
		}
		return $count;
	}
}
echo countList(1, 5, 9); // outputs "15"

/*
 * Numa fun��o com dois par�metros, por exemplo, se passar apenas um par�metro
 * o outro fica null e um warn � gerado.
 */

/*
 * Pode-se tipar os par�metros da fun��o com uma classe (ou inst�ncias que estendem ou implementam essa classe),
 * inst�ncia que implementa uma interface. array ou callable.
 */
class Entertainment {}
class Clown extends Entertainment {}
class Job {}
function handleEntertainment(Entertainment $a, callable $callback = NULL){
	echo "Handling " . get_class($a) . " fun\n";
	if ($callback !== NULL) {
		$callback();
	}
}

$callback = function() {
	// do something
};

handleEntertainment(new Clown); // works
//handleEntertainment(new Job, $callback); runtime error Job n�o � Entertainment
?>

<br/>

<?php
### RETORNANDO VALORES ###
?>