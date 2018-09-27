<?php

include('../core/AModel.php');
require_once '../core/Db.php';

class User extends AModel
{

	function __construct()
	{
		self::SetTable('Users');
		self::SetProperties(array(
			// 'KEY' => DEFAULT_VALUE,
			'Id'=>NULL,
			'Username'=>NULL,
			'Firstname'=>NULL,
			'Lastname'=>NULL,
			'NationalCode'=>NULL,
			'HashPassword'=>NULL,
			'IsActive'=>1,
			'Type'=>'USER',
			'BinImage'=>NULL,
		));
	}
}
?>