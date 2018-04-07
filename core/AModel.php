<?php
include('IModel.php');
abstract class AModel implements IModel
{
	private $props = ''; // props [0] = key, props [1] = value
	private $table = ''; // table name in db
	private $pk = 'Id'; // pk in table
	private $propscount = ''; // how many props passed to methods?

	function SetValue($Key, $Value){
		$this->props[$Key] = $Value;
	}
	function SetProperties($Properties){
		$this->props = $Properties;
		$this->propscount = sizeof($Properties);
	}
	function GetProperties(){
		return $this->props;
	}
	function SetTable($Table)
	{
		$this->table = $Table;
	}
	function SetPrimaryKey($PrimaryKey)
	{
		$this->pk = $PrimaryKey;
	}

	function Select($Skip = -1 , $Take = -1, $OrderField = 'Id', $OrderArrange = 'ASC', $Clause = '')
	{
		$i=0;
		$fields = '';
		foreach($this->GetProperties() as $key => $value){
			$fields .= '`' . $key . '`'
			. ((++$i === $this->propscount) ? "" : ", " );
		}
		$query  = "SELECT " 
		. $fields
		. " FROM `" . $this->table . "`";
		if ($this->GetProperties()[$this->pk] != null)
		{
			$query .= " WHERE " . $this->pk . " = " . $this->GetProperties()[$this->pk] . ";";
		}
		else
		{
			$query .= " " . $Clause . " ORDER BY `" . $OrderField . "` " . $OrderArrange .
			(($Take == -1)? "" : " LIMIT " . $Take) .
			(($Skip == -1)? "" : " OFFSET " . $Skip)
			. ";";
		}
		$db = new Db();
		$conn = $db->Open();
		$result = mysqli_query($conn, $query);
		if (!$result)
		{
			header("HTTP/1.0 404 Not Found");
			return;
		}
		$num = mysqli_num_rows($result);
		if ($num == 1)
		{
			$i=0;
			$fields = '';
			$values = mysqli_fetch_array($result);
			foreach($this->GetProperties() as $key => $value){
			$this->SetValue($key, $values[$key]);
			}
			// Return Single Record
			return $this->GetProperties();
		}
		else if ($num > 1)
		{
			// Return Multiple Rows
			$rows = array();
			while(($row = mysqli_fetch_array($result))) {
				$rows[] = $row;
			}
			return $rows;
		}
	}
	function Delete(){
		$db = new Db();
		$conn = $db->Open();
		$query  = "DELETE FROM `" . $this->table . "` WHERE " . $this->pk . "=" . $this->GetProperties()[$this->pk];
		mysqli_query($conn, $query);
	}
	function Update($previousId)
	{
		$db = new Db();
		$conn = $db->Open();
		$query  = "UPDATE `" . $this->table . "` SET ";
		$i=0;
		foreach($this->GetProperties() as $key => $value){
			if (isset($value))
				if ($key == $this->pk || substr($key, 0, 2) == "Is" || $key == "Image") // NOTE: PK must be integer and boolean fields must start with "Is"
					$query .= '`' . $key . "` = " . $value . ", ";
				else
					$query .= '`' . $key . "` = '" . $value . "', ";
		}
		$query = substr($query, 0, -2); // Delete last ,
		$query .=" WHERE " . $this->pk . "=" . $previousId;
		mysqli_query($conn, $query);
	}
	function Insert()
	{
		/*
		TODO:
		if ($key == $this->pk || substr($key, 0, 2) == "Is" || Image)
		*/
		$db = new Db();
		$conn = $db->Open();
		$query  = "INSERT INTO `" . $this->table . "` (";
		$i=0;
		foreach($this->GetProperties() as $key => $value){
			$query .= '`' . $key . '`'. ((++$i === $this->propscount) ? "" : ", " );
		}
		$query = $query . ") VALUES (";
		$i=0;
		foreach($this->GetProperties() as $key => $value){
			$query = $query .
			(($value === NULL) ? "NULL" : ("'" .
			mysqli_real_escape_string($conn, $value) 
			. "'"))
			. ((++$i === $this->propscount) ? "" : ", " );
		}
		$query = $query . ");";
		mysqli_query($conn, $query);
		$this->SetValue($this->pk, mysqli_insert_id($conn));
	}
}
?>