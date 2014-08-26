<?php
#### EXPRESSÕES REGULARES ####

/*
 * ¬¬ eu nunca lembro desses padrões!
 * 
 * Parece que no php deve-ser cercar o padrão por '/.../'.
 */

/*
 * ### Classes de caracteres ###
 * 
 * Pode-se usar uma predefinida, ou criar uma própria.
 * Para criar a própria deve-ser cercar o intervalo de caracteres com '[...]'
 */
preg_match("/c[aeiou]t/", "I cut my hand"); // returns 1
preg_match("/c[aeiou]t/", "14ct gold"); // returns 0

/*
 * ### Metacaracteres ###
 * 
 * . -> Qualquer caractere
 * $ -> Se encontrado no fim do padrão, procurar no fim da string
 * ^ -> Se encontrado no começo do padrão, procurar no começo da string,
 * | -> Alternativas
 * 
 * Em classes de caracteres:
 * ^ ->	Negação, deve aparecer no início.
 * - -> Intervalo de caracteres
 */
preg_match("/c[^aeiou]t/", "I cut my hand"); // returns 0
preg_match("/c[^aeiou]t/", "Reboot chthon"); // returns 1

preg_match("/[0-9]%/", "we are 25% complete"); // returns 1
preg_match("/[a-z]t/", "11th"); // returns 0
preg_match("/[a-zA-Z]!/", "stop!"); // returns 1

/*
 * Precedência:
 * 
 * /^cat|dog$/: Começa com cat ou termina com dog
 * /^(cat|dog)$/: Começa ou termina com cat ou dog, mas só pode ter um dos dois.
 */
preg_match("/cat|dog/", "the cat rubbed my legs");

//Verifica se começa com algo que não seja letra maiúscula.
preg_match("/^([a-z]|[0-9])/", "The quick brown fox"); // returns 0

/*
 * ### Repetição de sequências ###
 * 
 * ? -> 0 ou 1
 * * -> 0 ou mais
 * + -> 1 ou mais
 * { n } -> Exatamente n vezes
 * { n,m } -> min n, max m
 * { n ,} -> pelo menos n vezes
 * 
 * Quantificador deve ficar após o caractere ou classe de caracteres
 */
preg_match("/ca+t/", "caaaaaaat"); // returns 1
preg_match("/ca+t/", "ct"); // returns 0
preg_match("/ca?t/", "caaaaaaat"); // returns 0
preg_match("/ca*t/", "ct"); // returns 1

//Validar padrão de telefone brasileiro
preg_match("/\([0-9]{2}\) [0-9]{3,4}-[0-9]{4}/", "(61) 8210-1078");

/*
 * ### Subpadrões ###
 * 
 * Para tratar pedaços dentro do padrão como uma unidade deve-se cercá-lo com parênteses.
 * 
 * Parêntese também tem o efeito de armazenar o valor cercado por ele em um array passado como parâmetro.
 * A posição [0]: String que bateu com o padrão completo,
 * Posição [1..n]: Cada string que bateu com o padrão dos parênteses.
 */
preg_match("/a (very )+big dog/", "it was a very very big dog"); // returns 1

preg_match("/You have ([0-9]+)/", "You have 42 magic beans", $captured);
print_r($captured);

/*
 * ### Delimitadores ###
 * 
 * Por padrão o delimitador do padrão (para perl) é '/'. Pode-se substituir por qualquer coisa não
 * alfanumérica exemplo '#padrão#'.
 * 
 * (), {}, [] e <> podem ser utilizados como delimitadores de padrão.
 */
preg_match("/\/usr\/local\//", "/usr/local/bin/perl"); // returns 1
preg_match("#/usr/local/#", "/usr/local/bin/perl"); // returns 1

/*
 * Pode-se colocar coisas fora dos delimitadores, um exemplo é o x. Ele tira os espaços e os comentários com #. Exemplo
 * 
 * '/([[:alpha:]]+)\s+\1/' é igual a 
 * 
 * '/( # start capture
 * [[:alpha:]]+ # a word
 * \s+ # whitespace
 * \1 # the same word again
 * ) # end capture
 * /x' -> O x remove os # e os espaços e deixa o mesmo jeito da anterior.
 */

/*
 * #### Classes de caracteres ####
 * 
 * Podese usar [:algo:] para definir uma classe de caracteres. 
 * 
 * Ex: achar caractere que é um dígito, letra maiúscula ou @: [@[:digit:][:upper:]]
 * 
 * Para que mais de um caractere signifique apenas um caractere utiliza-se: [.caracteres.]
 * [st[.ch.]] -> achar caractere s, t ou ch.
 * 
 * -- Classe de equivalência [=a=]
 * Ex: a = à, â, ä
 */

/*
 * ##### Âncoras ####
 * Limita uma combinação a uma localidade em particular na string.
 * 
 * ^ -> Começo da String
 * $ -> Fim da string
 * [[:<:]] -> Começo de palavra
 * [[:>:]] -> Fim de palavra 
 * ...
 */
