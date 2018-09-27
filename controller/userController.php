<?php 
include('../core/AController.php');
include('../model/User.php');

class userController extends AController{

	/* NOTE:
	
	Checkout:
		[snowframework]/controller/deviceController.php?Username=admin&BinImage=✓
	vs
		[snowframework]/controller/deviceController.php?Username=admin

	*/

	function GET($Auth = true){
		parent::GET($Auth);

		echo '{"Id":"0","Username":"admin","Firstname":"محمدرضا","Lastname":"طیبی","NationalCode":"3600000000","HashPassword":null,"IsActive":"1","Type":"ADMIN","BinImage":null}';
		return; // Ignore next lines for test 

		$model = new User();
		if (parent::getRequest('LOGINHELLO') == "true")
			$model->SetValue("Id", $_GET['_LOGGINID']);
		else
		{
			foreach($model->GetProperties() as $key => $value){
				$model->SetValue($key, parent::getRequest($key));
			}
		}
		$data = $model->Select(-1 , -1, 'IsActive DESC, Id', 'DESC');
		parent::setData($data);
		parent::returnData();
	}

	function POST($Auth = false){ 
		parent::POST($Auth);
		$user = new User();	
		foreach($user->GetProperties() as $key => $value){
			$user->SetValue($key, 
				(parent::getRequest($key) == null) ? $value : parent::getRequest($key)
			);
		}
		$user->Insert();
		(new Authentication())->AddAccess("~", "~", "Users.Id", $user->GetProperties()['Id']);
		parent::setData($user->GetProperties());
		parent::returnData();
	}

	function PUT($Auth = true)
	{
		parent::PUT($Auth);
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

	function DELETE($Auth = false){
		parent::DELETE($Auth);
		$user = new User();
		$user->SetValue("Id", parent::getRequest("Id"));
		$user->Delete();
		(new Authentication())->RemoveAccess("~", "~", "Users.Id", parent::getRequest("Id"));
		parent::setData($user->GetProperties());
		parent::returnData();
	}
}

$user = new userController();
?>