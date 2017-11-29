<?php
// define('DATA_PATH', realpath(dirname(__FILE__).'/DATA'));
define('ROOT', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 43) ? "https" : "http") . "://" . ($_SERVER['SERVER_ADDR']) . ":" . ($_SERVER['SERVER_PORT']));


include_once 'php_api_model/circle.php';
include_once 'php_api_model/log.php';

try {
    $params = $_REQUEST;
    
    $controller = strtolower($params['controller']);
    $action = strtolower($params['action']).'Action';
    
    if( file_exists("php_api_controller/{$controller}.php") ) {
        include_once "php_api_controller/{$controller}.php";
    } else {
        throw new Exception('controller not found.');
    }
     
    $controller = new $controller($params);
     
    if( method_exists($controller, $action) === false ) {
        throw new Exception('action not found.');
    }
     
    $result['data'] = $controller->$action();
    $result['success'] = true;
     
} catch( Exception $e ) {
    $result = array();
    $result['success'] = false;
    $result['errormsg'] = $e->getMessage();
}
echo json_encode($result,JSON_UNESCAPED_UNICODE);
exit();
?>