<?php
foreach (Config::Languages() as $lang)
{
    echo '<a href="language.php?L=' . $lang->code . '-' . $lang->region . '"> &nbsp;' . $lang . ' &nbsp; </a>';
}
?>