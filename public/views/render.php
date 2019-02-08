<?php
include_once BASEPATH . 'public/plug-in/Parsedown.php';
include_once BASEPATH . 'core/Text.php';
$Parsedown = new Parsedown();
include BASEPATH . 'public/views/'.$row['Type'].'.php';
?>