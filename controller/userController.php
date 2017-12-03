<?php 
include('../core/AController.php');
include('../model/User.php');

class userController extends AController{

	function GET(){ 
		parent::GET();

		// $model = new User();
		// $id = parent::getRequest()['id'];
		// $data = $model->Select($id);
		// parent::setData($data);
		
		parent::setData((new User())->Select(parent::getRequest()['id']));

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