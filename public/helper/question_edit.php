<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login();
if ($UserId == null)
        return;
if ($row['Language'] == $_COOKIE['LANG'])
{
        echo '<a href="question.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("ویرایش") . '</a>';
}
else{
        echo '<a href="question.php?lang=' . $_COOKIE['LANG'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("ویرایش فارسی") . '</a>';
        echo '<a href="question.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("ویرایش نسخه‌ی اصلی") . '</a>';
}