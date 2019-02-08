<?php
include_once ('core/init.php');
include ('core/secure.php');
include ('forms/submit.php');
include ('master/public-header.php');
?>
<div id="sjfb-wrap">
<h1><?= $Translate->Label('فرم‌ساز') ?></h1>
<div id="sjfb" novalidate>
    <div id="form-fields">
    </div>
</div>
<div class="add-wrap">
    <h3><?= $Translate->Label('افزودن فیلد') ?></h3>
    <ul id="add-field">
        <li><a id="add-link" data-type="link" href="#"><?= $Translate->Label('لینک') ?></a></li>
        <li><a id="add-desc" data-type="desc" href="#"><?= $Translate->Label('توضیحات') ?></a></li>    
        <li><a id="add-text" data-type="text" href="#"><?= $Translate->Label('متن تک خط') ?></a></li>
        <li><a id="add-textarea" data-type="textarea" href="#"><?= $Translate->Label('متن چند خط') ?></a></li>
        <li><a id="add-select" data-type="select" href="#"><?= $Translate->Label('لیست آبشاری') ?></a></li>
        <li><a id="add-radio" data-type="radio" href="#"><?= $Translate->Label('دکمه‌های رادیویی') ?></a></li>
        <li><a id="add-checkbox" data-type="checkbox" href="#"><?= $Translate->Label('چک باکس') ?></a></li>
        <li><a id="add-agree" data-type="agree" href="#"><?= $Translate->Label('باکس تائید') ?></a></li>
    </ul>
</div>
</div>
<?php
$_GET['type'] = "QUST";
require_once ('forms/render.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
include ('master/public-footer.php');
?>