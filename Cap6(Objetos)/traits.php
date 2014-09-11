<html>

<head>
	<meta charset="UTF-8">
</head>

<?php

/*
 * Provê mecanismo para reutilização de código fora de uma hierarquia. Utilizado quando
 * as classes não devem compartilhar um ancestral comum na hierarquia.
 * 
 * trait traitname [ extends baseclass ] {
 *   	[ use traitname, [ traitname, ... ]; ]
 * 		[ visibility $property [ = value ]; ... ]
 * 		[ function functionname (args) {
 * 			// code
 * 		  }
 *		  ...
 *		]
 * }
 * 
 * Para declarar que uma classe deve utilizar os métodos do Trait, utilizar a keyword use
 * e os Traits separados por vírgula.
 */
trait Logger {
	public function log($logString) {
		$className = __CLASS__; //Nome da classe como foi declarada
		echo date("Y-m-d h:i:s", time()) . ": [{$className}] {$logString}" . "<br/>";
	}
}

class User {
	use Logger;
	
	private $name;
	
	function __construct($name = '') {
		$this->name = $name;
		$this->log("Criou Usuário '{$this->name}'");
	}
	
	function __toString() {
		return $this->name;
	}
}

class UserGroup {
	use Logger;
	
	public $users = array();
	
	function addUser(User $user) {
		$this->users[] = $user;
		$this->log("Adicionou o usuário '{$user}' ado grupo");
	}
}

$group = new UserGroup;
$group->addUser(new User("Franklin"));

/*
 * Traits podem ser instanciados como objetos, podem ter hierarquia e podem, inclusive, utilizar outros Traits.
 * Podem declarar métodos abstratos.
 */

/*
 * Se sua classe utiliza múltiplos Traits e eles têm métodos com mesma assinatura ocorre erro.
 * Deve-se informar ao compilador qual método utilizar utilizando a keyword insteadof.
 * 
 * Você pode renomear o método com a keyword as, mas deve ainda dizer qual método usar.
 */
trait Command {
	function run() {
		echo "Executando run do Command <br/>";
	}
}

trait Marathon {
	function run() {
		echo "Correndo uma maratona <br/>";
	}
}

class Person {
	use Command, Marathon {
		Command::run as runCommand;
		Marathon::run insteadof Command;
	}
}

$person = new Person;
$person->run();
$person->runCommand();
?>
</html>