<?php
include_once 'public/plug-in/Language.php';
include_once 'core/Initialize.php';

// Override error_handler()
set_error_handler(function($errno, $errstr, $errfile, $errline ){
    $exp = new MyException(
    $errstr .
    "\nfile" . $errfile .
    "\nline:" . $errline
    , $errno);
    $exp -> print();
});


// Get request info
$BASEURL = Config::BASEURL;
$URL = strtolower(Functionalities::IfExistsIndexInArray($_SERVER, "PATH_INFO"));
$URL = '/'.trim($URL, '/');
if ($URL == '/')
    $URL = "/home";
$PATHINFO = explode('/', $URL);

include_once BASEPATH.'public/plug-in/Translate.php';
$Translate = new Translate();

// TODO: Set User Id with Login Credintials
// TODO: Set User Type with Login Credintials
$UserId = '';
$UserType = '';
$CURRENTLANGUAGE = Functionalities::IfExistsIndexInArray($_COOKIE, 'LANG');
$_SESSION['PHP_AUTH_USER'] = '';
$_SESSION['PHP_AUTH_PWD'] = '';

include_once BASEPATH.'public/plug-in/Links.php';
$CSSLINKS = Links::GenerateCssLinks($URL, $CURRENTLANGUAGE, $BASEURL);
$JSLINKS = Links::GenerateJsLinks($URL, $CURRENTLANGUAGE, $BASEURL);

include_once BASEPATH.'model/PostDetail.php';
$PostDetail = new PostDetail();

include_once BASEPATH.'public/master/public-header.php';
include_once (BASEPATH.'public/'.$PATHINFO[1].'.php');
include_once BASEPATH.'public/master/public-footer.php';

?>