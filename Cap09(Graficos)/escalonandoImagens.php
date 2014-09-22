<?php
/*
 * ### Redimensionar Imagens ###
 * O segundo método é mais lento, porém o resultado é mais limpo, com bordas mais suaves.
 * 
 * imagecopyresized(dest, src, dx, dy, sx, sy, dw, dh, sw, sh):
 * imagecopyresampled(dest, src, dx, dy, sx, sy, dw, dh, sw, sh)
 *	- dest e src são image handles.
 *	- dx, dy: Pontos em dest que a região será copada.
 *	- sx, sy: região superior esquerda da imagem de origem
 *	- sw, sh, dw e dh: Largura e altura das regiões de cópia da imagem de origem. 
 */
$source = imagecreatefrompng("php.png");

$width = imagesx($source);
$height = imagesy($source);

$x = $width/2;
$y = $height/2;

/*
 * - imagecreate() usa uma paleta de cores 8 bits
 * - imagecreatetruecolor(width, height): Cria uma imagem true color com um canal alpha 7 bits.
 * - imagecolorallocatealpha(image, red, green, blue, alpha): Retorna uma cor que inclui transparência. 
 * 		Alpha (0-127), 0-> Opaco; 127-> Transparente.
 */
$destination = imagecreatetruecolor($x, $y);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $x, $y, $width, $height);

header("Content-Type: image/png");
imagepng($destination);
?>