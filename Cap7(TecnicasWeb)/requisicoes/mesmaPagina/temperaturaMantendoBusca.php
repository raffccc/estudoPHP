<html>

<head>
	<meta charset="UTF-8">
</head>

<?php $farenheit = $_GET['fahrenheit']; ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
		Farenheit:
		<input type="text" name="fahrenheit" value="<?= $farenheit ?>" /><br />
		<input type="submit" value="Converter para Celsius!" />
	</form>
<?php 
 	if (!is_null($_GET['fahrenheit'])) {
		$farenheit = $_GET['fahrenheit'];
		$celsius = ($farenheit-32)*5/9;
		printf('Temperatuta %.2fF em Celsius: %.2fC', $farenheit, $celsius);
	}
?>
</html>