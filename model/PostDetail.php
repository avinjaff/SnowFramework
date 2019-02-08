<?php
include_once BASEPATH . 'core/AModel.php';

class PostDetail extends AModel
{

	function __construct()
	{
		self::SetTable('post_details');
		self::SetReadOnly(true);
		self::SetProperties(array(
            'MasterId' => NULL,
            'Title' => NULL,
            'ID' => NULL,
            'Submit' => NULL,
            'UserID' => NULL,
            'Username' => NULL,
            'Body' => NULL,
            'Type' => NULL,
            'Level' => NULL,
            'RefrenceID' => NULL,
            'Index' => NULL,
            'Status' => NULL,
            'Language' => NULL,
            'BinContent' => NULL,
		));
	}
}
?>