preg_match("/[[:<:]]gun[[:>:]]/", "the Burgundy exploded"); // returns false
preg_match("/gun/", "the Burgundy exploded"); // returns true

/*
 * #### Quantificadores e Greed ####
 * 
 * Para o comportamento não greedy colocar ? após o quantificador.
 */
preg_match("/(<.*>)/", "do <b>not</b> press the button", $match);
// $match[1] é '<b>not</b>'

preg_match("/(<.*?>)/", "do <b>not</b> press the button", $match);
// $match[1] é "<b>"

//Maneira mais rápida que o comportamento não greedy
preg_match("/(<[^>]*>)/", "do <b>not</b> press the button", $match);
// $match[1] is '<b>'

/*
 * #### Referências ####
 * Pode-se referenciar texto capturado anteriormente com \numero, onde numero
 * refere-se aos conteúdos do primeiro subpattern.
 */
preg_match("/([[:alpha:]]+)\s+\1/", "Paris in the the spring", $m);
echo '<br/>';
var_dump($m);
// returns true and $m[1] is "the"

/*
 * #### Opções no fim do pattern ####
 * 
 * Como o x citado anteriormente existem outras opções que podem ser colocadas fora
 * da expressão regular como o i que indica que a busca deve ser case insensitive.
 */

/*
 * #### Opções ao longo do pattern ####
 * 
 * Usar (?flags:Subpattern)
 */
//Só a palavra PHP é case insensitive nesse exemplo.
preg_match('/I like (?i:PHP)/', 'I like pHp');

//Remove espaço e ignora o case
preg_match('/eat (?ix:foo d)/', 'eat FoOD'); // returns true

echo preg_match('/(?-i:I like) PHP/i', 'I like pHp') . '<br/>';

//Forma alternativa vai até o fim do pattern ou subpattern
preg_match('/I (like (?i)PHP) a lot/', 'I like pHp a lot', $match);
// $match[1] is 'like pHp'

/*
 * #### Lookahead e Lookbehind ####
 * 
 * O próximo/anterior texto tem que ser/não ser assim. 
 * Negativo lookahead/lookbehind: não tem que ser assim
 * Positivo: Tem que ser assim.
 * 
 * (?=subpattern) Positive lookahead
 * (?!subpattern) Negative lookahead
 * (?<=subpattern) Positive lookbehind
 * (?<!subpattern) Negative lookbehind
 */

/*
 * Quebrar o texto em pedaços onde a linha começa com from.
 * ?= -> Lookahead positivo, 
 * ^  -> Começo de linha alterado pelo m no fim do pattern.
 * $messages = preg_split('/(?=^From )/m', $mailbox);
 */

/*
 * Uso de lookbehind negativo
 */
$input = <<< END
name = 'Tim O\'Reilly';
END;

$pattern = <<< END
' # abrindo aspas
( # comece a capturar
.*? # qualquer texto sem o comportamento greedy
(?<! \\\\ ) # ignore aspas com escape, \\\\ vira \\, que vira \
) # pare de capturar
' # fechando aspas
END;

//o x tira espaços e comentários
preg_match( "($pattern)x", $input, $match);
echo $match[1] . '<br/>';

/*
 * Expressões condicionais
 * 
 * (?(condicao)padraosim)
 * (?(condicao)padraosim|padraonao)
 */

/*
 * #### Funções #####
 * 
 * 1) Combinação (match)
 * $found = preg_match(pattern, string [, captured ]);
 * 
 * Repetidamente combina a partir de onde a última combinação terminou, até mais nenhuma
 * combinação puder ser feita
 * $found = preg_match_all(pattern, string, matches [, order ]);
 * 
 * Order -> PREF_PATTERN_ORDER(default) ou PREG_SET_ORDER
 */

$string = <<< END
13 dogs
12 rabbits
8 cows
1 goat
END;


/*
 * PREG_PATTERN_ORDER: Cada elemento do array corresponde a um subpadrão particular capturado.
 * 
 * $m1[0]: Array com todas as substrigs que combinaram com o padrão
 * $m1[1]: Array com todas as substrings que combinaram com o primeiro subpadrão
 * $m1[2]: Array com todas as substrings que combinaram com o segundo subpadrão
 */
preg_match_all('/(\d+) (\S+)/', $string, $m1, PREG_PATTERN_ORDER);
print_r($m1[0]);
echo '<br/>';
print_r($m1[1]);
echo '<br/>';
print_r($m1[2]);
echo '<br/>';

/*
 * PREG_SET_ORDER: Cada elemento do array corresponde à próxima tentativa de combinar todo
 * o padrão.
*
* $m1[0]: Array com o primeiro conjunto de combinações
* $m1[1]: Array com o segundo conjunto de combinações e assim por diante
*/
preg_match_all('/(\d+) (\S+)/', $string, $m2, PREG_SET_ORDER);
print_r($m2[0]);
echo '<br/>';
print_r($m2[1]);
echo '<br/>';

