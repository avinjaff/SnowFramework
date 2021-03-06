<?php
include_once BASEPATH . 'core/AModel.php';

class Post extends AModel
{

	function __construct()
	{
		self::SetTable('posts');
		self::SetProperties(array(
			// 'KEY' => DEFAULT_VALUE,
            'MasterId' => sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )),

            'Id' => NULL,
            'Title' => '',
            'Submit' => constant("DATETIMENOW"),
            'Type' => NULL,
            'Level' => 1,
            'Content' => NULL,
            'Body' => '',
            'UserId' => NULL,
            'Status' => 'Publish',
            'Language' => 'en-us',
            'RefrenceId' => NULL,
            'Index' => '0',
            'Deleted' => false,
            'ContentDeleted' => false,
		));
	}
}
?>