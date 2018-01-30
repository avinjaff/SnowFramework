<?php

class Auth {
 
    public function IsValid($Username, $Password) {
		// TODO: Your logic here

		/*
		$query  = "SELECT " 
		. "Id"
		. " FROM `" . "Users"
        . "` WHERE `PrimaryNumber`='" . $Username . "'"
        . " AND `Password`='" . $Password . "';"; // RULE: Every table should contain a field called Id which is a PK, or we can define PK later.
		$db = new Db();
		$conn = $db->Open();
		$result = mysqli_query($conn, $query);
		if (!$result)
			return false;
		$num = mysqli_num_rows($result);
		if ($num === 1)
		 return true;
		else
		*/
		return false;
    }

}

?>