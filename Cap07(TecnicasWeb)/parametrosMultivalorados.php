<html>

<head>
	<meta charset="UTF-8">
</head>

<?php
/*
 * Um select com a possibilidade de selecionar múltiplos valores deve terminar o
 * name do select com [].
 * 
 * No exemplo abaixo $_GET['languages'], trará um array de valores.
 */
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	Selecione seus atributos pessoais:<br />
	<select name="attributes[]" multiple>
		<option value="teimoso">Teimoso</option>
		<option value="inteligente">Inteligente</option>
		<option value="sexy">Sexy sem ser vulgar</option>
		<option value="economico">Economico</option>
		<option value="preguiçoso">Preguiçoso</option>
	</select>
	<br />
	<input type="submit" name="s" value="Grave Minha Personalidade!" />
</form>

<?php 
if (array_key_exists('s', $_GET)) {
	$description = join(', ', $_GET['attributes']);
	echo "Você tem uma personalidade {$description}.";
} 
?>

</html>