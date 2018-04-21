<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />

<label for="title">عنوان</label>
<input name="title" placeholder="عنوان را وارد نمایید" type="text" value="<?= $Title ?>" />

<label for="level">مرتبه</label>
<input name="level" value="<?= $Level ?>"  type="number" name="quantity" min="1" max="3" />

<label for="categoryid">انتخاب دسته بندی</label>
<input type="text" value="<?= $CategoryID ?>" name="categoryid" list="categories" />
<datalist id="categories" name="categoryid">
<?php
foreach ($Category->ToList(0, 48, "Name", "DESC", "") as $category_row)
    echo '  <option value="' . $category_row['Id'] . '"' . (($category_row['Id'] == $CategoryID)?(" selected") : ("")) . '>' . $category_row['Name'] . '</option>';
?>
</datalist>
<label for="body">متن</label>
<textarea name="body"><?= $Body  ?></textarea>
<label for="body">پرونده</label>
<input type="file" name="content" id="file" />
<?php
/*
TODO: create drafting and publish mechanisms
      based on user role

    echo '<input type="submit" name="draft" value="پیش‌نویس" />';
    echo '<input type="submit" name="edit" value="ویرایش" />';
    echo '<input type="submit" name="publish" value="انتشار عمومی" />';
    echo '<input type="submit" name="burn" value="لغو انتشار" />';
*/
if ($Id == "" ) {
    echo '<input type="submit" name="insert" value="ارسال" />';
} else {
    echo '<input type="submit" name="update" value="به روز رسانی" />';
    echo '<input type="submit" name="delete" value="حذف" />';
    echo '<input type="submit" name="clear" value="حذف پیوست" />';
}
echo '<a href="index.php">انصراف</a>';
?>