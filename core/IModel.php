<?php

interface IModel {

	// public function __construct(){

	// }
	function ToList();
	function Get($id);
	function Delete($id);
	function Update($previousId, $model);
	function Insert($model);
	
}
?>