<?php 

class word {
	protected $id;
	var $name;
	var $max_guess;

	function __construct($random_word) {
		$this->name = $random_word;
		$this->max_guess = 10;
	}
	
	function set_name($new_name) {
		$this->name = $new_name;
	}
	
	function get_name() {
		return $this->name;
	}
	
	function set_max_guess($new_max_guess) {
		$this->max_guess = $new_max_guess;
	}
	
	function get_max_guess() {
		return $this->max_guess;
	}

	function set_id($id){
		$this->id = $id;
	}
	
	function get_id(){
		return $this->id;
	}

}

?>