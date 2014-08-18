<head>
	<meta charset="UTF-8">
</head>

<?php
#### COMPARAÇÕES EXATAS ####

$o1 = 3;
$o2 = "3";
if ($o1 == $o2) {
	echo("== É falso<br>");
}
if ($o1 === $o2) {
	echo("=== Retorna true<br>");
}

/*
 * strcmp() para comparar duas strings como strings, castando números para strings se necessário.
 * strcasecmp() converte as duas strings para lowercase antes de comparar
 * 
 * Elas recebem além das duas strings um atributo adicional que é o número de caracteres a comparar.
 * 
 * strnatcmp() e strnatcasecmp(): compara pela ordem natural, as partes numéricas das strings.
 */
?>

<br/>

<?php
#### IGUALDADE APROXIMADA ####

## soundex(), metaphone() ##
/*
 * soundex e metaphone: como a string é pronunciada em inglês e comparar as pronuciações.
 * Só se pode comparar soundex com soundex e metaphone com metaphone. O algorito de metaphone
 * é, geralmente, mais acurado.
 */
echo "Exemplo de soundex e metaphone<br/>";

$known = "Fred";
$query = "Phred";
if (soundex($known) == soundex($query)) {
	print "soundex: {$known} sounds like {$query}<br>";
} else {
	print "soundex: {$known} doesn't sound like {$query}<br>";
}

if (metaphone($known) == metaphone($query)) {
	print "metaphone: {$known} sounds like {$query}<br>";
} else {
	print "metaphone: {$known} doesn't sound like {$query}<br>";
}

## similar_text() ##
/*
 * Retorna o número de caracteres que duas strings têm em comum.
 * Terceiro argumento, se presente, é a variável que armazenará a igualdade como percentagem.
 */
$string1 = "Rasmus Lerdorf";
$string2 = "Razmus Lehrdorf";
$common = similar_text($string1, $string2, $percent);
printf("Possuem %d caracteres em comum (%.2f%%).", $common, $percent);

## levenshtein() ##
/*
 * Calcula simililaridade entre duas strings baseado em quantos caracteres se deve adicionar, substituir
 * ou remover para fazê-las ficarem iguais.
 * 
 * Geralmente mais rápida que similar_text()
 */
$similarity = levenshtein("cat", "cot"); // $similarity is 1

/*
 * levenshtein pode receber 3 parâmetros na seguinte ordem: 
 *  - custo de inserção, custo de substituição e custo de deleção.
 *  
 *  No seguinte exemplo colocou-se custo de inserção muito alto pois
 *  não se deve inserir caracteres em uma contração.
 */
$similarity = levenshtein('would not', 'wouldn\'t', 500, 1, 1);
?>