/*
 * 2) Substituição
 * 
 * $new = preg_replace(pattern, replacement, subject [, limit ]);
 */
$better = preg_replace('/<.*?>/', '!', 'do <b>not</b> press the button');
//$better é 'do !not! press the button'

//Pode-se passar um array de strings
$names = array('Fred Flintstone', 'Barney Rubble', 'Wilma Flintstone', 'Betty Rubble');

//Para usar backreferences nos padrões é preferível utilizar $1 $2... por exemplo  
$tidy = preg_replace('{(\w)\w* (\w+)}', '\1 \2', $names);
print_r($tidy);

/*
 * Performar múltiplas substituições na mesma string ou arrays de strings com apenas
 * uma chamada, passar arrays de padrões e substituições.
 */
//Com ignore case
$contractions = array("/don't/i", "/won't/i", "/can't/i"); 
$expansions = array('do not', 'will not', 'can not');
$string = "Please don't yell—I can't jump while you won't speak";
$longer = preg_replace($contractions, $expansions, $string);
// $longer is 'Please do not yell—I can not jump while you will not speak';

//Se passar menos substituições que padrões, o texto que combinar com os padrões sobresalentes será apagado.
$htmlGunk = array('/<.*?>/', '/&.*?;/');
$html = '&eacute; : <b>very</b> cute';
$stripped = preg_replace($htmlGunk, array(), $html);
// $stripped is ' : very cute'

//Se passar um array de padrões mas apenas uma string como replacement, todos serão substituídos pelo mesmo valor.
$stripped = preg_replace($htmlGunk, '', $html);

echo '<br/>' . preg_replace('/(\w)\w+\s+(\w+)/', '$2, $1.', 'Fred Flintstone');

//Utilizar o modificador /e faz com que o código do replacement seja tratado como código PHP.
/*
 * Nesse caso (\d+) -> 1 ou mais dígitos, o fato de cercar de parênteses indica que esse parâmetro pode ser armazenado e referenciado
 * Nesse caso $1(número do parâmetro cercado por parênteses) armazena 5 e 20.
 * O replacement no caso ficará 5*9/5 +32
 */
$string = 'It was 5C outside, 20C inside';

// /e está depreciado, utilizar o preg_replace_callback()
echo preg_replace('/(\d+)C\b/e', '$1*9/5+32', $string) . '<br/>';
//It was 41 outside, 68 inside

$name = 'Fred';
$age = 35;
$string = '$name is $age';

//O replacement vira $name e $age, o PHP pega esses valores.
preg_replace('/\$(\w+)/e', '$$1', $string); 

/*
 * Uma variação do preg_replace é o preg_replace_callback(), recebe:
 * 1) O padrão
 * 
 * 2) O nome da função a ser chamada para pegar a string que substituirá os padrões
 * 
 * 3) Array de combinações onde o elemento 0 é toda a string que combinou com o padrão, 
 * o elemento 1 é a primeira combinação com o subpattern etc.
 */
function titlecase($s) {
	//ucfrist: Apenas as primeiras letras em maiúsculo
	return ucfirst(strtolower($s[0]));
}
$string = 'goodbye cruel world';
echo preg_replace_callback('/\w+/', 'titlecase', $string) . '<br/>';

/*
 * 3) Separação
 * 
 * $pedacos = preg_split(padrão, string [, limite [, flags ]]);
 * 
 * limte: Número máximo de separações
 * flags: PREG_SPLIT_NO_EMPTY (pedaços vazios não são retornados), PREG_SPLIT_DELIM_CAPTURE (partes da string capturada no padrão são retornadas);
 */

//Extrair somente os operandos de uma expressão numérica
$ops = preg_split('{[+*/−]}', '3+5*9/2');
// $ops is array('3', '5', '9', '2')

//Extrair operandos e operadores de uma expressão numérica
$ops = preg_split('{([+*/-])}', '3+5*9/2', -1, PREG_SPLIT_DELIM_CAPTURE);
// $ops is array('3', '+', '5', '*', '9', '/', '2')

//String vira array de caracteres
$array = preg_split('//', $string);

/*
 * 4) Filtrar um array com expressão regular
 * 
 * preg_grep(): Retorna elementos do array que combinar com um dado padrão:
 */
//Pegar apenas os arquivos .txt
$filenames = array("teste.doc", "teste.txt");
var_dump(preg_grep('/\.txt$/', $filenames));

/*
 * 5) Recuperar a expressão regular
 * 
 * preg_quote(): Cria a expressão regular que combina com a string passada
 * 
 * $re = preg_quote(string [, delimiter ]);
 * 
 * Delimitador: Geralmente se passa o delimitador da expressão regular
 */

// \$5\.00 \(five bucks\)
echo preg_quote('$5.00 (five bucks)');

?>