<html>

<head>
	<meta charset="UTF-8">
</head>

<?php

/*
 * É o Reflection do Java
*/

### Examinando classes ####
/*
 * class_exists(nomeDaClasse)
 * 
 * get_declared_classes(): Retorna array das classes e verifica se o nome da classe se encontra no array.
 */

class Primata {
	
}

class Pessoa extends Primata {
	public $nome = "Rafael";
	public $idade;
}

echo (class_exists("Pessoa") ? "Existe" : "Não Existe") . "<br/>";
$classes = get_declared_classes();
echo (in_array("Pessoa", $classes) ? "Existe" : "Não Existe") . "<br/>";

/*
 * Acessando métodos e atributos da classe:
 * 
 * get_class_methods(nomeDaClasse): Lista de nome dos métodos;
 * 
 * get_class_vars(nomeDaClasse): Mapeia a o nome da propriedade para seu valor. Só retorna
 * as propriedades visíveis no escopo.
 */
$class = "Pessoa";
$methods = get_class_methods($class);
$methods = get_class_methods("Pessoa");

/*
 * get_parent_class(nomeDaClasse): Nome da classe pai.
 */
function mostraTodasClasses() {
	$arrayClasses = get_declared_classes();
	
	if (count($arrayClasses)) {
		foreach ($arrayClasses as $classe) {
			echo "Métodos da classe {$classe}<br/>";
			
			$metodos = get_class_methods($classe);
			if (!count($metodos)) {
				echo "Classe não possui nenhum método<br/>";
			} else {
				foreach ($metodos as $metodo) {
					echo "Método: {$metodo} <br/>";
				}
			}
			
			echo "Propriedades:<br />";
			$properties = get_class_vars($classe);
			if (!count($properties)) {
				echo "<i>Não possui</i><br />";
			}
			else {
				foreach($properties as $propriedade => $valor) {
					echo "Propriedade: {$propriedade}, Valor: {$valor} <br />";
				}	
			}
			
			echo "<hr/>";
		}
	}
}

?>

<?php

#### EXAMINANDO UM OBJETO ####
/*
 * Métodos úteis, is_object(objeto), is_method(objeto, nomeMetodo)
 * 
 * get_object_vars(objeto): Retorna um array com as propriedades setadas do objeto.
 */
$rafael = new Pessoa();
var_dump(get_object_vars($rafael));

/*
 * get_parent_class(objeto): Aceita objeto ou nome de classe. Retorna o nome da classe pai ou false caso não exista.
 */
echo get_parent_class("Pessoa");

?>

</html>