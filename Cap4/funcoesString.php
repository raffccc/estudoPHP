<?php
#### ACESSANDO CARACTERES INDIVIDUAIS ####

/*
 * strlen(): N�mero de caracteres na string
 * 
 * para acessar um caractere $string{$indice}
 */
$string = 'Hello';
for ($i=0; $i < strlen($string); $i++) {
	printf("The %dth character is %s<br/>", $i, $string{$i});
}
?>

<br/>

<?php
#### LIMPANDO STRINGS ####

/*
 * trim(), ltrim(), rtrim().
 * Recebem como par�metro a string e optativamente a lista de caracteres que remover�o.
 * 
 * Por padr�o remove: espa�o, tab(\t), null(\0), carriage return(\r), vertical tab(x0B), nova linha (\n).
 */

//Aqui quero que tire todos menos os tabs
$record = " Fred\tFlintstone\t35\tWilma\t \n";
$record = trim($record, " \r\n\0\x0B");
//$record = "Fred\tFlintstone\t35\tWilma"
?>

<?php
#### MUDANDO O CASE ####

/*
 * strtolower() e strtoupper(): Em toda a string
 * ucfirst(): primeira letra da palavra, uc = upper case
 * ucwords(): primeira letra de todas as palavras da string.
 */
$string1 = "FRED flintstone<br/>";
$string2 = "barney rubble<br/>";
print(strtolower($string1));
print(strtoupper($string1));
print(ucfirst($string2));
print(ucwords($string2));
?>

<br/>

<?php
#### ENCODING E ESCAPING ####

## HTML ##

/*
 * htmlentities(): transforma a acentua��o no c�digo html, menos o espa�o ( < = &lt; )
 * Recebe at� 3 par�metros:
 * 	- 1, a String
 *  - 2, estilo das aspas: Se aspas simples ou duplas s�o transformadas. 
 *  	ENT_COMPAT(default): converte apenas as aspas duplas, 
 *  	ENT_QUOTES: converte ambos os tipos de aspas
 *  	ENT_NOQUOTES: n�o converte nenhuma.
 *  	N�o existe op��o de converter apenas as aspas simples.
 *  - 3, charset: Default � o ISO-8859-1
 */
$input = <<< End
"Stop pulling my hair!" Jane's eyes flashed.<p>
End;

$double = htmlentities($input);
// &quot;Stop pulling my hair!&quot; Jane's eyes flashed.&lt;p&gt;

$both = htmlentities($input, ENT_QUOTES);
// &quot;Stop pulling my hair!&quot; Jane&#039;s eyes flashed.&lt;p&gt;

$neither = htmlentities($input, ENT_NOQUOTES);
// "Stop pulling my hair!" Jane's eyes flashed.&lt;p&gt;

/*
 * htmlspecialchars() converte o menos conjunto poss�vel para gerar HTML v�lido:
 * 
 * - & para &amp;
 * - " para &quot;
 * - ' para &#039; (se ENT_QUOTES habilitado)
 * - < para &lt;
 * - > para &gt;
 */

/*
 * Para fazer o comportamento contr�rio pode-se fazer o seguinte:
 * 
 * - Utilizar o m�todo get_html_translation_table(), recebe qual o tipo de translation e
 * qual a regra de transforma��o de aspas (ENT_COMPAT) default.
 * 
 * - Realizar o array_flip(), que muda de chave para valor e vice-versa.
 * 
 * - strtr(): string translate, que recebe a string e no segundo argumento o array mapeando
 * a ocorr�ncia e para qual valor deve ser traduzido.
 */

//� substitu�do pro &uuml; sem esse encoding n�o funciona, aparentemente ISO-5589-1. n�o � o default
$str = htmlentities("Einst�rzende Neubauten", ENT_COMPAT,'ISO-8859-1');
var_dump($str);

$table = get_html_translation_table(HTML_ENTITIES, ENT_COMPAT,'ISO-8859-1');
$revTrans = array_flip($table);
echo strtr($str, $revTrans) . "<br/>";

/*
 * Removendo tags HTML
 * 
 * strip_tags(): Pode conter um segundo argumento que diz quais tags deixar.
 */
$input = '<p>Howdy, &quot;Cowboy&quot;</p>';
$output = strip_tags($input);
var_dump($output);

$input = 'The <b>bold</b> tags will <i>stay</i><p>';
$output = strip_tags($input, '<b>');
var_dump($output);

/*
 * Extraindo meta tags
 * 
 * get_meta_tags(): Retorna array de meta tags de uma p�gina HTML.
 */
$metaTags = get_meta_tags('http://scba.capes.gov.br/scba/login.seam');
echo "Robots {$metaTags['robots']}";
?>

<br/>

<?php
#### URLs ####

/*
 * Existem 2 tipos de codifica��o e decodifica��o de URL. A da RFC(substitui espa�o por %20, 
 * e a que implementa x-www-form-urlencoded(substitui espa�o por +)
 * 
 * - No primeiro caso(RFC) usa-se rawurlencode() e rawurldecode()
 * - No segundo caso usa-se urlencode() e urldecode(): Esse � o formato para fazer strings de query e valores de cookie.
 * �til para gerar query string.
 */

$name = "Programming PHP";
$output = rawurlencode($name);
$encoded = "http://localhost/{$output}";

echo "$encoded <br/>";
echo rawurldecode($encoded) . "<br/>";

$baseUrl = 'http://www.google.com/q=';
$query = 'PHP sessions -cookies';
$url = $baseUrl . urlencode($query);
echo "$url <br/>";
?>

<br/>

<?php
#### SQL ####

/*
 * O escape em SQL � simples, \, ' e " devem ser precedidos de \
 * Usase addslashes() e stripslashes() para colocar e remover respectivamente esses \.
 */
$string = <<< EOF
"It's never going to work," she cried,
as she hit the backslash (\) key.
EOF;
$string = addslashes($string);
echo "$string <br/>";
echo stripslashes($string) . "<br/>";

/*
 * Em alguns BDs usa-se o ' para escapar o pr�prio '. Nesse caso ativar o magic_quotes_sybase no php.ini
 */
?>

<br/>

<?php
#### Encoding C-String ####

/*
 * addcslashes() e stripcslashes(): Escapa caracteres arbitr�rios.
 * S�o utilizados com bancos de dados n�o padr�es.
 * 
 * Recebe 2 par�metros:
 * 
 * - A string para escapar.
 * - Caracteres que devem ser escapados. Um range pode ser especificado separando por '..'
 */
echo addcslashes("hello\tworld\n", "\x00..\x1fz..\xff");
?>

