<?php 
include('../core/AController.php');

class userController extends AController{

	// function __construct(){
		
	// }
	// function __destruct(){
		
	// }
	
	// function setData($Data){
	// 	parent::setData($Data);
	// }

	function GET(){ 
		parent::GET();
		parent::setData(parent::getRequest()['Username']);
		parent::returnData();
	}

	function POST(){ 
		parent::POST();
		parent::setData(parent::getRequest()['Firstname']);
		parent::returnData();
	}


}

$user = new userController();
?>