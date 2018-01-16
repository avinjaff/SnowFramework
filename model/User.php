<?php

include('../core/AModel.php');
include('../core/Db.php');

class User extends AModel
{

	function __construct()
	{
		self::SetTable('Users');
		self::SetProperties(array(
			// 'KEY' => DEFAULT_VALUE,
			'Id'=>NULL,
			'PrimaryNumber'=>NULL,
			'Firstname'=>NULL,
			'Lastname'=>NULL,
			'NationalCode'=>NULL,
			'Image'=>NULL,
		));
	}

	
}

?>