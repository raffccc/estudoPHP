<head>
	<meta charset="UTF-8">
</head>

<?php
/*
 * Pode-se registrar uma variável na sessão assim:
 */
session_start();
$_SESSION['contador']++;
echo "Essa página já foi visualizada {$_SESSION['contador']} vezes! <br/>"; 
echo "Session ID: " . session_id();	
/*
 * Por default, os cookies de session ID expiram quando o browser é fechado. Para mudar isso, deve-se alterar o session.cookie_lifetime no php.ini
 * e carregar o período em segundos.
 * 
 * O session ID é passado pelo cookie PHPSESSID.
 * O PHP muda as URLs dos links com o sessionID. Devese habilitar a opção -enable-trans-id.
 */
?>