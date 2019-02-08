<?php
require_once ('securitycheck.php');

$Type = $_GET['type'];

$MasterID = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
mt_rand( 0, 0xffff ),
mt_rand( 0, 0x0fff ) | 0x4000,
mt_rand( 0, 0x3fff ) | 0x8000,
mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));

$Title = '';
$Language = 'fa-IR';
$Index = '0';
$Submit = $datetime;        // Comes from Init.php
$UserID = Functionalities::IfExistsIndexInArray($_SESSION, 'PHP_AUTH_ID');       // Comes from secure.php
                            // TODO: WHY the function recived array? [0]
$Level = 1;
$Body = '';
$Status = 'Publish';
$Content = null;
$RefrenceID = null;

switch ($Type)
{   
    case "POST":
        $Id = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        $Language = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'lang'));
        if ($Id != null)
            $MasterID = $Id;
        $row = $Post->FirstOrDefault($Id, $Language);
        $Id = $Post->GetIdByMasterId($MasterID, $Language);
        $Title = Functionalities::IfExistsIndexInArray($row,'Title');
        $Level = Functionalities::IfExistsIndexInArray($row,'Level');
        $Body = Functionalities::IfExistsIndexInArray($row,'Body');
        break;
    case "COMT":
        $Language = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'lang'));
        $RefrenceID = Functionalities::IfExistsIndexInArray($row,'RefrenceID');
        if ($RefrenceID == "")
            $RefrenceID = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        break;
    case "KWRD":
        $RefrenceID = Functionalities::IfExistsIndexInArray($row,'RefrenceID');
        if ($RefrenceID == "")
            $RefrenceID = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        break;
    case "FILE":
        $Id = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        $Language = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'lang'));
        if ($Id != null)
            $MasterID = $Id;
        $row = $Post->FirstOrDefault($Id, $Language);
        $Id = $Post->GetIdByMasterId($MasterID, $Language);
        $Title = Functionalities::IfExistsIndexInArray($row,'Title');
        break;
    case "QUST":
        $Id = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        $Language = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'lang'));
        if ($Id != null)
            $MasterID = $Id;
        $row = $Post->FirstOrDefault($Id, $Language);
        $Id = $Post->GetIdByMasterId($MasterID, $Language);
        $Title = Functionalities::IfExistsIndexInArray($row,'Title');
        $Body = Functionalities::IfExistsIndexInArray($row,'Body');
        break;
    case "ANSR":
        $RefrenceID = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        $Status = 'Sent';
        break;
    case "ANSR_status":
        $Language = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'lang'));
        $MasterID = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'masterid'));
        $Id = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'id'));
        $RefrenceID = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'refrenceid'));
        $UserID = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'userid'));
        $Submit = mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'submit'));
        $Body = htmlentities(mysqli_real_escape_string($conn, Functionalities::IfExistsIndexInArray($_GET, 'body')));
        break;
    case "COMT_delete":
        $Id = $Post->GetIdByMasterId(
            Functionalities::IfExistsIndexInArray($_GET, 'masterid'),
            Functionalities::IfExistsIndexInArray($_GET, 'langauge'));
        $RefrenceID = Functionalities::IfExistsIndexInArray($_GET, 'refrenceid');
        break;
    case "KWRD_delete":
        $Id = $Post->GetIdByMasterId(
            Functionalities::IfExistsIndexInArray($_GET, 'masterid'),
            Functionalities::IfExistsIndexInArray($_GET, 'langauge'));
        $RefrenceID = Functionalities::IfExistsIndexInArray($_GET, 'refrenceid');
        break;
}
?>