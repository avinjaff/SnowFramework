<?php
include ('core/init.php');
include_once ('master/public-header.php');
if (isset($_POST['send']))
{
$to      = config::WebMaster;
$subject = $_POST['subject'];
$message = $_POST['name'] + ': ' + $_POST['text'];
$headers = 'From: ' . $_POST['email'] . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
}
?>
<form action="contactus.php" method="post">
  <label for="name"><?= $Translate->Label("نام"); ?></label>
  <input type="text" id="name" name="name" >
  <label for="email"><?= $Translate->Label("ایمیل"); ?></label>
  <input type="email" id="email" name="email">
  <label for="subject"><?= $Translate->Label("موضوع"); ?></label>
  <input type="text" id="subject" name="subject">
  <label for="text"><?= $Translate->Label("متن"); ?></label>
  <textarea id="text" name="text" ></textarea>

  <input name="send" type="submit" value="<?= $Translate->Label("ارسال"); ?>">
</form>
<?php
include_once ('master/public-footer.php');
?>
