<?php
#### Heredocs ####

/*
 * Além do comportamento padrão com aspas duplas e aspas simples,
 * no php existe também os heredocs.
 * 
 * Heredocs são identificados por "<<< identificador", deve existir o espaço
 * entre <<< e o nome do identificador.
 * 
 * O heredoc é terminado quando é encontrada uma linha apenas com o nome do
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
 * Espaços, aspas simples e duplas são preservadas no heredoc
 */
$dialogue = <<< NoMore
"It's not going to happen!" she fumed.
He raised an eyebrow. "Want to bet?"
NoMore;
echo "<br/> $dialogue";
?>