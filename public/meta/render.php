<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
if (file_exists($parent . '/meta/' . $_GET['yeild'] . '.php')) include($parent . '/meta/' . $_GET['yeild'] . '.php');
?>