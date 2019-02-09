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
    header("HTTP/1.0 500 Internal Server Error");
    return;
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

include_once BASEPATH.'model/PostDetail.php';
$PostDetail = new PostDetail();

require_once BASEPATH.'public/plug-in/Parsedown.php';
$Parsedown = new Parsedown();

include_once BASEPATH.'public/plug-in/Links.php';
if ($PATHINFO[1] == 'view')
{
    $META_DESCRIPTION = 'TODO: BASED ON POST';
    $META_AUTHOR = 'TODO: BASED ON POST';
}
else
{
    $META_DESCRIPTION = Config::META_DESCRIPTION;
    $META_AUTHOR = Config::META_AUTHOR;
}
$META = Links::GenerateMeta($META_DESCRIPTION, $META_AUTHOR);
$CSSLINKS = Links::GenerateCssLinks($URL, $CURRENTLANGUAGE, $BASEURL);
$JSLINKS = Links::GenerateJsLinks($URL, $CURRENTLANGUAGE, $BASEURL);

$Filename = BASEPATH.'public/'.$PATHINFO[1].'.php';
if (!file_exists($Filename))
{
    header("HTTP/1.0 404 Not Found");
    return;
}

include_once BASEPATH.'public/master/public-header.php';
include_once $Filename;
include_once BASEPATH.'public/master/public-footer.php';

?>