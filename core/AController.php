<?php

include ('IController.php');

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
	function GET(){
		$this->setRequest($_GET);
		// $this->setData("get");
		// $this->returnData();
	}
	function POST(){
		$this->setRequest($_POST);
		// $this->setData("post");
		// $this->returnData();
	}
	function DELETE(){
		$this->setRequest($_DELETE);
		$this->setData("delete");
		// $this->returnData();
	}
	function PUT(){
		$this->setRequest($_PUT);
		// $this->setData("put");
		// $this->returnData();
	}

}
?>