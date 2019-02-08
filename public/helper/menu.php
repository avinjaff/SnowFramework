<?php
require_once (BASEPATH . '/core/Authentication.php');

echo '<nav id="sidebar">';
echo '<div onclick="w3_close()" class="sidebar-close">☰</div>';
echo '<a href="./" onclick="w3_close()" class="w3-bar-item w3-button">' . $Translate->Label("خانه") . '</a>';
echo '<a href="search.php" onclick="w3_close()" class="w3-bar-item w3-button">' . $Translate->Label("جستجو") . '</a>';
echo '<a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button">' . $Translate->Label("عضویت") . '</a>';
echo '<a href="contactus.php" onclick="w3_close()" class="w3-bar-item w3-button">' . $Translate->Label("تماس با ما") . '</a>';

// TODO: Login

// $UserId = $authentication->login();
// if ($UserId == null)
// {
//     echo '<a href="login.php" onclick="w3_close()">' . $Translate->Label("ورود") . '</a>';
// }
// else
// {
//     echo '<a href="profile.php?id=' . Functionalities::IfExistsIndexInArray($_SESSION, 'PHP_AUTH_ID') . '" onclick="w3_close()">' . $Translate->Label("حساب کاربری") . '</a>';
//     echo '<a href="./login.php?way=bye" onclick="w3_close()">' . $Translate->Label("خروج") . '</a>';
//     echo '<a href="post.php" onclick="w3_close()">' . $Translate->Label("پست") . '</a>';
//     echo '<a href="question.php" onclick="w3_close()">' . $Translate->Label("فرم‌ساز") . '</a>';
//     echo '<a href="tinyfilemanager.php?p=' . core\config::Url_PATH. '" onclick="w3_close()">' . $Translate->Label("پرونده‌ها") . '</a>';
//     echo '<a href="box.php" onclick="w3_close()">' . $Translate->Label("جعبه") . '</a>';
//     echo '<a href="users.php" onclick="w3_close()">' . $Translate->Label("کاربران") . '</a>';
// }
echo '</nav>';
?>