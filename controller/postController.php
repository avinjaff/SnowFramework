<?php

include('../core/APostController.php');
include('../model/Post.php');

class userController extends APostController{

	function GET($Role = 'VSTOR'){
		parent::GET($Role);
		$data = $model->Select();
		parent::setData($data);
		parent::returnData();
	}

	function POST($Role = 'VSTOR'){ 
		parent::POST($Role);
		$user = new User();	
		foreach($user->GetProperties() as $key => $value){
			$user->SetValue($key, 
				(parent::getRequest($key) == null) ? $value : parent::getRequest($key)
			);
		}
		$user->Insert();
		parent::setData($user->GetProperties());
		parent::returnData();
	}

	function PUT($Role = 'VSTOR')
	{
		parent::PUT($Role);
		$user = new User();
		foreach($user->GetProperties() as $key => $value){
			if (parent::getRequest($key) == null)
				continue;
			$user->SetValue($key, parent::getRequest($key));
			$user->SetOperand($key);
		}
		$user->Update(parent::getRequest("previousId"));
		parent::setData($user->GetProperties());
		parent::returnData();
	}

	function DELETE($Role = 'VSTOR'){
		parent::DELETE($Role);
		$user = new User();
		$user->SetValue("Id", parent::getRequest("Id"));
		$user->Delete();
		parent::setData($user->GetProperties());
		parent::returnData();
	}
}

$user = new userController();
?>