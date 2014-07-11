<?php
	//Comentário simples
	
	#Tambem é comentário
	
	/*
	 * Também é comentário
	 */
?>

<?php //isso não comenta até o fim da linha  ?>
<?php #nem isso  ?>

<?php 
	/*
	 * PHP é fracamente tipada, regras de nomenclatura de variáveis iguais aos do
	 * java. Nome de váriável é case sensitive, já a invocação de métodos é case
	 * insensitive.
	 */
 	$string = "Teste"; 	
 	echo $string; 
?>

<br />

<?php 
	//Definindo uma constante
 	define('TESTE', "Teste123");
 	echo TESTE; 
?>

<br />

<?php
	//se estourar o tamanho vira floating point 
	$inteiro = 1;
	$octal = 010;
	$hexadecimal = 0xAB1;
	$binario = 0b0011011;
	//usa-se is_int() ou is_integer() pra saber se é inteiro
	
	$pontoFlutuante = 3.14;
	$notacaoCientifica = 3.14e14;
	//usa-se is_float() ou is_real() pra saber se é ponto flutuante
	
	echo $notacaoCientifica;
?>

<br />

<?php 
	//Strings
	$nome = "Rafael"; 	

	//Aspas duplas -> a variável nome é interpretada.
 	echo "Oi $nome<br/>"; 
 	
 	/*
 	 * Aspas simples -> nome fica no texto e escape characters não são interpretados.
 	 * Os únicos caracteres de escape interpretados em aspas simples são \\ e \'.
 	 */
 	echo 'Oi $nome';
 	
 	//usa-se is_string() pra saber se é string.
?>

<br />

<?php
	/*
	 * Booleanos o que é falso no php:
	 * 
	 * 1) false
	 * 2) 0
	 * 3) Floating point 0.0
	 * 4) String "" ou "0"
	 * 5) Array vazio
	 * 6) Objeto sem funções ou valores
	 * 7) NULL
	 */ 

	if ('0') {
		echo "oi"; //Não entra aqui.
	}
	
	//usa-se is_bool() pra saber se é string.
?>

<br />

<?php
	/*
	 * Arrays
	 */ 

	//Já dá pra declarar o array atribuindo valor aos itens
	$arrayIndiceNumerico[0] = "Item1";
	$arrayIndiceNumerico[1] = "Item2";
	
	$arrayIndiceString["Indice1"] = "Item1";
	$arrayIndiceString["Indice2"] = "Item2";

	//array() também pode construir
	$arrayIndiceNumerico = array("Item1", "Item2", "Item3");
	$arrayIndiceString = array(
		"Indice1" => "Item1", 
		"Indice2" => "Item2", 
		"Indice3" => "Item3");

	echo "{$arrayIndiceString["Indice1"]}<br/><br/>";
	
	//Iterando no array
	foreach ($arrayIndiceNumerico as $item) {
		echo "Item: {$item}<br/>";
	}
	
	echo "<br/>";
	
	foreach ($arrayIndiceNumerico as $indice => $item) {
		echo "Índice: {$indice}, Item: {$item}<br/>";
	}
	
	echo "<br/>";
	
	foreach ($arrayIndiceString as $item) {
		echo "{$item}<br/>";
	}
	
	echo "<br/>";
	
	foreach ($arrayIndiceString as $indice => $item) {
		echo "Índice: {$indice}, Item: {$item}<br/>";
	}
	
	//Ordenar array
	sort($arrayIndiceNumerico);
	//Ordena e mantem o mapeamento do índice.
	asort($arrayIndiceString);
	
	//usa-se is_array() pra saber se é array.
?>

<?php

	/*
	 * Resource - É um recurso utilizado por, por exemplo,
	 * um banco de dados. Liberado após a sua desvinculação de uma
	 * variável.
	 * 
	 * Usar is_resource() para saber se é um recurso.
	 */
?>

<?php 
	/*
	 * Callbacks funções ou métodos de objeto utilizados por algumas funções,
	 * como call_user_fun(). Podem ser criados pelo create_function() ou
	 * closures.
	 */
?>

<?php 
	/*
	 * is_null(), pra saber se é nulo
	 */

	$uninitializedVariable = null;
	if (is_null($uninitializedVariable)) {
		echo "Yes!";
	}
?>