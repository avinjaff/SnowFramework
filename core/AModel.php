<?php
include('IModel.php');
abstract class AModel implements IModel
{
	private $props = '';
	private $table = '';
	private $propscount = '';

	function SetProperties($Properties){
		$this->props = $Properties;
		$this->propscount = sizeof($Properties);
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
		$fields =  "`" . $this->props[0] . "`";
		for ($i=1; $i < $this->propscount; $i++) { 
			$fields  = $fields . ",`" . $this->props[$i] . "`";
		}
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
	function Delete($id){

	}
	function Update($previousId, $model)
	{

	}
	function Insert($model)
	{
		
	}
 

}
?>