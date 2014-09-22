<?php
$image = imagecreatetruecolor(150, 150);

$white = imagecolorallocate($image, 255, 255, 255);

//False para desabilitar o canal alpha (transparência), default é true.
imagealphablending($image, true);
imagefilledrectangle($image, 0, 0, 150, 150, $white);

$red = imagecolorallocatealpha($image, 255, 50, 0, 100);

imagefilledellipse($image, 75, 75, 80, 63, $red);

header("Content-Type: image/png");
imagepng($image);

/*
 * imagecolorat(image, x, y): Retorna a cor do pixel.
 * 
 * Quando é em uma imagem de paleta de 8 bits, retorna o índice de cor que deve ser passado
 * para imagecolorsforindex(), e retorna o RGB.
 * 
 * imagecolorsforindex(image, index): Retorna um array com chaves 'red', 'green' e 'blue'.
 * Se for chamado em uma imagem trueColor, o array também tem a chave 'alpha'. 
 */
imageli
?>