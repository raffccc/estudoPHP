<?php
	##Casting##

	/*
	 * Integer e Ponto Flutuante: Integer transformado em ponto flutuante
	 * Integer e String: String transformado em n�mero, se for ponto flutuante, integer � convertido para ponto flutuante
	 * Ponto Flutuante e String: String para ponto flutuante
	 * 
	 * ## Cast de String para n�mero: Se n�o come�ar com n�mero, tem valor zero. 
	 * Se tiver "e" � ponto flutuante.
	 */

	echo "9 Lives" - 1 . "<br/>"; // 8 (int)
	echo "3.14 Pies" * 2 . "<br/>"; // 6.28 (float)
	echo "9 Lives." - 1 . "<br/>"; // 8 (float)
	echo "1E3 Points of Light" + 1 . "<br/>"; // 1001 (float)
?>

<?php
	##Concatena��o##

	/*
	 * � usado o s�mbolo '.' para concatenar strings
	 */
	$n = 5;
	$s = 'There were ' . $n . ' ducks.';
	// $s is 'There were 5 ducks'
?>

<?php
	##Auto-incremento/decremento##
	
	/*
	 *	$++var, incrementa var e retorna o valor atualizado
	 *  $var++, retorna o valor atualizardo de var e depois incrementa-a.
	 *  
	 *  Tamb�m podem ser utilizados em Strings, ex:
	 *  a vira b
	 *  az vira ba
	 */ 
?>

<?php
	##Comparadores##

	/*
	 * Operando 1			Operando 2			 			   Compara��o
	 * N�mero				N�mero				 				 N�mero
	 * String Num�rica		String Num�rica		 				 N�mero
	 * String Num�rica		N�mero				 				 N�mero
	 * String Num�rica		String N�o Int. Num�rica	 		 N�mero
	 * String N�o Num�rica	N�mero				 				Lexogr�fica
	 * String N�o Num�rica 	String N�o Num�rica	 				Lexogr�fica										
	 */

	//Se quiser comprarar duas Strings num�ricas lexograficamente usar a fun��o strcmp()
	
	/*
	 * != ou <> : Diferentes
	 * === : Mesmo tipo e valor
	 * !== :N�o mesmo tipo ou mesmo valor.
	 */
?>

<?php 
	##Bitwise##
	
	/*
	 * Al�m de &, |, ^ (XOR):
	 * 
	 * Left Shift(<<): D� um shift no n�mero da esquerda em n�mero de posi��es igual
	 * ao da direita, colocando zeros. Ex: 3(11) << 1 = 6 (110)
	 * 
	 * Right Shift(>>): Mata o bit mais a direita, x posi��es.
	 */
?>

<?php
	##Operadores L�gicos##

	/*
	 * (&&, and)
	 * (||, or)
	 * (xor)
	 */
?>

<?php
	##Operadores de Casting##
	
	/*
	 * (int, integer)
	 * (bool, booleann)
	 * (float, double, real)
	 * (string)
	 * (array)
	 * (object)
	 * (unset) -> Tansforma em NULL
	 * 
	 *  Castar um array para integer, retorna 1
	 *  Castar um array para string retorna "Array"
	 *  
	 *  Objeto para Array cria um array de propriedade, mapeando
	 *  o nome da propriedade para o seu valor. O contr�rio tamb�m
	 *  pode ser feito
	 */

	class Person {
		var $name = "Fred";
		var $age = 35;
	}
	
	$o = new Person;
	$a = (array) $o;
	
	print_r($a);
	
	$a = array('name' => "Fred", 'age' => 35, 'wife' => "Wilma");
	$o = (object) $a;
	echo  "<br/>" . $o->name . "<br/>";
	
	/*
	 * Se o nome da propriedade no array for inv�lida, ela vai ficar inacess�vel no objeto,
	 * mas vai estar de volta ao array se o cast for feito de volta.
	 */
?>

<?php
	##Operadores de Atribui��o##

	//No php esses operadores retornam o resultado da opera��o
	$a = 5;
	$b = 10;
	$c = ($a = $b); #Aqui $a=$b retorna 10, c=10.
	
	/*
	 * +=, -=, /=, *=, %=, ^=, &=, |=, .=
	 */
?>

<?php
	##Demais operadores##
	 
	/*
	 * Supress�o de erro (@): Tratamento das mensagens geradas pelos operadores ou fun��es.
	 * Execu��o (`...`): Executa o comando como se fosse sheel script e retorna a sa�da. 
	 */
	$listing = `dir`;
	echo $listing . "<br/>";
	
	/*
	 * Condicional (? :): if tern�rio.
	 * Type (instanceof) 
	 */
?>