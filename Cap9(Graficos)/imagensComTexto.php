<?php
$imagem = imagecreate(400, 400);

$branco = imagecolorallocate($imagem, 0xFF, 0xFF, 0xFF);
$preto = imagecolorallocate($imagem, 0x00, 0x00, 0x00);

imagefilledrectangle($imagem, 50, 50, 150, 150, $preto);

/*
 * imagestring(image, font_id, x, y, text, color):
 * 
 * x,y: Ponto superior esquerdo do local da fonte.
 * 
 * font_id: 5 fontes built-in (1-5).
 * 
 * imageloadfont(): Carrega uma fonte. Essas fontes são dependentes da arquitetura, portanto não tão portáteis.
 * 
 * Solução! Fontes TrueType:
 * 
 * imagettftext(image, size, angle, x, y, color, font, text):
 * 	- size: em pixels
 * 	- angle: grau anti-horário a partir das 3 horas.
 * 	- x,y: Inferior esquerdo
 * 	- font: se não começar com  é procurada em /usr/share/fontes/truetype
 */
imagestring($imagem, 1, 35, 160, "Fonte: 1 Uma caixa preta", $preto);
imagestring($imagem, 2, 35, 175, "Fonte: 2 Uma caixa preta", $preto);
imagestring($imagem, 3, 35, 195, "Fonte: 3 Uma caixa preta", $preto);
imagestring($imagem, 4, 35, 215, "Fonte: 4 Uma caixa preta", $preto);
imagestring($imagem, 5, 35, 235, "Fonte: 5 Uma caixa preta", $preto);

header("Content-Type: image/png");
imagepng($imagem);
?>