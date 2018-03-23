<?php
include('IModel.php');
abstract class AModel implements IModel
{
	private $props = ''; // props [0] = key, props [1] = value
	private $table = ''; // table name in db
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

    function ToList($Skip = 0 , $Take = 10, $OrderField = 'Id', $OrderArrange = 'ASC', $Clause = '')
    {
        $query = "SELECT * FROM `" . $this->table . "` " . $Clause . " ORDER BY `" . $OrderField . "` " . $OrderArrange . " LIMIT ". $Take . " OFFSET " . $Skip . ";";
        $result = mysqli_query($this->conn, $query);
        $rows = array();
        if ($result)
            while(($row = mysqli_fetch_array($result))) {
                $rows[] = $row;
            }
        return $rows;       
    }
	function Select()
	{
		$i=0;
		$fields = '';
		foreach($this->GetProperties() as $key => $value){
			$fields .= '`' . $key . '`'
			. ((++$i === $this->propscount) ? "" : ", " );
		}
		$query  = "SELECT " 
		. $fields
		. " FROM `" . $this->table
		. "` WHERE Id = " . $this->GetProperties()["Id"]; // RULE: Every table should contain a field called Id which is a PK, or we can define PK later.
		$db = new Db();
		$conn = $db->Open();
		$result = mysqli_query($conn, $query);
		if (!$result)
			return;
		$num = mysqli_num_rows($result);
		if ($num == 1) {
			 $values = mysqli_fetch_array($result);
			 $i=0;
			 $fields = '';
			 foreach($this->GetProperties() as $key => $value){
				$this->SetValue($key, $values[$key]);
			 }
		}
	}
	function Delete(){
		$db = new Db();
		$conn = $db->Open();
		$query  = "DELETE FROM " . $this->table . " WHERE `Id`=" . $this->GetProperties()["Id"];
		mysqli_query($conn, $query);
	}
	function Update($previousId)
	{
		$db = new Db();
		$conn = $db->Open();
		$query  = "UPDATE " . $this->table . " SET ";
		$i=0;
		foreach($this->GetProperties() as $key => $value){
			$query .= '`' . $key . "` = '" . $value . "'"
			. ((++$i === $this->propscount) ? "" : ", " );
		}
		$query .=" WHERE `Id`=" . $previousId;
		mysqli_query($conn, $query);
	}
	function Insert()
	{
		$db = new Db();
		$conn = $db->Open();
		$query  = "INSERT INTO " . $this->table . " (";
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
		$this->SetValue('Id', mysqli_insert_id($conn));
	}
}
?>
