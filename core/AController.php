<?php

include ('IController.php');

abstract class AController implements IController{

	private $data = '' ;

	function __construct(){
		/*
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->POST();
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->GET();
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
			$this->PUT(); 
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
			$this->DELETE();
		}
		*/
		$this->{$_SERVER['REQUEST_METHOD']}();
	}
	function __destruct(){

	}
	function setData($data){
		$this->data = $data;
	}
	function returnData (){
		if (constant('self::'.'resultType')=='JSON')
		{
			header("Content-Type: application/json");
			echo json_encode($this->data);
		}
		else echo $this->data;
	}
	function GET(){
		$this->setData("get");
		$this->returnData();
	}
	function POST(){
		$this->setData("post");
		$this->returnData();
	}
	function DELETE(){
		$this->setData("delete");
		$this->returnData();
	}
	function PUT(){
		$this->setData("put");
		$this->returnData();
	}

}
?>