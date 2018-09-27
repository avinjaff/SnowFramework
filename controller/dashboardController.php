<?php 
include('../core/AController.php');
include_once '../core/Auth.php';

class dashboardController extends AController{

	function GET($Auth = true){

            // TEST:
            echo '[{"Key":"Users.Id","Value":"1","Leaves":[{"Key":"SimCards.Number","Value":"09388063351","Leaves":[{"Key":"Devices.Imei","Value":"1","Leaves":null}]}]},{"Key":"Users.Id","Value":"2","Leaves":[{"Key":"SimCards.Number","Value":"3","Leaves":[{"Key":"Devices.Imei","Value":"4","Leaves":null}]}]},{"Key":"Users.Id","Value":"5","Leaves":[{"Key":"SimCards.Number","Value":"6","Leaves":[{"Key":"Devices.Imei","Value":"7","Leaves":[{"Key":"Zones.Id","Value":"1","Leaves":null}]},{"Key":"Devices.Imei","Value":"8","Leaves":[{"Key":"Zones.Id","Value":"2","Leaves":null}]}]}]}]';
            return; // Ignore next lines for test

            // TODO: if role was admin, generateentiregraph from ~
		parent::setData(
            (new Authentication)
            ->GenerateEntireGraph("Users.Id"
                  ,parent::getRequest('UserId')
            ));
		parent::returnData();
    }
}
$dashboard = new dashboardController();
?>