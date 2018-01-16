<?php

interface IModel {
	function SetProperties($Properties);
	function GetProperties();
	function SetTable($Table);
	function SetValue($Key, $Value);

	function ToList($desc = null,$take = null, $skip = null);
	function Select();
	function Delete();
	function Update($previousId);
	function Insert();
}
?>