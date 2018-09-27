Hi.auth(true);
$url = Hi.home() + "/userController.php"
+ "?" + Hi.loginprotocol();

/*

TODO: Download User Image
    [snowframework]/controller/userController.php?Username=09388063351&Password=123&Id=38&BinImage=%E2%9C%93

*/

$.get($url , function(data, status){ 
    if (JSON.stringify(data).charAt(0) == "{")
        data = JSON.parse("[" + JSON.stringify(data) + "]");
    data.forEach(obj => {
        var tr="<tr>";
        var td0 = "<td>" +
        "<input type=\"button\" onclick=\"Hi.load('users_activate', " + obj["Id"] + ");\" value=\"" + ((obj["IsActive"] == '1')? "غیر فعال کردن" : "فعال کردن"  ) + "\">" + 
        "<input type=\"button\" onclick=\"Hi.load('users_edit', " + obj["Id"] + ");\" value=\"ویرایش\">" + 
        "</td>";
        var td1="<td>"+obj["Id"]+"</td>";
        var td2="<td>"+obj["Firstname"]+"</td>";
        var td3="<td>"+obj["Lastname"]+"</td>";
        var td4="<td>"+obj["PrimaryNumber"]+"</td></tr>";
       $("#users").append(tr+td0+td1+td2+td3+td4); 
    });
});