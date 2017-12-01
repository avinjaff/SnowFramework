<?php 
include('../core/AController.php');

class homeController extends AController{

	function __construct(){
		
	}
	function __destruct(){
		
	}
	
	// function setData($Data){
	// 	parent::setData($Data);
	// }

	function sendResult(){ 
		parent::sendResult();
	}

}

$home = new homeController();

$home->setData("this is home controller");
$home->sendResult();



?>