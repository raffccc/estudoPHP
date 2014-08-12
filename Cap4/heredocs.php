<?php
#### Heredocs ####

/*
 * Al�m do comportamento padr�o com aspas duplas e aspas simples,
 * no php existe tamb�m os heredocs.
 * 
 * Heredocs s�o identificados por "<<< identificador", deve existir o espa�o
 * entre <<< e o nome do identificador.
 * 
 * O heredoc � terminado quando � encontrada uma linha apenas com o nome do
 * identificador.
 */
 
 $clerihew = <<< EndOfQuote
Sir Humphrey Davy
Abominated gravy.
He lived in the odium
Of having discovered sodium.
EndOfQuote;
//PODE-SE UTILIZAR O ;
 
 echo $clerihew;

printf(<<< Template
<br/> %s is %d years old.
Template
, "Fred", 35); //DEVE-SE CONTINUAR NA OUTRA LINHA

/*
 * Espa�os, aspas simples e duplas s�o preservadas no heredoc
 */
$dialogue = <<< NoMore
"It's not going to happen!" she fumed.
He raised an eyebrow. "Want to bet?"
NoMore;
echo "<br/> $dialogue";
?>