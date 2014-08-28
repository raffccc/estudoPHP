<?php
/*
 * Três maneiras de ordenar:
 * 
 * 1) Por chave
 * 2) Por valor sem mudar as chaves
 * 3) Por valor mudando as chaves
 * 
 *  Todas podem ser feitas na ordem crescente, decrescente ou determinada por uma função.
 */

/*
 * 1) Por chave
 * Crescente: ksort();
 * Descrescente: krsort();
 * Definida pelo usuário: uksort();
 */

/*
 * 2) Por valor sem mudar as chaves
 * Crescente: asort();
 * Descrescente: arsort();
 * Definida pelo usuário: uasort();
 */
$logins = array(
		'njt' => 415,
		'kt' => 492,
		'rl' => 652,
		'jht' => 441,
		'jj' => 441,
		'wt' => 402,
		'hut' => 309,
);
arsort($logins);
$numPrinted = 0;
echo "<table>\n";
foreach ($logins as $user => $time) {
	echo("<tr><td>{$user}</td><td>{$time}</td></tr>\n");
	if (++$numPrinted == 3) {
		break; // stop after three
	}
}
echo "</table>";

/*
 * 3) Por valor mudando a chave iniciando em 0. Para arrays indexados.
 * Crescente: sort();
 * Descrescente: rsort();
 * Definida pelo usuário: usort();
 * 
 * As outras funções podem ser usadas em arrays indexados, mas os valores só podem
 * ser acessados via foreach e next por exemplo.
 */
$names = array("Cath", "Angela", "Brad", "Mira");
sort($names); // $names is now "Angela", "Brad", "Cath", "Mira"

/*
 * Ordenação definida pelo usuário.
 * 
 * Método recebe 2 parâmetros, retorna:
 * - 1 se o primeiro for maior que o segundo
 * - -1 se o primeiro foe menos que o segundo
 * - 0 se iguais
 */
function userSort($a, $b) {
	// smarts is all-important, so sort it first
	if ($b == "smarts") {
		return 1;
	} else if ($a == "smarts") {
		return -1;
	}
	return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}

$values = array(
		'name' => "Buzz Lightyear",
		'email_address' => "buzz@starcommand.gal",
		'age' => 32,
		'smarts' => "some"
);

uksort($values, 'userSort');
var_dump($values);
?>

<?php
/*
 * ### Natural Order ###
 * 
 * Esses métodos ordenam ex10.php, ex5.php e ex1.php na ordem correta. Sem eles seria ordenado
 * da seguinte maneira: ex1.php, ex10.php e ex5.php.
 * 
 * natsort(input);
 * natcasesort(input); case insensitive
 */ 
?>

<?php
/*
 * ### Ordenando múltiplos arrays de uma vez só ###
 * 
 * Arrays INDEXADOS!!!
 * 
 * array_multisort(array1 [, array2, ... ]);
 * 
 * Array seguido da ordem, SORT_ASC ou SORT_DESC
 */
$names = array("Tom", "Dick", "Harriet", "Brenda", "Joe");
$ages = array(25, 35, 29, 35, 35);

//Teve que colocar aspas para o PHP não confundir com um octal
$zips = array(80522, '02140', 90210, 64141, 80522);

array_multisort($ages, SORT_ASC, $zips, SORT_DESC, $names, SORT_ASC);

for ($i = 0; $i < count($names); $i++) {
	echo "{$names[$i]}, {$ages[$i]}, {$zips[$i]}<br/>";
}
?>

<?php
/*
 * ### Revertendo arrays ###
 * 
 * $reversed = array_reverse(array): Reverte a ordem interna do array, índices numéricos
 * são reenumerados começando com 0 e índices com string não são afetados.
 * 
 * $flipped = array_flip(array): Retorna um array muda o mapeamento tornando o que era valor 
 * chave e vice-versa. Valores que não eram nem números nem Strings não são alterados.
 */ 
?>

<?php
/*
 * ### Randomizando a ordem ###
 * 
 * shuffle(): Substitui todas as chaves (string ou numérica) com inteiros consecutivos iniciando do 0
 */
$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
shuffle($weekdays);
var_dump($weekdays);
?>