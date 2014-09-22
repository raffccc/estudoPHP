<?php
/*
 * Para lidar com autenticação no PHP.
 * PHP_AUTH_USER e PHP_AUTH_PW em $_SERVER, se não autorizado, colocar no header 
 */
header('WWW-Authenticate: Basic realm="Top Secret Files"');
header("HTTP/1.0 401 Unauthorized");
?>