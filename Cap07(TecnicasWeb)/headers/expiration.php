<?php
/*
 * Header para informar ao servidor que a página expirou e que ele deve contatar o servidor ao invés de ir em cache.
 */
// header("Expires: Fri, 15 Sep 2014 18:00:00 GMT");

/*
 * Para expirar documento 3 horas a partir de agora.
 * time() (agora) e gmstrftime() (gera string)
 */
$now = time();
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 60*60*3);
header("Expires: {$then}");

/*
 * Para indicar que nunca expira, coloca 1 ano a partir de hoje:
 * $now + 365 * 86440;
 * 
 * Para marcar como expirado devese colocar o tempo como agora ou passado. Só utilizar
 * gmstrftime sem o parâmetro que informa a data.
 * 
 * Melhor maneira de prevenir cache:
 */
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>