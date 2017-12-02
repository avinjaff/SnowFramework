<?php

interface IController{

	const resultType = 'JSON';
	function GET();
	function POST();
	function PUT();
	function DELETE();
}

?>