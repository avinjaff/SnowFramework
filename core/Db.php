<?php
require_once 'Config.php';
use core\Config;

class Db
{
	function Open()
	{
		$conn = new mysqli(about::ConnectionString_SERVER,about::ConnectionString_USERNAME,about::ConnectionString_PASSWORD,about::ConnectionString_DATABASE);

		if ($conn->connect_error) {
		    return 'Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error;
		}
	}
	function Close()
	{
		try {
		    mysqli_close($conn);
		}
		catch (Exception $exp)
		{
			return 'Connect was closed';
		}
	}
}
?>
