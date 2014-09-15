<html>

<head>
	<meta charset="UTF-8">
</head>

<?php
/*
 * Utilizar o array $_FILES
 * 
 * Duas maneiras de limitar o tamanho do upload:
 * 
 * 1) upload_max_filesize no php.ini: Setado em 2MB por default
 * 2) Se o form submeter um parâmetro chamado MAX_FILE_SIZE antes de parâmetros file,
 * se for maior que upload_max_filesize, é ignorado.
 */
?>

<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="10240">
	
	Arquivo: <input name="arquivo" type="file" />
	<input type="submit" value="Upload" />
</form>

<?php
/*
 * Cada elemento no $_FILES também é um array, esse array possui informações sobre o arquivo que foi feito upload.
 * As chaves são:
 * 
 * name: Nome do arquivo (absolute path caso seja feito pelo windows)
 * type: Tipo MIME
 * size: Se o tamanho for muito grande size é 0
 * tmp_name: Nome do arquivo temporário no servidor. Se o arquivo é muito grande, retorna none.
 * 
 * is_uploaded_file(): Checa se o arquivo foi "upado" com sucesso.
 */
if (array_key_exists('arquivo', $_FILES) && array_key_exists('tmp_name', $_FILES['arquivo']) && is_uploaded_file($_FILES['arquivo']['tmp_name'])) {
	$nomeArquivoTemporario = $_FILES['arquivo']['tmp_name'];
	echo "Upload feito em {$nomeArquivoTemporario} <br/>";
	echo "Mudando o endereço do arquivo temporário </br>";
 	move_uploaded_file($nomeArquivoTemporario, "C:/Rafael/arquivo.txt");
}

/*
 * Upload é feito para a pasta temporária carregada em upload_tmp_dir no php.ini.
 * Ao término da execução do script, o arquivo temporário é apagado.
 */

?>

</html>