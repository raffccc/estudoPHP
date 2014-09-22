<head>
	<meta charset="UTF-8">
</head>

<?php
$nome = getValorMetodo('nome');
$tipoMidia= getValorMetodo('tipoMidia');
$nomeArquivo = getValorMetodo('nomeArquivo');
$caption = getValorMetodo('caption');
$status = getValorMetodo('status');
$tentou = (getValorMetodo('tentou') == 'sim');

if ($tentou) {
	$validou = (!empty($nome) && !empty($tipoMidia) && !empty($nomeArquivo));
	if (!$validou) { ?>
		<p>O nome, tipo de mídia e nome de arquivo são obrigatórios</p>
<?php 
	}
}

if ($tentou && $validou) {	
	echo "<p>Item foi criado</p>";
}

//tipo de mídia selecioada? Escreva selecionado
function midiaSelecionada($tipo) {
	global $tipoMidia;
	if ($tipoMidia === $tipo) {
		echo "selecionado<br/>";
	}
}

function getValorMetodo($nomeAtributo) {
	if (array_key_exists($nomeAtributo, $_POST)) {
		return $_POST[$nomeAtributo];
	}
	return "";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	Nome: <input type="text" name="nome" value="<?= $nome; ?>" /><br />
	
	Status: <input type="checkbox" name="status" value="ativo"
	<?php if ($status === "ativo") { echo "checked"; } ?> /> Ativo<br />
	
	Media: 
	<select name="tipoMidia">
		<option value="">Escolha um</option>
		<option value="imagem" <?php midiaSelecionada("imagem"); ?> />Imagem</option>
		<option value="audio" <?php midiaSelecionada("audio"); ?> />Audio</option>
		<option value="filme" <?php midiaSelecionada("filme"); ?> />Filme</option>
	</select>
	<br />
	
	Arquivo: <input type="text" name="nomeArquivo" value="<?= $nomeArquivo; ?>" /><br />
	Caption: <textarea name="caption"><?= $caption; ?></textarea><br />
	
	<input type="hidden" name="tentou" value="sim" />
	<input type="submit" value="<?php echo $tentou ? "Continue" : "Criar"; ?>" />
</form>