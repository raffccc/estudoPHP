<?php

/*
 * Funções php podem possuir código html
 * Por convenção, todas as funções php são chamadas com todas as letras minúsculas
 * São case insensitive
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
 * Pode-se declarar funções uma dentro da outra. 
 * As funções internas podem ser chamadas normalmente externamente. 
 * A função interna não pega os argumentos da função externa automaticamente.
 * A função interna não pode ser chamada até a função externa ter sido chamada primeiro.
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
###ESCOPO DAS VARIÁVEIS###

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
	static $count = 0; //Só tem esse valor quando counter() é chamado pela primeira vez.
	return $count++;
}
for ($i = 1; $i <= 5; $i++) {
	print counter();
}
?>

<br />

<?php
##PARÂMETROS DE FUNÇÃO##

//Passagem de parâmetro por valor
function imprime($valor) {
	echo $valor . "<br/>";
}
imprime("abc");

$a = 3;
/*
 * Passagem de parâmetro por referência, colca-se & antes.
 * Só aceita variáveis, dobrar(7), por exemplo, daria problema.
 */
function dobrar(&$valor) {
	$valor *= 2;
}
dobrar($a);
echo $a . "</br>";

//Parâmetros default, não pode ser uma expressão complexa
function getPreferences($whichPreference = 'all') {
	// if $whichPreference is "all", return all prefs;
	// otherwise, get the specific preference requested...
}

//Número variável de parâmetros (como o var-args do java), função não pode ter parâmetro.
/*
 * func_get_args(): retorna um array com os parâmetros providos à função
 * func_num_args(): número de parâmetros
 * func_get_arg(num_do_parâmetro)
 * 
 * O valor retornado de uma função dessa não pode servir de parâmetro para o chamado de outra função (no caso de funções com var-args). Ex:
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
 * Numa função com dois parâmetros, por exemplo, se passar apenas um parâmetro
 * o outro fica null e um warn é gerado.
 */

/*
 * Pode-se tipar os parâmetros da função com uma classe (ou instâncias que estendem ou implementam essa classe),
 * instância que implementa uma interface. array ou callable.
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
//handleEntertainment(new Job, $callback); runtime error Job não é Entertainment
?>

<?php
### RETORNANDO VALORES ###

/*
 * Métodos não tem tipo de retorno na assinatura do método.
 * Funções sem retorno, retornam NULL.
 * 
 * Por padrão o retorno é por valor, por referência usa-se o &
 */

$names = array("Fred", "Barney", "Wilma", "Betty");

function &findOne($n) {
	global $names;
	return $names[$n];
}

$person =& findOne(1); // Barney
$person = "Barnetta"; // Muda $names[1] para Barnetta

/*
 * Retornar por referência muitas vezes não é necessário.
 * É mais lento que por valor.
 */
?>

<?php
### FUNÇÕES EM VARIÁVEIS ###

/*
 * Supondo uma variável que armazena o valor "funcaoX", podemos
 * chamar a função de mesmo nome assim $variavel();
 * 
 * Funções como echo() e isset() não podem ser chamado desse modo.
 
 * $which = "echo";
 * $which("hello, world"); //Problema
 * 
 * Caso a função não exista ocorre erro.
 */
$funcao = "countList";
if (function_exists ($funcao)) {
	echo $funcao(1, 2, 3);
}
?>

<br/>

<?php
### FUNÇÕES ANÔNIMAS ###

/*
 * Funções definidas na chamada do método, de forma localizada.
 */

$array = array("really long string here, boy", "this", "middling length", "larger");
usort($array, function($a, $b) {
	return strlen($a) - strlen($b);
});

print_r($array);
echo "<br/>";

/*
 * Pode-se fazer essas funções utilizarem variáveis no seu escopo. Exemplo:
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