<?php
### Conjuntos ###

/*
 * União
 */
function arrayUnion($a, $b) {
	$union = array_merge($a, $b); // ocorrem duplicações
	$union = array_unique($union);
	return $union;
}
$first = array(1, "two", 3);
$second = array("two", "three", "four");
var_dump(arrayUnion($first, $second));

/*
 * Interseção
 * 
 * array_intersect(): Retorna um array com os elementos que existem em todos
 * os arrays passados por parâmetro para a função. Se múltiplas chaves têm o 
 * mesmo valor a primeira chave com aquele valor é preservada.
 */
?>

<?php
### Pilhas ###
 
/*
 * array_push() e array_pop()
 */

### Fila ###
/*
 * array_shift() e array_unshift()
 */

//Exemplo de pilha
$callTrace = array();

function enterFunction($name) {
	global $callTrace;
	array_push($callTrace, $name);
	echo "Entering {$name} (stack is now: " . join(' -> ', $callTrace) . ")<br />";
}

function exitFunction() {
	echo "Exiting<br />";
	global $callTrace;
	array_pop($callTrace);
}

function first() {
	enterFunction("first");
	exitFunction();
}

function second() {
	enterFunction("second");
	first();
	exitFunction();
}

function third() {
	enterFunction("third");
	second();
	first();
	exitFunction();
}

first();
third();

?>