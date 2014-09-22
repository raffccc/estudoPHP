<html>

<?php
/*
 * PDO é uma biblioteca de acesso genérico aos diferentes bancos de dados.
 * 
 * Deve ser ativado no php.ini, no atributo extension.
 * 
 * $db = new PDO($dsn, $username, $password)
 */
try {
	$db = new PDO('mysql:host=localhost;dbname=biblioteca', 'root');
} catch (Exception $error) {
	die("Conexão falhou: " . $error->getMessage());
}
?>

<table style="text-align: center">
	<thead>
		<tr>
			<td colspan="2" style="background-color: lightblue">Livros</td>
		</tr>
		<tr>
			<td>ID Livro</td>
			<td>Nome</td>
		</tr>
	</thead>
	
<?php
$livros = $db->query("SELECT * FROM biblioteca.livro");
if (isset($livros)) {
	foreach ($livros as $livro) {
?>
	<tr>
		<td><?= $livro['ID_LIVRO'] ?></td>
		<td><?= $livro['NM_LIVRO'] ?></td>
	</tr>
<?php
	}
}	
?>
</table>

<?php
/*
 * Prepared statement
 */
$statement = $db->prepare( "SELECT * FROM biblioteca.livro");
$statement->execute();
while ($linha = $statement->fetch()) {
	echo print_r($linha) . '<br/>';
}
$statement = null;
?>

<?php
/*
 * Transações
 */
try {
 	$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$db->beginTransaction ();
	
	$db->exec ( "insert into biblioteca.livro values (3, 'Da Vinci Code')" );
	$db->exec ( "insert into biblioteca.livro values (4, 'Bible')" );
	
	$db->commit ();
} catch (Exception $error) {
	$db->rollBack();
	echo "Transação não completada: " . $error->getMessage();
}
?>

</html>