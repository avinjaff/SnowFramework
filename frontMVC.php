<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
$hostname = $_SERVER['SERVER_ADDR'];
$port = $_SERVER['SERVER_PORT'];
define('ROOT', $protocol . "://" . $hostname . ":" . $port);

try{
    $params = $_REQUEST;
    
    $controller = strtolower($params['controller']);
    $action = strtolower($params['action']);    
    $file = "php_mvc_views/" . $controller . "/" . $action . ".php";
    
    if(file_exists(realpath(dirname(__FILE__) . "/" . $file))) 
    {
        $title= "SnowCity";
        $content = $file;
        
        include 'php_mvc_views/_shared/desktop_public.php';
    }
     else {
         print($file);
        throw new Exception('why?');
    }
     
}
catch( Exception $e ) {
    print ($e->getMessage());
}
exit();
?>