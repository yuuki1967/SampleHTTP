<?php
class BadClass{
	var $cmd;
	var $name;
	function __construct($cmd,$name){
		$this->cmd = $cmd;
		$this->name = $name;
	}

	function __destruct(){
		echo passthru($this->cmd);
	}
}


class NormalClass{
	var $cmd;
	var $name;
	function __construct($cmd,$name){
		$this->cmd = $cmd;
		$this->name = $name;
	}

}


