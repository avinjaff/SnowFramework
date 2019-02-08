<?php
include_once BASEPATH . 'public/plug-in/Parsedown.php';
include_once BASEPATH . 'core/Text.php';
$Parsedown = new Parsedown();
switch ($_GET['type'])
{
    case "POST":
        include BASEPATH . 'public/views/POST.php';
        break;
    case "COMT":
        include BASEPATH . 'public/views/COMT.php';
        break;
    case "KWRD":
        include BASEPATH . 'public/views/KWRD.php';
        break;
    case "FILE":
        include BASEPATH . 'public/views/FILE.php';
        break;
    case "QUST":
        include BASEPATH . 'public/views/QUST.php';
        break;
    case "ANSR":
        include BASEPATH . 'public/views/ANSR.php';
        break;
}
?>