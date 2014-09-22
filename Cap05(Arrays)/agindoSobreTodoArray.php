<?php
### Calculando a soma de um array ###
/*
 * $sum = array_sum(array): soma os valores
 */
$scores = array(98, 76, 56, 80);
echo array_sum($scores) . "<br/>"; // $total = 310
?>

<?php
### Merge entre arrays ### 
/*
 * $merged = array_merge(array1, array2 [, array ... ]): Se uma chave numérica já foi usada em outro array, a mesma é substituída.
 * Se a chave é string o valor é substituído pelo novo.
 */
$first = array("hello", "world"); // 0 => "hello", 1 => "world"
$second = array("exit", "here"); // 0 => "exit", 1 => "here"
var_dump(array_merge($first, $second));
// $merged = array("hello", "world", "exit", "here")

$first = array('bill' => "clinton", 'tony' => "danza");
$second = array('bill' => "gates", 'adam' => "west");
var_dump(array_merge($first, $second));
// $merged = array('bill' => "gates", 'tony' => "danza", 'adam' => "west")
?>

<?php
### Calculando a diferença entre arrays(valores presentes no primeiro e não no segundo) ###
 
 /*
  * $diff = array_diff(array1, array2 [, array ... ]);
  * São comparados com '==='
  * Os índices são mantidos
  */
$a1 = array("bill", "claire", "ella", "simon", "judy");
$a2 = array("jack", "claire", "toni");
$a3 = array("ella", "simon", "garfunkel");
// Valores em $a1 não presentes em $a2 ou $a3
var_dump(array_diff($a1, $a2, $a3));
?>

<?php
### Filtrando elementos do array ###

/*
 * $filtered = array_filter(array, callback): Array filtrado contém apenas os elementos 
 * em que a função de callback retorna true. Chaves são mantidas.
 */
$isOdd = function($element) {
	return $element % 2;
};
$numbers = array(9, 23, 24, 27);
var_dump(array_filter($numbers, $isOdd));
?>