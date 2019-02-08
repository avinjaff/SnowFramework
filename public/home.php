<?php
$rows=[];
$rows = $PostDetail->
    Select(0, 48, "Submit", "DESC",
    "WHERE (`Level` = 1 OR `Level` = 2) AND `LANGUAGE`='" . $CURRENTLANGUAGE  . "'");

foreach ($rows as $row) {
    if ($row['Level'] != '1')
        continue;
    $_GET['masterid'] = $row['MasterID'];
    $_GET["level"] = '1';
    $_GET["type"] = 'POST';
    include ('views/render.php');
}

foreach ($rows as $row) {
    if ($row['Level'] != '2')
        continue;
    $_GET['masterid'] = $row['MasterID'];
    $_GET["level"] = '2';
    $_GET["type"] = 'POST';
    include ('views/render.php');
        break;
}
?>