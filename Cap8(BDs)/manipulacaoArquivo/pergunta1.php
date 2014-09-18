<?php
session_start();
$pasta = $_SESSION['pasta'];
$nomeArquivo = $pasta . '/questao1.txt';

/*
 * a+: Abre para ler e escrever, ponteiro no fim do arquivo. Se arquivo não existir, crie.
 */
$manipuladorArquivo = fopen($nomeArquivo, "a+");
$comentarios = null;
if (filesize($nomeArquivo) > 0) {
	$comentarios = fread($manipuladorArquivo, filesize($nomeArquivo));
}
fclose($manipuladorArquivo);

if (!empty($_POST['posted'])) {
	$questao1 = $_POST['questao1'];
	/*
	 * w+: Abre para ler e escrever, ponteiro no início do arquivo e trunca o arquivo para tamanho 0. Se arquivo não existir, crie.
	 * Objetivo aqui é abrir o arquivo para reescrever. 
	 */
	$manipuladorArquivo = fopen($nomeArquivo, "w+");
	
	//Faça o lock exclusivo
	if (flock($manipuladorArquivo, LOCK_EX)) {
		if (fwrite($manipuladorArquivo, $questao1) == FALSE) {
			echo "Não foi possível escrever no arquivo ($nomeArquivo)";
		}
		
		//libera o lock
		flock($manipuladorArquivo, LOCK_UN);
	}
	
	fclose($manipuladorArquivo);
	header("Location: pergunta2.php");
} else { ?>

<html>
	<head>
		<title>Arquivos & Pastas - Questionário Online</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<table border=0>
			<tr>
				<td bgcolor=lightblue>1) Qual um nome de cachorro que você considera legal?</td>
			</tr>
			<tr>
				<td>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=POST>
						<input type="hidden" name="posted" value=1>
						<br/>
						<textarea name="questao1" rows=12 cols=35><?= $comentarios ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
						<input type="submit" value="Enviar">
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php } ?>