<?php
/*
 * #### Navegação em arrays ####
 */

/*
 * foreach: Na verdade é iterado numa cópia do array original, ao se deletar ou adicionar elementos do array que está se iterando
 * o mesmo não será alterado.
 */
$addresses = array("spam@cyberpromo.net", "abuse@example.com");
foreach ($addresses as $value) {
	echo "Processing {$value}<br/>";
}

$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
foreach ($person as $key => $value) {
	echo "Fred's {$key} is {$value}";
}
?>

<br/>

<?php 
/*
 * ### Funções iterator ###
 * 
 * current()
 * reset(): Move o iterator para o primeiro elemento e o retorna.
 * next()
 * prev()
 * end(): Move o iterator para o último elemento e o retorna.
 * each(): Retorna a chave e o valor do elemento atual e move o iterador para o próximo elemtno
 * key(): retorna a key do elemento atual
 */
reset($addresses);

//Essa forma não é uma cópia do array como foreach é, boa para grandes arrays, conservando memória.
while (list($key, $value) = each($addresses)) {
	echo "{$key} is {$value}<br />";
}

//Usando o loop for, itera no array ao invés de uma cópia.
$addressCount = count($addresses);
for ($i = 0; $i < $addressCount; $i++) {
	$value = $addresses[$i];
	echo "{$value}<br/>";
}
?>

<br/>

<?php 
/*
 * ### Chamando uma função para cada elemento do array ###
 * 
 * - array_walk(array, callable);
 * 
 * A função recebe 2 ou 3 parâmetros, sendo o terceiro opcional, que é um valor que será recebido do array_walk.
 * Param1: Valor
 * Param2: Chave
 * Param3(Opcional): Recebido do array_walk
 */
$callback = function($value, $key) {
	print("<tr><td>{$value}</td><td>{$key}</td></tr>\n");
};

$ages = array(
'Person' => "Age",
'Fred' => 35,
'Barney' => 30,
'Tigger' => 8,
'Pooh' => 40);

print("<table border='1'>");
array_walk($ages, $callback);
print("</table><br/>");

//Variação com o terceiro argumento
function printRow($value, $key, $color) {
	echo "<tr>\n<td bgcolor='{$color}'>{$value}</td>";
	echo "<td bgcolor='{$color}'>{$key}</td>\n</tr>\n";
}
$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
echo "<table border='1'>";
array_walk($person, "printRow", "lightblue");
echo "</table><br/>";

//Mais de um parâmetro no terceiro argumento? Passe um array!
$extraData = array('border' => 2, 'color' => "red");
$baseArray = array("Ford", "Chrysler", "Volkswagen", "Honda", "Toyota");
array_walk($baseArray, "walkFunction", $extraData);
function walkFunction($item, $index, $data) {
	echo "{$item} <- item, then border: {$data['border']}";
	echo " color->{$data['color']}<br />" ;
}
?>

<?php
 /*
  * ### Reduzindo um array ###
  * 
  * $result = array_reduce(array, callable [, default ]);
  * 
  * default: Valor semente, é o valor inicial do retorno, se array for nulo, esse é o valor retornado, caso não seja informado é retornado nulo.
  * 
  * Aplica uma função em cada elemento do array para criar um valor único.
  * A função deve ter 2 argumentos, o retorno total e o valor atual sendo processado e deve retornar o novo retono total.
  */

//Exemplo somar os quadrados dos valores no array
$callback = function($runningTotal, $currentValue) {
	$runningTotal += $currentValue * $currentValue;
	return $runningTotal;
};
$numbers = array(2, 3, 5, 7);
$total = array_reduce($numbers, $callback);
echo "{$total} <br/>";
?>

<?php
/*
 * ### Procurando por valores ###
 * 
 * in_array(to_find, array [, strict]): retorna true ou false dapendendo se o primeiro argumento é 
 * um elemento contido no array passado por parâmetro
 *
 * strict: Default é false, se true os tipos do argumento buscado e o elemento no array devem ser os mesmos.
 */
$addresses = array("spam@cyberpromo.net", "abuse@example.com", "root@example.com");
$gotSpam = in_array("spam@cyberpromo.net", $addresses); // $gotSpam is true
$gotMilk = in_array("milk@tucows.com", $addresses); // $gotMilk is false

//Uma variação é o array_search(): Retorna a chave do elemento, se encontrado. Também possui o terceiro argumento opcional.
$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
$k = array_search("Wilma", $person);
echo("Fred's {$k} is Wilma\n");
?>