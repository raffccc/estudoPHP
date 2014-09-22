<head>
	<meta charset="UTF-8">
</head>

<?php
#### IMPRIMINDO STRINGS ####

## echo ##
/*
 * É um construtor da linguagem, significa que pode-se omitir os parênteses.
 *
 * Pode-se especificar múltiplos itens para imprimir separando-os por vírgula,
 * nesse caso não se pode usar parênteres.
 */
echo "Primeiro","Segundo","Terceiro","<br/>";
// echo ("Primeiro","Segundo","Terceiro"); erro de parse
//Pelo fato de não ser uma função, não pode ser utilizado como parte de outra expressão

## print ##
/*
 * Manda um valor (seu argumento) para o browser
 */
if (print("test")) {
	print("Funciona! <br/>");
}

## printf ##
/*
 * Imprime com formatação, substituindo os templates. Templates são precedidos de % (para imprimir
 * % na tela colocar %%).
 *
 * A ordem depois do % deve ser a seguinte:
 *
 * - Caractere que deve ser utilizado para fazer o padding, especificar 0, espaço ou qualquer
 * caractere prefixado com ', espaço é o default.
 *
 * - Sinal, para strings o menos força a string a ser justificada para a esquerda. Para números
 * o sinal positivo força a numeros positivos serem impressos com o (+).
 *
 * - Número mínimo de caracteres que esse elemento deve conter.
 *
 * - Para pontos flutuantes a precisão, que consiste de ".número", para outros tipos que não
 * double, esse especificador é ignorado.
 *
 * Tipos:
 *
 * %: Mostra o símbolo %
 * b: argumento inteiro, mostra binário
 * c: argumento inteiro, mostra caractere
 * d: argumento inteiro, mostra decimal
 * e: argumento double, mostra notação científica, (E: usa letras maiúsculas)
 * f: argumento floating-point, mostrado no formato locale atual
 * F: argumento floating-point, mostrado como tal
 * g: argumento double, mostrado como no %e ou %f, o que for menor. (G: igual só que %E ou %F)
 * o: argumento inteiro, mostra como octal
 * s: argumento string
 * u: Inteiro sem sinal, mostrado como decimal
 * x: Argumento inteiro, mostrado como hexadecimal, letras em minúsculo (X: letras em maiúsculo)
 */
printf("%.2f <br/>", 27.456); //arredonda
printf("Hexadecimal de %d é %x <br/>", 214, 214);
printf("Bond. James Bond. %03d.<br/>", 7);
printf("%02d/%02d/%04d<br/>", 24, 11, 1988);
printf('%.1f%% Complete<br/>', 2.1);

//7 caracteres, mostrando o sinal positivo, precisão de duas casas decimais, padding feito com o caractere 'x'
printf("Você gastou $%'x+7.2f até agora <br/>", 4.1);

## sprintf ##
/*
 * Mesma coisa que o printf só que ao invés de imprimir na tela retorna a string,
 * para ser usada como uma variável, por exemplo.
*/

## print_r() e var_dump() ##
/*
 * print_r() imprime de maneira mais amigável. Um array, por exemplo, é impresso com o
 * par de chaves e valores, precedido pelo nome Array.
 *
 * print_r() no array move o iterador para o último elemento.
*/

echo "<br/> print_r() <br/>";

$a = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');
print_r($a);
echo "<br/>";

/*
 * Quando se imprime um objeto, o output é o nome da classe seguido de Object
* seguido das propriedades do objeto e seus valores como no array.
*/
class P {
	var $name = 'nat';
}
$p = new P;
print_r($p);
echo "<br/>";

/*
 * Booleanos e NULL não são exibidos com sentido pelo print_r().
*
* var_dump() é preferível para debug, já que imprime qualquer coisa em um formato mais
* amigável para o homem.
*/
print_r(true); // prints "1";
print_r(false); // prints "";
print_r(null); // prints "";

echo "<br/><br/> var_dump() <br/>";
var_dump(true);
echo "<br/>";
var_dump(false);
echo "<br/>";
var_dump(null);
echo "<br/>";
var_dump($a);
echo "<br/>";
var_dump($p);

/*
 * Cuidado ao imprimir estruturas recursivas. var_dump() imprime até a terceira
* repetição do mesmo elemento, enquando print_r() imprime infinitamente.
*/
?>