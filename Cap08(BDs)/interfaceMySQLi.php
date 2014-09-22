<?php
/*
 * Para conectar:
 * 
 * new mysqli(host, user, password, databaseName);
 */
try {
	$db= new mysqli('localhost', 'root', NULL, 'biblioteca');
} catch (Exception $error) {
	echo "Erro ao conectar: " . $error->getMessage();
}

$sql = "SELECT * FROM biblioteca.livro";
$resultado = $db->query($sql);

while ($livro = $resultado->fetch_assoc()) {
	echo "Livro de ID: {$livro['ID_LIVRO']} eh: {$livro['NM_LIVRO']} <br/>";
}

$resultado->close();
$db->close();
?>