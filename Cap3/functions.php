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

<br />

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

<br />

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
 * O valor retornado de uma fun��o dessa n�o pode servir de par�metro para o chamado de outra fun��o (no caso de fun��es com var-args). Ex:
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
	if ($callback !== null) {
		$callback();
	}
}

$callback = function() {
	echo "entrei no callback <br/>";
};

handleEntertainment(new Clown, $callback); // works
//handleEntertainment(new Job, $callback); runtime error Job n�o � Entertainment
?>

<?php
### RETORNANDO VALORES ###

/*
 * M�todos n�o tem tipo de retorno na assinatura do m�todo.
 * Fun��es sem retorno, retornam NULL.
 * 
 * Por padr�o o retorno � por valor, por refer�ncia usa-se o &
 */

$names = array("Fred", "Barney", "Wilma", "Betty");

function &findOne($n) {
	global $names;
	return $names[$n];
}

$person =& findOne(1); // Barney
$person = "Barnetta"; // Muda $names[1] para Barnetta

/*
 * Retornar por refer�ncia muitas vezes n�o � necess�rio.
 * � mais lento que por valor.
 */
?>

<?php
### FUN��ES EM VARI�VEIS ###

/*
 * Supondo uma vari�vel que armazena o valor "funcaoX", podemos
 * chamar a fun��o de mesmo nome assim $variavel();
 * 
 * Fun��es como echo() e isset() n�o podem ser chamado desse modo.
 
 * $which = "echo";
 * $which("hello, world"); //Problema
 * 
 * Caso a fun��o n�o exista ocorre erro.
 */
$funcao = "countList";
if (function_exists ($funcao)) {
	echo $funcao(1, 2, 3);
}
?>

<br/>

<?php
### FUN��ES AN�NIMAS ###

/*
 * Fun��es definidas na chamada do m�todo, de forma localizada.
 */

$array = array("really long string here, boy", "this", "middling length", "larger");
usort($array, function($a, $b) {
	return strlen($a) - strlen($b);
});

print_r($array);
echo "<br/>";

/*
 * Pode-se fazer essas fun��es utilizarem vari�veis no seu escopo. Exemplo:
 */
$array = array("really long string here, boy", "this", "middling length", "larger");
$sortOption = 'random';

//ORDENA RANDOMICAMENTE
usort($array, function($a, $b) use ($sortOption) { 
	if ($sortOption == 'random') {
		return rand(0, 2) - 1;
	}
	else {
		return strlen($a) - strlen($b);
	}
});

print_r($array);
?>