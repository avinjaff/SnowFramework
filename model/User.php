<?php
include_once BASEPATH . 'core/AModel.php';

class User extends AModel
{

	function __construct()
	{
		self::SetTable('users');
		self::SetPrimaryKey('Id');
		self::SetProperties(array(
			// 'KEY' => DEFAULT_VALUE,
			'Id'=>NULL,
			'Username'=>NULL,
			'HashPassword'=>NULL,
			'Active'=>0,
			'Role'=>'VSTOR',
		));
	}
}
?>