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

	function ToList($desc = null,$take = null, $skip = 	null)
	{

	}
	function Select($id)
	{
		$fields =  "`" . $this->props[0]->key . "`";

		for ($i=1; $i < $this->propscount; $i++) { 
			$fields  = $fields . ",`" . $this->props[$i] . "`";
		}

		// while($element = current($array)) {
		// 	$fields  = $fields . ",`" . key($current) . "`";
		// 	next($array);
		// }

		$query  = "SELECT " 
		. $fields
		. " FROM `" . $this->table
		. "` WHERE Id = " . $id; // RULE: Every table should contain a field called Id which is a PK, or we can define PK later.
		$db = new Db();
		$conn = $db->Open();
		$result = mysqli_query($conn, $query);
		$num = mysqli_num_rows($result);
		if ($num == 1) {
		 	$values = mysqli_fetch_array($result);
			for ($j=0; $j < $this->propscount ; $j++) { 
				$items[$this->props[$j]] = $values[$this->props[$j]];
			}
		 	return $items;
		}
	}
	function Delete(){
		// delete based on this->props["Id"]
	}
	function Update($previousId)
	{

	}
	function Insert()
	{
		$db = new Db();
		$conn = $db->Open();

		$query  = "INSERT INTO " . $this->table . " (";

		$i=0;
		foreach($this->GetProperties() as $key => $value){
			$query .= '`' . $key . '`'. ((++$i === $this->propscount) ? "" : "," );
		}
		
		$query = $query . ") VALUES (";

		$i=0;
		foreach($this->GetProperties() as $key => $value){
			$query = $query .
			(($value === NULL) ? "NULL" : ("'" .
			mysqli_real_escape_string($conn, $value) 
			. "'"))
			. ((++$i === $this->propscount) ? "" : "," );
		}
		$query = $query . ");";

		mysqli_query($conn, $query);
	}
}
?>