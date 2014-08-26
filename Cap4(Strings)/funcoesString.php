<head>
	<meta charset="UTF-8">
</head>

<?php
#### ACESSANDO CARACTERES INDIVIDUAIS ####

/*
 * strlen(): Número de caracteres na string
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
 * Recebem como parâmetro a string e optativamente a lista de caracteres que removerão.
 * 
 * Por padrão remove: espaço, tab(\t), null(\0), carriage return(\r), vertical tab(x0B), nova linha (\n).
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
 * htmlentities(): transforma a acentuação no código html, menos o espaço ( < = &lt; )
 * Recebe até 3 parâmetros:
 * 	- 1, a String
 *  - 2, estilo das aspas: Se aspas simples ou duplas são transformadas. 
 *  	ENT_COMPAT(default): converte apenas as aspas duplas, 
 *  	ENT_QUOTES: converte ambos os tipos de aspas
 *  	ENT_NOQUOTES: não converte nenhuma.
 *  	Não existe opção de converter apenas as aspas simples.
 *  - 3, charset: Default é o ISO-8859-1
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
 * htmlspecialchars() converte o menos conjunto possível para gerar HTML válido:
 * 
 * - & para &amp;
 * - " para &quot;
 * - ' para &#039; (se ENT_QUOTES habilitado)
 * - < para &lt;
 * - > para &gt;
 */

/*
 * Para fazer o comportamento contrário pode-se fazer o seguinte:
 * 
 * - Utilizar o método get_html_translation_table(), recebe qual o tipo de translation e
 * qual a regra de transformação de aspas (ENT_COMPAT) default.
 * 
 * - Realizar o array_flip(), que muda de chave para valor e vice-versa.
 * 
 * - strtr(): string translate, que recebe a string e no segundo argumento o array mapeando
 * a ocorrência e para qual valor deve ser traduzido.
 */

//É substituído pro &uuml; sem esse encoding não funciona, aparentemente ISO-5589-1. não é o default
$str = htmlentities("Einstürzende Neubauten", ENT_COMPAT,'ISO-8859-1');
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
 * get_meta_tags(): Retorna array de meta tags de uma página HTML.
 */
$metaTags = get_meta_tags('http://scba.capes.gov.br/scba/login.seam');
echo "Robots {$metaTags['robots']}";
?>

<br/>

<?php
#### URLs ####

/*
 * Existem 2 tipos de codificação e decodificação de URL. A da RFC(substitui espaço por %20, 
 * e a que implementa x-www-form-urlencoded(substitui espaço por +)
 * 
 * - No primeiro caso(RFC) usa-se rawurlencode() e rawurldecode()
 * - No segundo caso usa-se urlencode() e urldecode(): Esse é o formato para fazer strings de query e valores de cookie.
 * útil para gerar query string.
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
 * O escape em SQL é simples, \, ' e " devem ser precedidos de \
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
 * Em alguns BDs usa-se o ' para escapar o próprio '. Nesse caso ativar o magic_quotes_sybase no php.ini
 */
?>

<br/>

<?php
#### Encoding C-String ####

/*
 * addcslashes() e stripcslashes(): Escapa caracteres arbitrários.
 * São utilizados com bancos de dados não padrões.
 * 
 * Recebe 2 parâmetros:
 * 
 * - A string para escapar.
 * - Caracteres que devem ser escapados. Um range pode ser especificado separando por '..'
 */
echo addcslashes("hello\tworld\n", "\x00..\x1fz..\xff");
?>

