<?php
/**
 * Initialize class script
 * Sets global variables
 *
 * @author        MohammadReza Tayyebi <rexa@gordarg.com>
 * @since         1.0
 */

date_default_timezone_set('Asia/Tehran');
define("DATETIMENOW", date('Y-m-d h:i:s.u', time()));
define("BASEPATH", str_replace('\\','/',dirname(__FILE__)).'/');
if (session_status() == PHP_SESSION_NONE) 
    session_start();

/**
 * Cofiguration variables
 * These variables are defined by user
 */
require BASEPATH."core/Config.php";
use core\Config;

?>