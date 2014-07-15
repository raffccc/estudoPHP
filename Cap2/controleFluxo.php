<?php
## If ##

/*
 * Os blocos de c�digo do if podem ser cercados por chaves, ou seguido de ':'.
 * Quando seguido por ':', deve-se colocar um endif ao final do bloco de ifs.
 * 
 * No php existe o elseif e else if...
 */
if (true):
	echo "Welcome! <br/>";
	$greeted = 1;
 else:
	echo "Access Forbidden! <br/>";
	exit();
endif;
?>


<?php
## switch ##

$name = "rafael";
switch($name) {
	case 'ktatroe':
		// do something
		break;
	case 'dawn':
		// do something
		break;
	case 'petermac':
		// do something
		break;
	case 'bobk':
		// do something
		break;
	default:
		//do something
		//line 2
		break;	
}

//Sintaxe anternativa seria switch($name): e ao inv�s de } "endswitch;"
?>

<?php
## while ##

//while tamb�m t�m a sintaxe alternativa de ':' e 'endwhile;'

//Ao lado do break ou do continue pode ser colocado quantos blocos se deseja sair.
?>

<?php
## for ##

//for tem mesma sintaxe alternativa com endfor
?>

<?php
## foreach ##

//for tem mesma sintaxe alternativa com enforeach;

$arrayForeach = array(
		"Indice1" => "Item1",
		"Indice2" => "Item2",
		"Indice3" => "Item3");

##Exemplos
//Iterar sobre os valores de um array
foreach ($arrayForeach as $current) {
	// ...
}

//Acessando chave e valor
foreach ($arrayForeach as $key => $value) {
	// ...
}
?>

<?php
## try...catch ##

//Igual ao java
?>

<?php
## declare ##

//Permite especificar diretivas de execu��o para um bloco de c�digo. Duas Formas

// 1 - tick. A cada 4 statements no bloco do declare printf() � invocada. 
register_tick_function("printf", "Meu nome � %s<br/>", "Rafael");
declare (ticks = 4) {
	for($i = 1; $i <= 10;  $i++) { //Uma linha 
		echo $i, "<br/>"; //Outra linha
	}
}

/*
 * Outra forma de diretiva � o encoding. Essa forma � ignorada ao menos que se compile o PHP com a op��o --enable-zend-multibyte.
 * Deve ser a primeira linha do c�digo.
 * declare(encoding = "UTF-8");
 */
?>

<?php
## exit e return ##

//o return � usado igual ao java
//o alias do exit � die() (exit n�o existe), que recebe uma string ou c�digo de status que � impresso antes do c�digo terminar.
?>

<?php
## goto ##

//usado para pular no fluxo. A label identificada no goto deve ser seguida de ":". N�o se pode fazer goto para dentro de um loop ou switch
for($i = 0; $i < 5; $i++) {
	if (false) {
		goto cleanup;
	}
}
cleanup:
echo "goto";
?>