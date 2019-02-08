<?php
$Id = $PATHINFO[3];
$row = $PostDetail->Select(-1, 1, 'MasterID', 'ASC', "WHERE `MasterID`='" . $Id . "'")[0];
if ($row == null)
{
    exit(header("HTTP/1.0 404 Not Found"));
}
else
{
    // TODO:
    // require_once  'views/securitycheck.php';
}
$row['Level'] = 'view';
include ('views/render.php');
?>