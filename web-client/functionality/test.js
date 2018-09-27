Hi.auth();

$url = Hi.home() + "/BridgeController.php?Id=test.sql&Params=[param1:'test1',param2:'test2']" + "&" + Hi.loginprotocol();

url = Hi.home() + '/BridgeController.php' + "?" + "Id=device_details.sql" + "&" + Hi.loginprotocol();
$('input[name=Usenrame]').flexdatalist({
    searchContain: false,
    textProperty: 'Username: {Username} - Fullname {Fullname}, {Model}',
    valueProperty: 'Username',
    minLength: 1,
    focusFirstResult: true,
    selectionRequired: true,
    visibleProperties: ["Imei", "Model", "Title"],
    searchIn: ["Imei", "Title", "Type", "Company", "Model", "Notes"],
    url: url,
    relatives: '#relative'
});

// TODO: js tree