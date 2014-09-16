<?php
/*
 * Mandar um cookie para o browser:
 * 
 * setcookie(name [, value [, expire [, path [, domain [, secure ]]]]]): Pode ser usado como primeiro item do body.
 * 
 * 
 * - name: Nome do cookie, não pode ter espaço ou virgulas
 * - value: String anexada ao cookie.
 * - expire: Número de segundos desde 01/01/1970. Ex: time() + 60*60*2, 2hrs a partir de agora.
 * se vazio, o cookie fica armazenado em memória.
 * 
 * - path: O browser só retornará o cookie para páginas com URL abaixo desse caminho. Se /store/front/cart.php
 * carrega um cookie e não especifica um caminho, o cookie será enviado de volta para todas as páginas cuja URL
 * começa com /store/front/
 * 
 * - domain: O browser retornará o cookie só para as URLs desse domínio. O default é o hostname.
 * - secure: O browser só transmitirá o cookie em conexões https
 * 
 *  Exemplo: Número de vezes que a página foi acessada.
 */
$numeroAcessos = $_COOKIE['acessos'];
setcookie("acessos", ++$numeroAcessos);

/*
 * Se o nome do cookie tiver '.', ele é substituído por '_'.
 */
?>