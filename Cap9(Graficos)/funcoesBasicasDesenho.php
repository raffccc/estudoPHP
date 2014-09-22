<?php
/*
 * imagesetpixel(image, x, y, color): seta a cor de um pixal
 * 
 * ### Desenhar linhas ###
 * imageline(image, start_x, start_ y, end_x, end_ y, color);
 * imagedashedline(image, start_x, start_ y, end_x, end_ y, color);
 * 
 * ### Desenhar retângulos ###
 * imagerectangle(image, tlx, tly, brx, bry, color);
 * imagefilledrectangle(image, tlx, tly, brx, bry, color);
 * 
 * ### Desenhar polígonos ###
 * imagepolygon(image, points, number, color);
 * imagefilledpolygon(image, points, number, color);
 * 
 * Points é um array de pontos x,y. Number é o número de vértices do polígono.
 * 
 * ### Desenhar arco ###
 * imagearc(image, center_x, center_ y, width, height, start, end, color);
 * 
 * start e end são dados como graus contando no sentido anti-horário a partir das 3 horas.
 * Elipse total start 0 e end 360.
 * 
 * ### Preencher imagens já desenhadas ###
 * imagefill(image, x, y, color): Muda a cor dos pixels começando da posição informada, qualquer mudança de cor de pixel encontrada marca o fim do preenchimento.
 * imagefilltoborder(image, x, y, border_color, color):   Aqui se informar a cor do pixel de limite.
 * 
 * ### Rotacionar imagens ###
 * imagerotate(image, angle, background_color): background-color, é a cor do fundo a ser utilizada pela área não coberta.
 */
$imagem = imagecreate(200,200);
$branco = imagecolorallocate($imagem, 0xFF, 0xFF, 0xFF);
$preto = imagecolorallocate($imagem, 0x00, 0x00, 0x00);

### Exemplo do arco ###
// imagearc($imagem, 100, 100, 100, 100, 0, 360, $branco);

### Exemplo de rotação ###
imagefilledrectangle($imagem, 50, 50, 150, 150, $preto);
$rotated = imagerotate($imagem, 45, $preto);

header("Content-Type: img/png");
imagepng($rotated);
?>
