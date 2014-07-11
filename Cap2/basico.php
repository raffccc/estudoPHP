<?php
	//Coment�rio simples
	
	#Tambem � coment�rio
	
	/*
	 * Tamb�m � coment�rio
	 */
?>

<?php //isso n�o comenta at� o fim da linha  ?>
<?php #nem isso  ?>

<?php 
	/*
	 * PHP � fracamente tipada, regras de nomenclatura de vari�veis iguais aos do
	 * java. Nome de v�ri�vel � case sensitive, j� a invoca��o de m�todos � case
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
	//usa-se is_int() ou is_integer() pra saber se � inteiro
	
	$pontoFlutuante = 3.14;
	$notacaoCientifica = 3.14e14;
	//usa-se is_float() ou is_real() pra saber se � ponto flutuante
	
	echo $notacaoCientifica;
?>

<br />

<?php 
	//Strings
	$nome = "Rafael"; 	

	//Aspas duplas -> a vari�vel nome � interpretada.
 	echo "Oi $nome<br/>"; 
 	
 	/*
 	 * Aspas simples -> nome fica no texto e escape characters n�o s�o interpretados.
 	 * Os �nicos caracteres de escape interpretados em aspas simples s�o \\ e \'.
 	 */
 	echo 'Oi $nome';
 	
 	//usa-se is_string() pra saber se � string.
?>

<br />

<?php
	/*
	 * Booleanos o que � falso no php:
	 * 
	 * 1) false
	 * 2) 0
	 * 3) Floating point 0.0
	 * 4) String "" ou "0"
	 * 5) Array vazio
	 * 6) Objeto sem fun��es ou valores
	 * 7) NULL
	 */ 

	if ('0') {
		echo "oi"; //N�o entra aqui.
	}
	
	//usa-se is_bool() pra saber se � string.
?>

<br />

<?php
	/*
	 * Arrays
	 */ 

	//J� d� pra declarar o array atribuindo valor aos itens
	$arrayIndiceNumerico[0] = "Item1";
	$arrayIndiceNumerico[1] = "Item2";
	
	$arrayIndiceString["Indice1"] = "Item1";
	$arrayIndiceString["Indice2"] = "Item2";

	//array() tamb�m pode construir
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
		echo "�ndice: {$indice}, Item: {$item}<br/>";
	}
	
	echo "<br/>";
	
	foreach ($arrayIndiceString as $item) {
		echo "{$item}<br/>";
	}
	
	echo "<br/>";
	
	foreach ($arrayIndiceString as $indice => $item) {
		echo "�ndice: {$indice}, Item: {$item}<br/>";
	}
	
	//Ordenar array
	sort($arrayIndiceNumerico);
	//Ordena e mantem o mapeamento do �ndice.
	asort($arrayIndiceString);
	
	//usa-se is_array() pra saber se � array.
?>

<?php

	/*
	 * Resource - � um recurso utilizado por, por exemplo,
	 * um banco de dados. Liberado ap�s a sua desvincula��o de uma
	 * vari�vel.
	 * 
	 * Usar is_resource() para saber se � um recurso.
	 */
?>

<?php 
	/*
	 * Callbacks fun��es ou m�todos de objeto utilizados por algumas fun��es,
	 * como call_user_fun(). Podem ser criados pelo create_function() ou
	 * closures.
	 */
?>

<?php 
	/*
	 * is_null(), pra saber se � nulo
	 */

	$uninitializedVariable = null;
	if (is_null($uninitializedVariable)) {
		echo "Yes!";
	}
?>