<?php
/*
 * PHP armazena informação de requisição e configuração em 6 arrays globais:
 * 
 * $_COOKIE: Chave do array é o nome do cookie
 * $_GET: Chave é o nome do parâmetro do form
 * $_POST: Chave é o nome do parâmetro do form
 * $_FILES: Informações sobre upload de arquivos.
 * $_SERVER: Informação sobre o servidor web.
 * $_ENV: Array com chaves que são nomes de variáveis de ambiente e seu valor.
 * 
 * $_REQUEST: Contém todos os elementos do  $_GET, $_POST e $_COOKIE.
 */
?>

<?php
/*
 * ### Informação do servidor ($_SERVER) ###
 * 
 * PHP_SELF: Nome da página atual
 * SERVER_SOFTWARE: Identifica o servidor (ex: "Apache/1.3.33 (Unix) mod_perl/1.26 PHP/5.0.4")
 * SERVER_NAME: Hostname, DNS ou IP para auto referenciar URLs.
 * GATEWAY_INTERFACE: Versão do padrão CGI (ex: "CGI/1.1")
 * SERVER_PROTOCOLO: Nome e versão do protocolo de request
 * SERVER_PORT: Porta pela qual o request foi feito
 * REQUEST_METHOD: Método utilizado para recuperar o documento (Ex: GET)
 * PATH_INFO: Elementos extras no path dado pelo cliente (Ex: /list/users)
 * PATH_TRANSLATED: PATH_INFO, traduzido pelo servidor para um nome de arquivo. (Ex: /home/httpd/htdocs/list/users)
 * SCRIPT:NAME: Caminho URL para a página atual
 * QUERY_STRING: Tudo depois do ? na URL
 * REMOTE_HOST: Hostname da máquina que solicitou a página. Se não existe DNS para a máquina, o valor é vazio.
 * REMOTE_ADDR: IP da máquina que solicitou a página.
 * AUTH_TYPE: Se a página é protegina por senha.
 * REMOTE_USER: Se a página é protegida por senha, é o usuário.
 * 
 * REMOTE_IDENT: Se o servidor é configurado para usar identd esse é o nome do usuário capturado do host que
 * fez a requisição.
 * 
 * CONTENT_TYPE: Tipo de conteúdo anexado às queries como PUT  e PUST. (ex: x-url-encoded)
 * CONTENT_LENGTH: Tamanho da informação anexada às queries como PUT e POST
 * 
 * Servidores apache colocam no $_SERVER atributos com o nome das propriedades do cabeçalho,
 * transforma todas as letras em maiúsculo, troca - por _ e colocar HTTP_ no início.
 * Ex: HTTP_USER_AGENT, HTTP_REFERER: Página de onde veio a requisição.
 */
echo $_SERVER['REQUEST_METHOD'];
?>

<?php
#### PROCESSANDO FORMS ####

/*
 * Parâmetros
 */

?>