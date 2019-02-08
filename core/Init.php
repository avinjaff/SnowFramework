<?php
/*
Gordarg SnowKMS
Director: MohammadReza Tayyebi, Gordarg

NOTE: > git config core.fileMode false

TODO: Comments to update version please:

Major release number
Minor release number
Maintenance release number (bugfixes only)
If used at all: build number (or source control revision number)
*/

date_default_timezone_set('Asia/Tehran');
define("DATETIMENOW", date('Y-m-d h:i:s.u', time()));
define("BASEPATH", str_replace('\\','/',dirname(__FILE__)).'/');
if (session_status() == PHP_SESSION_NONE) 
    session_start();

// Configuration variables
require BASEPATH."core/Config.php";
use core\Config;

?>