<!DOCTYPE html>
<!--
  - SnowKMS
  - Made in IRAN
  -->
<html>
<head>
<title><?php echo $Translate->Label(Config::TITLE) ?></title>
<link rel="icon" href="favicon.png" type="image/png" sizes="96x96">
<? echo $CSSLINKS ?>
</head>
<body>
  <?php include ('public/helper/menu.php'); ?>
  
	<header role="banner">
    <div class="sidebar-open" onclick="w3_open()">☰</div>
    <?= $Translate->Label(config::NAME) ?>
    <?php
    include ('public/helper/choose_language.php');
    ?>
	</header>

<div class="container">
<?php
  switch (Functionalities::IfExistsIndexInArray($_GET, 'message'))
  {
    case '✓':
      echo '<span class="message">';
      echo  $Translate->Label('فرایند با موفقیت اعمال شد');
      echo '</span>';
      break;
    case '⎗':
      echo '<span class="message">';
      echo  $Translate->Label('لطفا پیش نیاز معتبر را ارسال فرمایید');
      echo '</span>';
      break;
    case '⊥':
      echo '<span class="message">';
      echo  $Translate->Label('کلمه‌ی عبور قبلی نادرست است');
      echo '</span>';
      break;
  }