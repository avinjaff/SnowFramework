Hi.auth(true);

function users(){
    $('#search').flexdatalist({
        searchContain: false,
        textProperty: '{Username}',
        valueProperty: 'Username',
        minLength: 1,
        focusFirstResult: true,
        selectionRequired: true,
        visibleProperties: ["Username", "Fullname"],
        searchIn: ["Username", "Fullname", "Id"],
        url: Hi.home() + '/BridgeController.php' + "?" + "Id=dw_users.sql" + "&&Params=[param1:Username,param2:Firstname,param3:Lastname]&" + Hi.loginprotocol(),
        relatives: '#relative'
    });
}


$.get(Hi.home() + '/BridgeController.php' + "?" + "Id=dw_users.sql" + "&&Params=[param1:Username,param2:Firstname,param3:Lastname]&" + Hi.loginprotocol() , function(data, status){ 
    console.log(data);
});


$.get(Hi.home() + "/userController.php?HashPassword=✓&BinImage=✓"
+ "&" + Hi.loginprotocol() , function(data, status){ 
    if (JSON.stringify(data).charAt(0) == "{")
        data = JSON.parse("[" + JSON.stringify(data) + "]");

    data.forEach(obj => {
        var tr="<tr>";
        var td0 = "<td>" +
        "<input type=\"button\" onclick=\"Hi.load('users_activate', " + obj["Id"] + ");\" value=\"" + ((obj["IsActive"] == '1')? "غیر فعال کردن" : "فعال کردن"  ) + "\">" + 
        "<input type=\"button\" onclick=\"Hi.load('users_edit', " + obj["Id"] + ");\" value=\"ویرایش\">" + 
        "</td>";
        var td ="<td>"+obj["Id"]+"</td>";
        td += "<td>"+obj["Firstname"]+"</td>";
        td += "<td>"+obj["Lastname"]+"</td>";
        td += "<td>"+obj["Username"]+"</td>";
        td += "<td>"+"TODO: IMG"+"</td></tr>";
        $("#users").append(tr+td0+td);
        console.log(obj["HashPassword"]); // For Test Only
    });
});