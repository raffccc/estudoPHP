<?php
#### IMPRIMINDO STRINGS ####

## echo ##
/*
 * � um construtor da linguagem, significa que pode-se omitir os par�nteses.
 *
 * Pode-se especificar m�ltiplos itens para imprimir separando-os por v�rgula,
 * nesse caso n�o se pode usar par�nteres.
 */
echo "Primeiro","Segundo","Terceiro","<br/>";
// echo ("Primeiro","Segundo","Terceiro"); erro de parse
//Pelo fato de n�o ser uma fun��o, n�o pode ser utilizado como parte de outra express�o

## print ##
/*
 * Manda um valor (seu argumento) para o browser
 */
if (print("test")) {
	print("Funciona! <br/>");
}

## printf ##
/*
 * Imprime com formata��o, substituindo os templates. Templates s�o precedidos de % (para imprimir
 * % na tela colocar %%).
 *
 * A ordem depois do % deve ser a seguinte:
 *
 * - Caractere que deve ser utilizado para fazer o padding, especificar 0, espa�o ou qualquer
 * caractere prefixado com ', espa�o � o default.
 *
 * - Sinal, para strings o menos for�a a string a ser justificada para a esquerda. Para n�meros
 * o sinal positivo for�a a numeros positivos serem impressos com o (+).
 *
 * - N�mero m�nimo de caracteres que esse elemento deve conter.
 *
 * - Para pontos flutuantes a precis�o, que consiste de ".n�mero", para outros tipos que n�o
 * double, esse especificador � ignorado.
 *
 * Tipos:
 *
 * %: Mostra o s�mbolo %
 * b: argumento inteiro, mostra bin�rio
 * c: argumento inteiro, mostra caractere
 * d: argumento inteiro, mostra decimal
 * e: argumento double, mostra nota��o cient�fica, (E: usa letras mai�sculas)
 * f: argumento floating-point, mostrado no formato locale atual
 * F: argumento floating-point, mostrado como tal
 * g: argumento double, mostrado como no %e ou %f, o que for menor. (G: igual s� que %E ou %F)
 * o: argumento inteiro, mostra como octal
 * s: argumento string
 * u: Inteiro sem sinal, mostrado como decimal
 * x: Argumento inteiro, mostrado como hexadecimal, letras em min�sculo (X: letras em mai�sculo)
 */
printf("%.2f <br/>", 27.456); //arredonda
printf("Hexadecimal de %d � %x <br/>", 214, 214);
printf("Bond. James Bond. %03d.<br/>", 7);
printf("%02d/%02d/%04d<br/>", 24, 11, 1988);
printf('%.1f%% Complete<br/>', 2.1);

//7 caracteres, mostrando o sinal positivo, precis�o de duas casas decimais, padding feito com o caractere 'x'
printf("Voc� gastou $%'x+7.2f at� agora <br/>", 4.1);

## sprintf ##
/*
 * Mesma coisa que o printf s� que ao inv�s de imprimir na tela retorna a string,
 * para ser usada como uma vari�vel, por exemplo.
*/

## print_r() e var_dump() ##
/*
 * print_r() imprime de maneira mais amig�vel. Um array, por exemplo, � impresso com o
 * par de chaves e valores, precedido pelo nome Array.
 *
 * print_r() no array move o iterador para o �ltimo elemento.
*/

echo "<br/> print_r() <br/>";

$a = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');
print_r($a);
echo "<br/>";

/*
 * Quando se imprime um objeto, o output � a o nome da classe seguido de Object
* seguido das propriedades do objeto e seus valores como no array.
*/
class P {
	var $name = 'nat';
}
$p = new P;
print_r($p);
echo "<br/>";

/*
 * Booleanos e NULL n�o s�o exibidos com sentido pelo print_r().
*
* var_dump() � prefer�vel para debug, j� que imprime qualquer coisa em um formato mais
* amig�vel para o homem.
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
 * Cuidado ao imprimir estruturas recursivas. var_dump() imprime at� a terceira
* repeti��o do mesmo elemento, enquando print_r() imprime infinitamente.
*/
?>