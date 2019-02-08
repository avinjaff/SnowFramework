<?php
require_once '../core/Db.php';

class Authentication {

    public function IsValid($Username, $Password) {
		$query  = "SELECT " 
		. "`Id`, `HashPassword`, `Type`"
		. " FROM `" . "Users"
		. "` WHERE `IsActive`=1 AND `Username`='" . $Username . "';";
		$db = new Db();
		$conn = $db->Open();
		$result = mysqli_query($conn, $query);
		if (!$result)
			return null;
		$num = mysqli_num_rows($result);
		if ($num === 1)
		{
			$row = mysqli_fetch_assoc($result);
			if ($this->CheckHash($Password, $row['HashPassword'])) {
				return [$row['Id'],$row['Type']];
			}
		}
		return null;
	}
}
?>