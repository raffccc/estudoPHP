<html>

<head>
	<meta charset="UTF-8">
</head>

<?php

### Construtor ###
/*
 * Para chamar o construtor da classe ela deve implementar o __construct;
 * a chamada aos construtores dos pais não é feita automaticamente. Deve
 * ser digitada. 
 */
class Person {
	public $name, $address, $age;
	function __construct($name, $address, $age)
	{
		$this->name = $name;
		$this->address = $address;
		$this->age = $age;
	}
}

class Employee extends Person {
	public $position, $salary;
	function __construct($name, $address, $age, $position, $salary) {
		parent::__construct($name, $address, $age);
		$this->position = $position;
		$this->salary = $salary;
	}
}

$trabalhador = new Employee("Rafael", "Brasília", 25, "Programador", "R$ 20.000,00");
echo $trabalhador->name;
?>

<?php
### Destrutor ###

class Building {
	function __destruct() {
		echo "A Building is being destroyed!";
	}
}
?>

</html>