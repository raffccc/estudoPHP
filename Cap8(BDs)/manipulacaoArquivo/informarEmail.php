<?php
/*
 * mkdir(): Criar diretório
 * file_exists(): Verifica se o arquivo existe
 * fopen(): Abre o arquivo para leitura
 * fread(): Lê o conteúdo do arquivo
 * flock(): Usado para obter lock exclusivo de um arquivo para escrita
 * fwrite(): Escreve conteúdo no arquivo
 * filesize(): tamanho do arquivo
 * fclose(): Fecha o arquivo
 */
session_start();

if (!empty($_POST['posted']) && !empty($_POST['email'])) {
	$pasta = "questionarios/" . strtolower($_POST['email']);
	
	$_SESSION['pasta'] = $pasta;
	
	if (!file_exists($pasta)) {
		//0777, permite leitura, escrita e acesso. True é para recursão, criar tudo do caminho
		mkdir($pasta, 0777, true);
	}
	
	header("Location: pergunta1.php");
} else { ?>

	<html>
		<head>
			<head>
				<title>Arquivos & Pastas - Questionário Online</title>
				<meta charset="UTF-8">
			</head>
		</head>
		
		<body>
			<h2>Questionário</h2>
			
			<p>Favor digite seu e-mail para começar a gravar seus comentários</p>
			
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input type="hidden" name="posted" value="1" />
				<p>
					Email: <input name="email" size="45"> <br/>
					<input type="submit" value="Enviar" />
				</p>	
			</form>
		</body>
	</html>
<?php } ?>	