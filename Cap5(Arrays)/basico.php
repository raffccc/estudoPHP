<?php
/*
 * Formas de definir um array
 */
//Array indexado
$addresses[0] = "spam@cyberpromo.net";
var_dump($addresses);

//Array associativo
$price['gasket'] = 15.29;

//Array indexado com construtor
$addresses = array("spam@cyberpromo.net", "abuse@example.com", "root@example.com");

//Array associativo com construtor
$price = array(
		'gasket' => 15.29,
		'wheel' => 75.25,
		'tire' => 50.00
);

//Outra sintaxe
$days = ['gasket' => 15.29, 'wheel' => 75.25, 'tire' => 50.0];
var_dump($days);
$days = [15.29, 75.25, 50.0];
var_dump($days);

/*
 * Mais uma sintaxe, dizendo a partir de onde começar com o índice, se o valor não for numérico,
 * a partir do segundo elemento começa do índice 0.
 */
$days = array(1 => "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
var_dump($days);
// 2 is Tue, 3 is Wed, etc.

//Adicionar elemento ao fim do array, utiliza-se a sintaxe []
$family = array("Fred", "Wilma");
$family[] = "Pebbles"; // $family[2] is "Pebbles"
?>

<?php
/*
 * Atribuindo um intervalo de valores, função range()
*/
$numbers = range(2, 5); // $numbers = array(2, 3, 4, 5);
$reversedNumbers = range(5, 2); // $reversedNumbers = array(5, 4, 3, 2);

//Só a primeira letra é considerada, o mesmo que range("aaa", "zzz")
$letters = range('a', 'z'); // $letters é o alfabeto 
?>

<?php
/*
 * Medindo o tamanho do array
 * 
 * sizeof() e count(), mesma coisa.
 */
$family = array("Fred", "Wilma", "Pebbles");
$size = count($family); //3 
?>

<?php
/*
 * Padding no array, array inicializado com os mesmos valores:
 * - Primeiro argumento é o array, o segundo é o número mínimo de elementos, o terceiro é o valor a ser armazenado.
 * - Retorna um novo array, o array passado por parâmetro não é afetado
 */
$scores = array(5, 10);
$padded = array_pad($scores, 5, 0); // $padded is now array(5, 10, 0, 0, 0)
var_dump($padded);
//Negativo adiciona ao começo
$padded = array_pad($scores, -5, 0); // $padded is now array(0, 0, 0, 5, 10)
var_dump($padded);

//Para array associativo ele dá sequência ao índice
$teste = array(0 => 1, 1 => 2);
$padded = array_pad($teste, 5, 0); // $padded is now array(5, 10, 0, 0, 0)
var_dump($padded);
$padded = array_pad($teste, -5, 0); // $padded is now array(0, 0, 0, 5, 10)
var_dump($padded);
?>

<?php
/*
 * #### Extraindo múltiplos valores ####
 * 
 * Copia os valores do array para variáveis, utiliza-se o list()
 * list ($variable, ...) = $array;
 * 
 * Mais valores no array que na lista? Valores adicionais são ignorados
 * Mais variáveis que valores? Variáveis carregadas com NULL
 * Vírgulas sequenciadas no list? Posição correspondente no array ignorada.
 */
$person = array("Fred", 35, "Betty");
list($name, $age, $wife) = $person;
// $name is "Fred", $age is 35, $wife is "Betty"
?>

<?php
/*
 * #### Cortando um array ####
 * 
 * $subset = array_slice(array, offset, length);
 * - Retorna novo array que possui série de valores do array original.
 * - offset: Elemento inicial a copiar
 * - length: Número de valores para copiar.
 * 
 * Só faz sentido usar com arrays indexados, já que com array associativo os índices se perdem.
 */
$people = array("Tom", "Dick", "Harriet", "Brenda", "Jo");
$middle = array_slice($people, 2, 2); // $middle is array("Harriet", "Brenda")
var_dump($middle);

/*
 * #### Quebrando o array em pedaços ####
 * 
 * Quebrar em pedaços de tamanhos iguais
 * 
 * $chunks = array_chunk(array, size [, preserve_keys]);
 * 
 * preserve_keys: Os índices devem ser mantidos? (o default é não)
 * chincks: Array bidimensional
 */
$nums = range(1, 7);
$rows = array_chunk($nums, 3);
print_r($rows);
?>

<br/>

<?php
/*
 * #### Chaves e valores ####
 * 
 * $arrayOfKeys = array_keys(array);
 * $arrayOfValues = array_values(array);
 */
$person = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
$keys = array_keys($person); // $keys is array("name", "age", "wife")
$values = array_values($person); // $values is array("Fred", 35, "Wilma");
?>

<?php
/*
 * #### Verificando se elemento existe ####
 * 
 * if (array_key_exists(key, array)) { ... }
 */
if (array_key_exists('age', $person)) {
	echo "exists!<br/>";
}

/*
 * Outra forma é utilizar o isset(): Retorna true se elemento existe e não é nulo
 */
$a = array(0, NULL, '');

function tf($v) {
	return $v ? 'T' : 'F';
}

for ($i=0; $i < 4; $i++) {
	printf("%d -> isset(): %s array_key_exists(): %s\n", $i, tf(isset($a[$i])), tf(array_key_exists($i, $a)));
	echo '<br/>';
}
?>

<?php
/*
 * #### Removendo e inserindo elementos no array ####
 * 
 * Pode inserir ou remover elementos de um array e, opcionalmente, criar outro array com os elementos removidos.
 * 
 * $removed = array_splice(array, start [, length [, replacement ] ]);
 * 
 * - length: Quantidade de elementos a serem removidos, se omitido remove até o fim do array.
 * - replacement: Array que deve ocupar o lugar do(s) elemento(s) removido(s). O tamanho desse replacement não 
 * deve ser obrigatoriamente igual ao número de elementos removidos.
 * 
 * Também funciona para array associativo
 */
$subjects = array("physics", "chem", "math", "bio", "cs", "drama", "classics");
$removed = array_splice($subjects, 2, 3);
// $removed is array("math", "bio", "cs")
// $subjects is array("physics", "chem", "drama", "classics")

$subjects = array("physics", "chem", "math", "bio", "cs", "drama", "classics");
$removed = array_splice($subjects, 2);
// $removed is array("math", "bio", "cs", "drama", "classics")
// $subjects is array("physics", "chem")

$subjects = array("physics", "chem", "math", "bio", "cs", "drama", "classics");
$new = array("law", "business", "IS");
array_splice($subjects, 4, 3, $new);
// $subjects is array("physics", "chem", "math", "bio", "law", "business", "IS")

//Para inserir no início do array, remover 0 elementos
$subjects = array("physics", "chem", "math");
$new = array("law", "business");
array_splice($subjects, 1, 0, $new);
// $subjects is array("physics", "law", "business", "chem", "math")
var_dump($subjects);
?>

<?php
/*
 * #### Convertendo entre arrays e variáveis ####
 */

/*
 * 1) Criando variáveis a partir do array
 * 
 * - extract($array [, arg1, arg2]) -> Índices se tornam os nomes das variáveis, valores do array se tornam os valores das variáveis.
 * - Um valor possível para arg1 é EXTR_PREFIX_ALL, que diz que o nome das variáveis devem ser precedidas do arg2
 */
$shape = "round";
$array = array('cover' => "bird", 'shape' => "rectangular");
extract($array, EXTR_PREFIX_ALL, "book");
echo "Cover: {$book_cover}, Book Shape: {$book_shape}, Shape: {$shape} <br/>";

/*
 * 2) Criando array a partir de variáveis
 * 
 * - compact() -> Faz um array associativo, caso a variável com o nome indicado não seja encontrada, é ignorado.
 */
$color = "indigo";
$shape = "curvy";
$floppy = "none";
$a = compact("color", "shape", "floppy");
//ou
$names = array("color", "shape", "floppy");
$a = compact($names);
?>