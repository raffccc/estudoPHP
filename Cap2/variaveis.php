<?php 
	//Variável com nome armazenado em outra variável.
	$foo = "bar";
	
	//Com 2 $, eu pego o valor "bar", transformo-o em variável e inicializo-o com o valor "baz".
	$$foo = "baz";
?>

<?php 
	/*
	 * Referências de variáveis. Apelidos para variáveis.
	 * 
	 * Ex: fazer a variável $black um alias para $white
	 */
	$white = "snow";
	$black =& $white;
	
	//Vai continuar a imprimir "snow", os alias continuam com o valor.
	unset($white);
	print $black;
	
	//Funções podem retornar valores por referência colocando o & no começo da função.
	function &retRef() { 
		$var = "PHP";
		return $var;
	}
	$v =& retRef();
?>

<br/>

<?php 
	//Escopo de variáveis: local, global, static e parâmetros de função.
	
	/*
	 * Escopo local:
	 * - Somente dentro de funções
	 * - Por padrão, variáveis globais não são visualizadas dentro de função
	 * - Não existe escopo de loop, bloco condicional ou outro tipo de bloco.
	 */

	//Escopo global.
	function updateCounter() {
		global $counter; //Sem a keyword global, vira uma variável local.
		$GLOBALS['counter']++; //outra forma
		$counter++;
	}
	$counter = 10;
	updateCounter();
	echo "{$counter}<br/><br/>"; //12
	
	/*
	 * Escopo static. Variável mantem o valor entre chamadas da função, mas só na função.
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
	 * Parâmetros de Função, são locais.
	 */
	function greet($name) {
		echo "Hello, {$name}\n";
	}
?>

<br/>