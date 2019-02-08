<?php
/**
 * Initialize class script
 * Sets global variables
 *
 * @author        MohammadReza Tayyebi <rexa@gordarg.com>
 * @since         1.0
 */


/**
 * TimeZone
 */

define("DATETIMENOW", date('Y-m-d h:i:s.u', time()));
define("BASEPATH", str_replace('\\','/',realpath(dirname(__FILE__) . '/..') .'/'));
if (session_status() == PHP_SESSION_NONE) 
    session_start();

function __autoload($class_name) {
    /**
     * Cofiguration variables
     * These variables are defined by user
     */
    require_once BASEPATH."Config.php";
    /**
     * Set time zone
     */
    date_default_timezone_set(Config::TimeZone);
    /**
     * Optimized functions
     */
    require_once BASEPATH."core/Functionalities.php";
}
?>