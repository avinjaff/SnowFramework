<?php
if (isset($_GET['way']) && ($_GET['way'] == 'bye'))
{
    session_destroy();
    exit(header("Location: login.php"));
}
if (isset($_POST['Login']))
{
    $_SESSION['PHP_AUTH_USER'] = $_POST['Username'];
    $_SESSION['PHP_AUTH_PW'] = $_POST['Password'];
    $authentication = new authentication();
    $UserId = $authentication->login();
    $_SESSION['PHP_AUTH_ID'] = $UserId[0];
    if ($UserId != null)
        exit(header("Location: profile.php?id=" . $UserId[0]));
}

//TODO: Handle Messages Globally
if (isset($_POST['Login']))
    echo '<div class="message">' . $Translate->Label("احراز هویت ناموفق") . '</div>';
?>
<div class="container">
    <form class="form-signin text-center">
        <img class="mb-4" src="/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"><?php echo Translate::Label("لطفا وارد شوید") ?></h1>
        <label for="inputUsername" class="sr-only"><?php echo Translate::Label("نام کاربری") ?></label>
            <input name="Username" type="text" id="inputUsername" class="form-control" placeholder="<?php echo Translate::Label("نام کاربری") ?>" required autofocus>
        <label for="inputPassword" class="sr-only"><?php echo Translate::Label("کلمه‌ی عبور") ?></label>
            <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="<?php echo Translate::Label("کلمه‌ی عبور") ?>" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"><?php echo Translate::Label("مرا به خاطر بسپار") ?>
            </label>
        </div>
        <button name="Login" class="btn btn-lg btn-primary btn-block" type="submit"><?php echo Translate::Label("ورود به سیستم") ?></button>
        <a href="<?php echo $BASEURL ?>" class="btn btn-lg btn-block" ><?php echo Translate::Label("بازگشت") ?></a>
        <p class="mt-5 mb-3 text-muted">Login with Gordafarid! Soon...</p>
    </form>
</div>