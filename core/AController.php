<?php

include ('IController.php');

abstract class AController implements IController{

	private $data = '' ;

	function __construct(){
		
	}
	function __destruct(){

	}
	function setData($data){
		$this->data = $data;
	}
	function sendResult(){
		if (constant('self::'.'resultType')=='JSON')
			echo json_encode($this->data);
		else echo '0';
	}
}
?>


