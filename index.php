<?php
include_once 'public/plug-in/Language.php';
include_once 'core/Initialize.php';

$url = Functionalities::IfExistsIndexInArray($_SERVER, "PATH_INFO");
$pathinfo = explode('/', trim($url, '/') );

$controller = $pathinfo[0];
if (!$url)
    $controller = "home";

include_once BASEPATH.'public/plug-in/Translate.php';
$Translate = new Translate();

include_once BASEPATH.'public/plug-in/Links.php';
$CSSLINKS = Links::GenerateCssLinks($controller);
$JSLINKS = Links::GenerateJsLinks($controller);


// TODO: Set User Id with Login Credintials
// TODO: Set User Type with Login Credintials
$UserId = '';
$UserType = '';
$BASEURL = 'http://localhost/SnowFramework/' . Config::Url_PATH;
$CURRENTLANGUAGE = Functionalities::IfExistsIndexInArray($_COOKIE, 'LANG');
$_SESSION['PHP_AUTH_USER'] = '';
$_SESSION['PHP_AUTH_PWD'] = '';


// Override error_handler()
set_error_handler(function($errno, $errstr, $errfile, $errline ){
    $exp = new MyException(
    $errstr .
    "\nfile" . $errfile .
    "\nline:" . $errline
    , $errno);
    $exp -> print();
});

include_once BASEPATH.'public/master/public-header.php';
include_once (BASEPATH.'public/'.$controller.'.php');
include_once BASEPATH.'public/master/public-footer.php';

?>