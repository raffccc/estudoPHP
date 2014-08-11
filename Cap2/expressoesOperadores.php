<?php
	##Casting##

	/*
	 * Integer e Ponto Flutuante: Integer transformado em ponto flutuante
	 * Integer e String: String transformado em número, se for ponto flutuante, integer é convertido para ponto flutuante
	 * Ponto Flutuante e String: String para ponto flutuante
	 * 
	 * ## Cast de String para número: Se não começar com número, tem valor zero. 
	 * Se tiver "e" é ponto flutuante.
	 */

	echo "9 Lives" - 1 . "<br/>"; // 8 (int)
	echo "3.14 Pies" * 2 . "<br/>"; // 6.28 (float)
	echo "9 Lives." - 1 . "<br/>"; // 8 (float)
	echo "1E3 Points of Light" + 1 . "<br/>"; // 1001 (float)
?>

<?php
	##Concatenação##

	/*
	 * É usado o símbolo '.' para concatenar strings
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
	 *  Também podem ser utilizados em Strings, ex:
	 *  a vira b
	 *  az vira ba
	 */ 
?>

<?php
	##Comparadores##

	/*
	 * Operando 1			Operando 2			 			   Comparação
	 * Número				Número				 				 Número
	 * String Numérica		String Numérica		 				 Número
	 * String Numérica		Número				 				 Número
	 * String Numérica		String Não Int. Numérica	 		 Número
	 * String Não Numérica	Número				 				Lexográfica
	 * String Não Numérica 	String Não Numérica	 				Lexográfica										
	 */

	//Se quiser comprarar duas Strings numéricas lexograficamente usar a função strcmp()
	
	/*
	 * != ou <> : Diferentes
	 * === : Mesmo tipo e valor
	 * !== :Não mesmo tipo ou mesmo valor.
	 */
?>

<?php 
	##Bitwise##
	
	/*
	 * Além de &, |, ^ (XOR):
	 * 
	 * Left Shift(<<): Dá um shift no número da esquerda em número de posições igual
	 * ao da direita, colocando zeros. Ex: 3(11) << 1 = 6 (110)
	 * 
	 * Right Shift(>>): Mata o bit mais a direita, x posições.
	 */
?>

<?php
	##Operadores Lógicos##

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
	 *  o nome da propriedade para o seu valor. O contrário também
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
	 * Se o nome da propriedade no array for inválida, ela vai ficar inacessível no objeto,
	 * mas vai estar de volta ao array se o cast for feito de volta.
	 */
?>

<?php
	##Operadores de Atribuição##

	//No php esses operadores retornam o resultado da operação
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
	 * Supressão de erro (@): Tratamento das mensagens geradas pelos operadores ou funções.
	 * Execução (`...`): Executa o comando como se fosse sheel script e retorna a saída. 
	 */
	$listing = `dir`;
	echo $listing . "<br/>";
	
	/*
	 * Condicional (? :): if ternário.
	 * Type (instanceof) 
	 */
?>