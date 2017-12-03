<?php

interface IModel {

	function ToList($desc = null,$take = null, $skip = null);
	function Select($id);
	function Delete($id);
	function Update($previousId, $model);
	function Insert($model);
}
?>