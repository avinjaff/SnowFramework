<?php
include 'core/Initialize.php';

$url = Functionalities::IfExistsIndexInArray($_SERVER, "PATH_INFO");
$pathinfo = explode('/', trim($url, '/') );

$controller = $pathinfo[0];
if (!$url)
    $controller = "Home";

print $controller;
?>