<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="body" value="<?= $Body ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="language" value="<?= $Language ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<a href="answer.php?lang=<?= $Language ?>&id=<?= $MasterID ?>"><?= $Translate->Label("مشاهده") ?></a>
<input type="submit" name="Block" value="<?= $Translate->Label("رد") ?>" />
<input type="submit" name="approve" value="<?= $Translate->Label("تائید") ?>" />
<input type="submit" name="delete" value="<?= $Translate->Label("حذف") ?>" />