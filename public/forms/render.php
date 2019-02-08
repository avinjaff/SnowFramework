<?php
return; // TODO
include ('values.php');
?>
<form id="gordform" method="post" action="<?= /*TODO*/ 'post.php?type=' . $Type ?>" enctype="multipart/form-data">
<input type="hidden" name="masterid" value="<?= $MasterID ?>" />
<?php
include BASEPATH . 'public/forms/'.$Type.'.php';
?>
<input type="hidden" name="type" value="<?= $Type ?>" />
</form>