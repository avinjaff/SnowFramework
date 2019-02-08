<?php
// TODO:
// $UserId = $authentication->login();
// if ($UserId == null)
//         return;
// if ($row['Language'] == $_COOKIE['LANG'])
// {
//         echo '<a href="post.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("ویرایش") . '</a>';
// }
// else{
        echo '<a href="post.php?lang=' . $CURRENTLANGUAGE . '&id=' . $row['MasterID'] . '">' . $Translate->Label("ویرایش فارسی") . '</a>';
        echo '<a href="post.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("ویرایش نسخه‌ی اصلی") . '</a>';
// }