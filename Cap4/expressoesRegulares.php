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
 * #### Comportamento de combinação ####
 */
?>