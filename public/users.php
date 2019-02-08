<?php
include_once ('core/init.php');
include ('core/secure.php');
include ('master/public-header.php');
echo '<table><tbody><tr><th></th><th></th><th>نام کاربری</th></tr>';
require_once 'semi-orm/Users.php';
use orm\Users;
$user = new Users($conn);
$rows=[];
$rows = $user->ToList(-1, -1, "ID", "DESC", "");
foreach ($rows as $row) {
    echo '<tr>';
    echo '<td>';
    echo '<a href="search.php?Q=%40' . $row['Username'] . '">' . $Translate->Label("فعالیت") . '</a>';
    echo '</td>';
    echo '<td>';
    echo '<a href="profile.php?id=' . $row['Id'] . '">' . $Translate->Label("پروفایل") . '</a>';
    echo '</td>';
    echo '<td>';
    echo $row['Username'];
    echo '</td>';
    echo '</tr>';
}
echo '</tbody></table>';
include ('master/public-footer.php');
?>