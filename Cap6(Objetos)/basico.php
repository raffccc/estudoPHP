<?php

/*
 * Nome de classes são case insensitive.
 * 
 * new Classe -> Instancia o objeto
 * 
 * No PHP é possível fazer isso
 * 
 * $a = "Classe"
 * new $a;
 * 
 * Isso também é possível:
 * 
 * $account = new Account;
 * $object = "account";
 * ${$object}->init(50000,1.10); //Mesma coisa de chamar o método init na classe Account.
 * 
 * Pode-se fazer isso para acessar métodos e variáveis públicas do objeto
 */

/*
 * Métodos estáticos são invocados assim:
 * 	NomeDaClasse::método;
 */

/*
 * Para criar a cópia de um objeto
 * 
 * $f = new Person("Fred", 35);
 * $b = clone $f;
 * 
 * Caso Person tivesse o método __clone(), este seria chamado após o término da clonagem. * 
 */

/*
 * Classe não tem visibilidade só métodos e atributos.
 * 
 * Visibilidade:
 * 
 * public: Todos podem ver (é o default se não escrito)
 * private: Só na classe
 * protected: Só na classe e na hierarquia.
 */

/*
 * Eu posso declarar minha classe sem os atributos, apenas com os getters e setters.
 * É boa prática declarar os atributos.
 */
class Person {
	private $name = "Rafael";
	//private $teste = 3*5*2; NÃO PODE!, apenas valores simples.
	static $global = 23;
	
	//Constantes dentro da classe
	const PESSOA_FISICA = "F";
	const PESSOA_JURIDICA = "J";
	
	function getName() {
		return $this->name;
	}
	
	function setName($newName) {
		$this->name = $newName;
	}
	
	function acessandoAtributoEstatico() {
		self::$global;
		self:PESSOA_FISICA;
	}
}

class Funcionario extends Person {
	function chamandoMetodoPai() {
		parent::getName();
	}
}

echo (new Person())->getName() . '<br/>'; 
echo Person::$global . '<br/>';
echo Person::PESSOA_FISICA;

/*
 * Interfaces são a mesma coisa do java 
 */
?>