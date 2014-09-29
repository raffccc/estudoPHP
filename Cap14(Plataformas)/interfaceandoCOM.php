<?php
/*
 * COM é um Remote Procedure Call com algumas features de orientação a objeto.
 * 
 * É uma forma de chamar um programa (COM server) a partir de outro.
 * 
 * Se é na mesma máquina é COM, se for remoto é Distributed COM, DCOM.
 * 
 * Se o programa é uma DLL e roda no mesmo processo, é chamado de in-process (inproc), se é 
 * em um processo diferente é conhecimdo como out-of-process server ou local server application.
 * 
 * Exemplo: Hello World no Word
 */
$word = new COM("word.application") or die("Impossível iniciar a aplicação do WORD");
echo "Word carregado, versão {$word->version} <br/>";
		
//Abrindo um documento vazio
$word->Documents->add();

$word->Selection->typeText("Ola Mundo");
$word->Documents[1]->saveAs("C:/Desenvolvimento/Estudo/php/teste.doc");

//Fechando o word
$word->quit();

//Liberando o objeto
$word = null;

echo "Tudo Feito!";

//O CÓDIGO DEVE SER RODADO NA LINHA DE COMANDO.
?>