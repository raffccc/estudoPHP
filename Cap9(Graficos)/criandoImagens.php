<?php
### Passos básicos para criação de qualquer imagem ###

/*
 * Cria-se a imagem com largura x altura, retorna um handler para a imagem.
 * 
 * Se quiser começar já de uma imagem, esses métodos recebem o path para o arquivo:
 *  -imagecreatefromgif(), imageicreatefromjpeg(), imagecreatefrompng()
 */
$imagem = imagecreate(200,200);


/*
 * Seleciona-se as cores, a primeira será o background (caso seja pra imagens true 
 * color criadas com ImageCreateTrueColor() essa regra não vale).
 */
$branco = imagecolorallocate($imagem, 0xFF, 0xFF, 0xFF);
$preto = imagecolorallocate($imagem, 0x00, 0x00, 0x00);

/*
 * 50,50 é o (x,y) do ponto1; 150,150 é o (x,y) do ponto 2. A área compreendida entre esses 
 * pontos (vértices) formarão o retângulo, preenchido com a cor passada por parâmetro.
 */
imagefilledrectangle($imagem, 50, 50, 150, 150, $preto);

/*
 * O método imagetypes() retorna quais são os tipos de imagens suportadas.
*/

if (imagetypes() & IMG_PNG) {
	/*
	 * Informa ao browser o conteúdo da página. Se carregar esse atributo no início
	 * e qualquer erro acontecer o browser interpreta o erro como uma imagem e mostrar
	 * um gif quebrado.
	 */
	header("Content-Type: img/png");
	
	/*
	 * Gera a imagem:
	 * 
	 * imagegif(image [, filename ]);
	 * imagejpeg(image [, filename [, quality ]]);
	 * imagepng(image [, filename ]);
	 * imagewbmp(image [, filename ]);
	 * 
	 * Se não for dado nome ao arquivo a imagem sai no browser, caso contrário cria ou sobrepõe
	 * a imagem no path fornecido.
	 * 
	 * Quality no jpeg varia de 0 a 100, o default é 75.
	 */
	imagepng($imagem);
} else if (imagetypes() & IMG_JPG) {
	header("Content-Type: image/jpeg");
	imagejpeg($imagem);
} else if (imagetypes() & IMG_GIF) {
	header("Content-Type: image/gif");
	imagegif($imagem);
}
?>

