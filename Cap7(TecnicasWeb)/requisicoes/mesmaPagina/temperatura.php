<html>

<head>
	<meta charset="UTF-8">
</head>

<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		Farenheit:
		<input type="text" name="fahrenheit" /><br />
		<input type="submit" value="Converter para Celsius!" />
	</form>
<?php 
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$farenheit = $_POST['fahrenheit'];
	$celsius = ($farenheit-32)*5/9;
	printf('Temperatuta %.2fF em Celsius: %.2fC', $farenheit, $celsius);
} else {
	die("Esse script só aceita requisições GET e POST");
}
?>
</html>