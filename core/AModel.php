<?php
include('IModel.php');
abstract class AModel implements IModel
{
	private $props = '';
	private $table = '';

	function SetProperties($Properties){
		$this->props = $Properties;
	}
	function SetTable($Table)
	{
		$this->table = $Table;
	}

	function ToList($desc = null,$take = null, $skip = 	null)
	{

	}
	function Select($id)
	{
		/// 1- get properties of the class  // You can create a mechanizm like TUPLE
		/// 2- select properties of that class
		/// 3- fill an instance with values
		/// 4- return the instance


		// $db = new Db();

		// $login_query = "select Id from users where Username='" . $username_safe . "' AND Password='" . $password_safe . "';";
		// $login_result = mysqli_query($conn, $login_query);
		// $login_num = mysqli_num_rows($login_result);
		// if ($login_num == 1) {
		// 	$IsUserAuthorized = true;
		// 	$UserId = mysqli_fetch_array($login_result)['Id'];
		// }

		// $t = new User();
		// $t->Id = $id;
		// $t->Firstname = 'test';
		// $t->Lastname = 'testzadeh';
		// return $t;


		$query  = "SELECT " 

		. "`" . $this->props[1] . "`" // WE NEED A LOOP
		. ",`" . $this->props[2] . "`" // FOR THESE TWO LINES


		. " FROM `" . $this->table
		. "` WHERE Id = " . $id; // RULE: Every table should contain a field called Id which is a PK, or we can define PK later.
		$db = new Db();
		$conn = $db->Open();
		$result = mysqli_query($conn, $query);
		$num = mysqli_num_rows($result);
		if ($num == 1) {
		 	$values = mysqli_fetch_array($result);
		 	
		 	// select only field name and value
		 	// its better to fill an instance
		 	
		 	$items[$this->props[1]] = $values[$this->props[1]];
		 	$items[$this->props[2]] = $values[$this->props[2]];

		 	return $items;
		}
	}
	function Delete($id){

	}
	function Update($previousId, $model)
	{

	}
	function Insert($model)
	{
		
	}
 

}
?>