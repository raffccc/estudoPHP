<?php 
	//Vari�vel com nome armazenado em outra vari�vel.
	$foo = "bar";
	
	//Com 2 $, eu pego o valor "bar", transformo-o em vari�vel e inicializo-o com o valor "baz".
	$$foo = "baz";
?>

<?php 
	/*
	 * Refer�ncias de vari�veis. Apelidos para vari�veis.
	 * 
	 * Ex: fazer a vari�vel $black um alias para $white
	 */
	$white = "snow";
	$black =& $white;
	
	//Vai continuar a imprimir "snow", os alias continuam com o valor.
	unset($white);
	print $black;
	
	//Fun��es podem retornar valores por refer�ncia colocando o & no come�o da fun��o.
	function &retRef() { 
		$var = "PHP";
		return $var;
	}
	$v =& retRef();
?>

<br/>

<?php 
	//Escopo de vari�veis: local, global, static e par�metros de fun��o.
	
	/*
	 * Escopo local:
	 * - Somente dentro de fun��es
	 * - Por padr�o, vari�veis globais n�o s�o visualizadas dentro de fun��o
	 * - N�o existe escopo de loop, bloco condicional ou outro tipo de bloco.
	 */

	//Escopo global.
	function updateCounter() {
		global $counter; //Sem a keyword global, vira uma vari�vel local.
		$GLOBALS['counter']++; //outra forma
		$counter++;
	}
	$counter = 10;
	updateCounter();
	echo "{$counter}<br/><br/>"; //12
	
	/*
	 * Escopo static. Vari�vel mantem o valor entre chamadas da fun��o, mas s� na fun��o.
	 */	
	function updateCounterStatic() {
		static $counter = 0;
		$counter++;
		echo "Static counter is now {$counter}<br/>";
	}
	$counter = 10;
	updateCounterStatic(); //imprime 1
	updateCounterStatic(); //imprime 2
	echo "Global counter is {$counter}<br/>"; //imprime 10
	
	/*
	 * Par�metros de Fun��o, s�o locais.
	 */
	function greet($name) {
		echo "Hello, {$name}\n";
	}
?>

<br/>