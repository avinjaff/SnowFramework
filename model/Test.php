<?php
/*
+------------+---------------+------+-----+---------+-------+
| Field      | Type          | Null | Key | Default | Extra |
+------------+---------------+------+-----+---------+-------+
| emp_no     | int(11)       | NO   | PRI | NULL    |       |
| birth_date | date          | NO   |     | NULL    |       |
| first_name | varchar(14)   | NO   |     | NULL    |       |
| last_name  | varchar(16)   | NO   |     | NULL    |       |
| gender     | enum('M','F') | NO   |     | NULL    |       |
| hire_date  | date          | NO   |     | NULL    |       |
+------------+---------------+------+-----+---------+-------+
*/

include('../core/AModel.php');
require_once '../core/Db.php';

class Test extends AModel
{
	function __construct()
	{
		self::SetTable('Test');
		self::SetProperties(array(
            'emp_no'=>NULL,
            'birth_date'=>NULL,
            'first_name'=>NULL,
            'last_name'=>NULL,
            'gender'=>NULL,
            'hire_date'=>NULL
		));
	}
}
?>