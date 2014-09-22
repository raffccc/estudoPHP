<head>
	<meta charset="UTF-8">
</head>

<?php
#### SUBSTRINGS ####
/*
 * sintaxe substr(string, start [, length ]);
 * 
 * start: de onde se deve começar a copiar 
 * length: é o número de caracteres a copiar
 * 
 * Igual ao java.
 */
$name = "Fred Flintstone";
$fluff = substr($name, 6, 4); //"lint"

/*
 * substr_count(): quantas vezes uma string pequena acontece em uma maior
 */
$sketch = <<< EndOfSketch
Well, there's egg and bacon; egg sausage and bacon; egg and spam;
egg bacon and spam; egg bacon sausage and spam; spam bacon sausage
and spam; spam egg spam spam bacon and spam; spam sausage spam spam
bacon spam tomato and spam;
EndOfSketch;
$count = substr_count($sketch, "spam");
print("Spam aparece {$count} vezes.");

/*
 * substr_replace()
 * 
 * $string = substr_replace(original, new, start [, length ]);
 * Se não informar length: o resto da string é removido
 */
$greeting = "good morning citizen";
$farewell = substr_replace($greeting, "bye", 5, 7);
//$farewell é "good bye citizen"

//Adicionar sem substituir, usa-se length = 0
$farewell = substr_replace($farewell, "kind ", 9, 0);
//$farewell is "good bye kind citizen"

//Substituir sem adicionar nada, usa-se nova string ""
$farewell = substr_replace($farewell, "", 8);
//$farewell is "good bye"

//Inserir no começo da string
$farewell = substr_replace($farewell, "now it's time to say ", 0, 0);
//$farewell is "now it's time to say good bye"'

//start negativo significa a posição a partir do fim da string que a nova string será inserida
$farewell = substr_replace($farewell, "riddance", -3);
// $farewell is "now it's time to say good riddance"

//length negativo indica o número de caracteres a partir do fim da string que deve parar de substituir
$farewell = substr_replace($farewell, "", -8, -5);
//$farewell is "now it's time to say good dance"
?>

</br>

<?php
#### MÉTODOS MISCELÂNEA ####

//strrev() reverte a string
echo strrev("There is no cabal") . "<br/>";

//str_repeat(string, count): retorna a string repetida count vezes
echo str_repeat('_.-.', 40) . "<br/>";

/*
 * str_pad(to_pad, length [, with [, pad_type ]]);, preenche a string
 * 
 * to_pad: string a ser preenchida
 * length: quantos caracteres preencher
 * with: com o que preencher
 * pad_type: STR_PAD_LEFT, STR_PAD_BOTH, STR_PAD_RIGHT(default).
 * 
 * ATENÇÃO: NÃO FUNCIONA LEGAL NO HTML, ELE SÓ DÁ UM ESPAÇO
 */
echo '[' . str_pad('Fred Flintstone', 30, ' ', STR_PAD_LEFT) . "]<br/>";
echo '[' . str_pad('Fred Flintstone', 30, ' ', STR_PAD_BOTH) . "]<br/>";
?>

<br/>

<?php
#### DECOMPONDO A STRING ####

/*
 * Explodindo e implodindo
 * 
 * explode(sepadador, string [, limite]) = split do java
 * 
 * limite: número de elementos do array resultante, se atingir o limite e ainda faltar
 * coisa para dividir, o resto da string é o resultado.
 */
$input = 'Fred,25,Wilma';
$fields = explode(',', $input);
// $fields is array('Fred', '25', 'Wilma')
$fields = explode(',', $input, 2);
// $fields is array('Fred', '25,Wilma')

/*
 * implode(separador, array): coloca os separadores entre os elementos do array.
 * join() é alias de implode
 */
$fields = array('Fred', '25', 'Wilma');
$string = implode(',', $fields); // $string is 'Fred,25,Wilma'

/*
 * Tokenize
 * 
 * strtok(): itera sobre os tokens da string
 * 
 * strtok(string, separator): primeira chamada
 * strtok(separator): chamadas subsequentes
 * 
 * Chamando com 2 parâmetros reinicializa o iterador.
 */
$string = "Fred,Flintstone,35,Wilma";
$token = strtok($string, ",");
while ($token !== false) {
	echo("{$token}<br />");
	$token = strtok(",");
}

/*
 * sscanf(): Decompõe a string de acordo com o template do printf()
 * 
 * $array = sscanf(string, template);
 * 
 * $count = sscanf(string, template, var1, ... ): os valores serão armazenados nas variáveis
 * passadas por parâmetro, retorna o número de campos atribuídos.
 */
$string = "Fred\tFlintstone (35)";
$a = sscanf($string, "%s\t%s (%d)");
print_r($a);
echo "<br/>";

$string = "Fred\tFlintstone (35)";
$n = sscanf($string, "%s\t%s (%d)", $first, $last, $age);
echo "Matched {$n} fields: {$first} {$last} is {$age} years old";
?>

<br/>

<?php
#### FUNÇÕES DE BUSCA EM STRINGS ####

/*
 * São várias as funções que recebem uma string e uma outra string a procurar, exemplo:
 * 
 * $pos = strpos($large, ","); //encontre a primeira vírgula
 * $pos = strpos($large, 44); //encontre a primeira vírgula, pois 44 é convertido para o caractere
 * com número ASCII correspondente.
 * 
 * Todas retornam false caso não encontre a string que você busca.
 * SEMPRE COMPARAR O RESULTADO COM ===, pois pode acontecer o caso do resultado dar 0, e como
 * 0 resulta em false a comparação com == não surtiria o efeito desejado. 
 */

/*
 * Busca retornando posição
 * 
 * strpos(large_string, small_string): posição de small_string em large_string.
 * strrpos(large_string, small_string): encontra a última ocorrência do caractere na string.
 */
$record = "Fred,Flintstone,35,Wilma";
$pos = strrpos($record, ","); // find last comma
echo("Última vírgula em: {$pos}, tamanho:" . strlen($record) . "<br/>"); 

/*
 * Busca retornando o resto da string
 * 
 * strstr(large_string, small_string): Acha a primeira ocorrência de uma string menor em uma maior, retornando a menor string e o resto da string maior.
 * 
 * Variações:
 * 
 * stristr(): case insensitive
 * strchr(): alias para strstr()
 * strrchr(): Última ocorrência de um caractere em uma string.
 */
$record = "Fred,Flintstone,35,Wilma";
$rest = strstr($record, ","); // $rest is ",Flintstone,35,Wilma"

/*
 * Buscando por meio de máscaras
 * 
 * strspn(string, charset): Quantos caracteres no começo de uma string são compostos de certos caracteres.
 */
 //Função que verifica se $str é um octal
function isOctal($str) {
	echo strspn($str, '01234567') . "<br/>";
	echo strlen($str) . "<br/>";
	return strspn($str, '01234567') == strlen($str);
}
var_dump(isOctal('8'));

/*
 * strcspn(): c é de complemento. Diz quantos caracteres do começo da string não correspondem ao padrão passado por parâmetro.
 * 
 * Exemplo teste para verificar se string possui NUL-byts, tabs ou carriage return:
 */
function hasBadChars($str) {
	return strcspn($str, "\n\t\0") != strlen($str);
}
?>

<br/>

<?php
#### DECOMPONDO URLs ####

/*
 * parse_url(url): retorna array com os componentes da URl
 */
$bits = parse_url("http://me:secret@example.com/cgi-bin/board?user=fred");
print_r($bits);
?>
