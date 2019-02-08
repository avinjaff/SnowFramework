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
$functionalitiesInstance = new functionalities();
$user = new Users($conn);
if (Functionalities::IfExistsIndexInArray($_GET, 'id') == ""
&&
$user->GetRoleById(Functionalities::IfExistsIndexInArray($_SESSION, 'PHP_AUTH_ID')) == 'ADMIN')
{
    exit(header("Location: " . $npath . '/users.php'));
}
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
$Id = Functionalities::IfExistsIndexInArray($_GET, 'id');
$LoggedInUserId = Functionalities::IfExistsIndexInArray($_SESSION, 'PHP_AUTH_ID');
$Role = $user->GetRoleById($LoggedInUserId);
if (isset($_POST["updatepass"])) {
    $user->ChangePassword(
        ($Role != 'ADMIN'),
        Functionalities::IfExistsIndexInArray($_POST, 'id'),
        mysqli_real_escape_string($conn, $_POST['username']),
        mysqli_real_escape_string($conn, $_POST['prev']),
        mysqli_real_escape_string($conn, $_POST['new']),
        mysqli_real_escape_string($conn, $_POST['confirm'])
    );
}
include ('master/public-header.php');
$Username = $user->GetUsernameById($Id);
?>
<form action="profile.php" method="post" id="edit">
    <label for="title"><?= $Translate->Label("نام کاربری"); ?></label>
    <input name="username" readonly type="text" value="<?= $Username ?>" />
    <div class="pass">
        <input name="id" type="hidden" value="<?= $Id ?>" />
        <?php
        if ($Role != 'ADMIN' || $LoggedInUserId == $Id)
        {
            echo '<label for="prev">' . $Translate->Label("گذرواژه‌ی قبلی") . '</label>';
            echo '<input name="prev" type="password" />';
        }
        else
        {
            echo '<input name="prev" type="hidden" />';
        }
        ?>
        <label for="new"><?= $Translate->Label("گذرواژه‌ی جدید"); ?></label>
        <input name="new" type="password" />
        <label for="confirm"><?= $Translate->Label("تکرار"); ?></label>
        <input name="confirm" type="password" />
        <input name="updatepass" type="submit" value="<?= $Translate->Label("به روز رسانی"); ?>" />
    </div>
</form>
<section>
    <img src="drawable/profile.png"  />
    <a href="#"><?= $Translate->Label("نام کاربری") .': ' . $Username ?></a>
    <a id="changepass" href="#" ><?= $Translate->Label("تغییر کلمه‌ی عبور") ?></a>
    <a href="box.php?id=<?= $Id ?>"><?=$Translate->Label("جعبه")?></a>
    <a href="search.php?Q=%40<?= $Username ?>"><?= $Translate->Label("فعالیت") ?></a>
    <a href="database.php?id=<?= $Id ?>" ><?= $Translate->Label("پایگاه داده") ?></a>
</section>
<section>
    <?php
    if (Functionalities::IfExistsIndexInArray($_GET, 'masterid') == "")
        $rows = $post->ToList(-1, -1, "Status", "ASC", "WHERE `Type` = 'ANSR' AND (`UserID` = '" . mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id')) . "')");
    else
        $rows = $post->ToList(-1, -1, "Status", "ASC", "WHERE `Type` = 'ANSR' AND (`UserID` = '" . mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id')) . "') AND `RefrenceID` = '" . mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'masterid')) . "'");
    foreach ($rows as $row) {        
        $refrence = $post->FirstOrDefault($row['RefrenceID']);
        $_GET["level"] = 'profile';
        $_GET["type"] = 'ANSR';
        include ('views/render.php');
    }
    ?>
</section>
<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
include ('master/public-footer.php');
?>