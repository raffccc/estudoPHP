<?php
### Implementação de interface iterator ###

class BasicArray implements Iterator {
	private $position = 0;
	private $array = ["first", "second", "third"];
	
	public function __construct() {
		$this->position = 0;
	}
	
	/*
	 * Os métodos abaixo devem ser implementados
	 */
	public function rewind() {
		$this->position = 0;
	}
	
	public function current() {
		return $this->array[$this->position];
	}
	
	public function key() {
		return $this->position;
	}
	
	public function next() {
		$this->position++;
	}
	
	public function valid()	{
		return isset($this->array[$this->position]);
	}
}

$basicArray = new BasicArray;

foreach ($basicArray as $value) {
	echo "{$value}<br/>";
}
foreach ($basicArray as $key => $value) {
	echo "{$key} => {$value}<br/>";
}
?>