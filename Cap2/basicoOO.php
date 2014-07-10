<?php
	class Person {
		public $name = '';
		
		function name($newname = NULL) {
			if (! is_null ( $newname )) {
				$this->name = $newname;
			}
			return $this->name;
		}
	}
	
	$ed = new Person;
	$ed->name('Edison');
	echo "Hello, {$ed->name}";
	
	//is_object() para verificar se é objeto	
?>