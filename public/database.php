<?php
/*
TODO: Security Check for permission
*/
include_once ('core/init.php');
include ('core/secure.php');
require_once 'core/functionalities.php';
use core\functionalities;
require_once 'semi-orm/Users.php';
use orm\Users;
$user = new Users($conn);
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
include ('master/public-header.php');
$Id = Functionalities::IfExistsIndexInArray($_GET, 'id');
$Username = $user->GetUsernameById($Id);
echo '<table><tbody><tr><th></th><th>' .
$Translate->Label("شناسه اصلی") .
'</th><th>' .
$Translate->Label("شناسه عددی") .
'</th><th>' .
$Translate->Label("ثبت") .
'</th><th>' .
$Translate->Label("نام کاربری") .
'</th><th>' .
$Translate->Label("عنوان") .
'</th><th>' .
$Translate->Label("زبان") .
'</th><th>' .
$Translate->Label("وضعیت") .
'</th></tr>';
if (Functionalities::IfExistsIndexInArray($_GET, 'id') == "" && $user->GetRoleById(Functionalities::IfExistsIndexInArray($_SESSION, 'PHP_AUTH_ID')) == 'ADMIN')
{
        $rows = $post->ToList(-1, -1, "ID", "DESC", "WHERE (`Type` = 'QUST' OR `Type` = 'POST')");
}
else if (Functionalities::IfExistsIndexInArray($_GET, 'id') != "")
{
        $rows = $post->ToList(-1, -1, "ID", "DESC", "WHERE (`Type` = 'QUST' OR `Type` = 'POST') AND `UserID` = " . Functionalities::IfExistsIndexInArray($_SESSION, 'PHP_AUTH_ID'));
}

foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>';
        switch ($row['Type'])
        {
                case 'POST':
                        echo '<a href="post.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("مشاهده") . '</a>';
                        break;
                case 'QUST':
                        echo '<a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $Translate->Label("مشاهده") . '</a>'; 
                        break;
        }
        echo '</td>';
        echo '<td>' . $row['MasterID'] . '</td>';
        echo '<td>' . $row['ID'] . '</td>';
        echo '<td>' . $row['Submit'] . '</td>';
        echo '<td>' . $row['Username'] . '</td>';
        echo '<td>' . $row['Title'] . '</td>';
        echo '<td>' . $row['Language'] . '</td>';
        echo '<td>' . $row['Status'] . '</td>';
        echo '</tr>';
}
echo '</tbody></table>';
include ('master/public-footer.php');
?>