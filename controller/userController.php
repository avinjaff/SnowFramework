<?php 
include('../core/AController.php');
include('../model/User.php');

class userController extends AController{

	function GET($Auth = true){
		parent::GET($Auth);
		$model = new User();
		if (parent::getRequest('LOGINHELLO') == "true")
			$model->SetValue("Id", $_GET['_LOGGINID']);
		else
			$model->SetValue("Id", parent::getRequest('Id'));		
		$data = $model->Select();
		parent::setData($data);
		parent::returnData();
	}

	function POST($Auth = false){ 
		parent::POST($Auth);
		$user = new User();	
		foreach($user->GetProperties() as $key => $value){
			$user->SetValue($key, parent::getRequest($key));
		}
		$user->Insert();
		parent::setData($user->GetProperties());
		parent::returnData();
	}

	function PUT($Auth = true)
	{
		parent::PUT($Auth);
		$user = new User();
		foreach($user->GetProperties() as $key => $value){
				$user->SetValue($key, parent::getRequest($key));
		}
		$user->Update(parent::getRequest("previousId"));
		parent::setData($user->GetProperties());
		parent::returnData();
	}

	function DELETE($Auth = false){
		parent::DELETE($Auth);
		$user = new User();
		$user->SetValue("Id", parent::getRequest("Id"));
		$user->Delete();
		parent::setData($user->GetProperties());
		parent::returnData();
	}
}

$user = new userController();
?>