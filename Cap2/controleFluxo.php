<?php
## If ##

/*
 * Os blocos de código do if podem ser cercados por chaves, ou seguido de ':'.
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

//Sintaxe anternativa seria switch($name): e ao invés de } "endswitch;"
?>

<?php
## while ##

//while também tém a sintaxe alternativa de ':' e 'endwhile;'

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

//Permite especificar diretivas de execução para um bloco de código. Duas Formas

// 1 - tick. A cada 4 statements no bloco do declare printf() é invocada. 
register_tick_function("printf", "Meu nome é %s<br/>", "Rafael");
declare (ticks = 4) {
	for($i = 1; $i <= 10;  $i++) { //Uma linha 
		echo $i, "<br/>"; //Outra linha
	}
}

/*
 * Outra forma de diretiva é o encoding. Essa forma é ignorada ao menos que se compile o PHP com a opção --enable-zend-multibyte.
 * Deve ser a primeira linha do código.
 * declare(encoding = "UTF-8");
 */
?>

<?php
## exit e return ##

//o return é usado igual ao java
//o alias do exit é die() (exit não existe), que recebe uma string ou código de status que é impresso antes do código terminar.
?>

<?php
## goto ##

//usado para pular no fluxo. A label identificada no goto deve ser seguida de ":". Não se pode fazer goto para dentro de um loop ou switch
for($i = 0; $i < 5; $i++) {
	if (false) {
		goto cleanup;
	}
}
cleanup:
echo "goto";
?>