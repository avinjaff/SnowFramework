<?php

include('../core/AModel.php');
include('../core/Db.php');

class User extends AModel
{

	function __construct()
	{
		self::SetTable('People');
		self::SetProperties(['Id', 'Firstname', 'Lastname','Username', 'Password']);
	}

	
}

?>