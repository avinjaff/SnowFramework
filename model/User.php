<?php

include('../core/AModel.php');
include('../core/Db.php');

class User extends AModel
{

	/// props
	// public $Id;
	// public $Firstname;
	// public $Lastname;
	// public $Password;

	function __construct()
	{
		self::SetTable('People');
		self::SetProperties(['Id', 'Firstname', 'Lastname','Username', 'Password']);
	}

	
}

?>