<?php 
include('../core/AController.php');
include('../model/User.php');

class userController extends AController{

	function GET($Auth = false){ 
		/*
		parent::GET();
		$model = new User();
		$id = parent::getRequest()['id'];
		$data = $model->Select($id);
		parent::setData($data);
		parent::returnData();
		*/




		// TEST ONLY : FOR BROWSER
		// PUT NEXT LINES INTO {POST} FUNCTION AND LOAD VALUES DYNAMICALLY USING getRequest	METHODS AND BASED ON PROGRAMMER DEFINED MODEL
		
		parent::POST();
		$user = new User();
		
		$user->SetValue("Firstname", "test");
		$user->SetValue("Lastname", "test");
		$user->SetValue("PrimaryNumber", "09388063351");
		$user->SetValue("NationalCode", "test");
		$user->SetValue("Image", NULL);
		
		$user->Insert();
		parent::setData($user->GetProperties());
		parent::returnData();
	}

	function POST($Auth = false){ 
		// TODO: READ LINES ABOVE
	}
}

$user = new userController();
?>