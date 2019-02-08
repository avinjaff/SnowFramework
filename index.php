<?php
include 'core/Initialize.php';

$pathinfo = explode('/', trim(
    Functionalities::IfExistsIndexInArray($_SERVER, "PATH_INFO")
, '/') );

if (sizeof($pathinfo) < 1)
    $controller = "Home";
else
{
    $controller = $pathinfo[0];
}
print $controller;
?>