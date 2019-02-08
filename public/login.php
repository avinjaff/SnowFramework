<?php
include ('core/init.php');
require_once ('core/authentication.php');
use core\authentication;
if (isset($_GET['way']) && ($_GET['way'] == 'bye'))
{
    session_destroy();
    exit(header("Location: login.php"));
}
if (isset($_POST['login']))
{
    $_SESSION['PHP_AUTH_USER'] = $_POST['user'];
    $_SESSION['PHP_AUTH_PW'] = $_POST['pass'];
    $authentication = new authentication();
    $UserId = $authentication->login();
    $_SESSION['PHP_AUTH_ID'] = $UserId[0];
    if ($UserId != null)
        exit(header("Location: profile.php?id=" . $UserId[0]));
}
include_once ('master/public-header.php');   
if (isset($_POST['login']))
    echo '<div class="message">' . $Translate->Label("احراز هویت ناموفق") . '</div>';
?>
<form action="login.php" method="post">
    <img src="variable/logo.svg" alt="logo" class="avatar">

    <label for="user"><?= $Translate->Label("نام کاربری"); ?></label>
    <input type="text" name="user" required>

    <label for="pass"><?= $Translate->Label("کلمه‌ی عبور"); ?></label>
    <input type="password" name="pass" required>

    <button type="submit" name="login" ><?= $Translate->Label("ورود"); ?></button>
    <a href="index.php"><?= $Translate->Label("انصراف"); ?></a>
</form>
<?php include_once ('master/public-footer.php'); ?> 