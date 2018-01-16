<?php

include ('IController.php');
include ('Auth.php');

abstract class AController implements IController{

	private $data = '' ;
	private $request = '' ;

	function __construct(){		
		$this->{$_SERVER['REQUEST_METHOD']}();
	}
	function __destruct(){

	}
	function setData($data){
		$this->data = $data;
	}
	function setRequest($request){
		$this->request = $request;
	}
	function getRequest(){
		return $this->request;	
	}
	function returnData (){
		if (constant('self::'.'resultType')=='JSON')
		{
			header("Content-Type: application/json");
			echo json_encode($this->data);
		}
		else echo $this->data;
	}
	function GET($Auth = false){
		$this->setRequest($_GET);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest()['Username'], $this->getRequest()['Password']))
			return;
	}
	function POST($Auth = false){
		$this->setRequest($_POST);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest()['Username'], $this->getRequest()['Password']))
			return;
	}
	function DELETE($Auth = false){
		$this->setRequest($_GET);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest()['Username'], $this->getRequest()['Password']))
			return;
	}
	function PUT($Auth = false){
		$this->setRequest($_PUT); // TODO: Solve error -> Undefined variable: _PUT
		if ($Auth  && !(new Auth())->IsValid($this->getRequest()['Username'], $this->getRequest()['Password']))
			return;
	}
}
?>