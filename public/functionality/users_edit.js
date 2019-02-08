Hi.auth();
function users_edit(id){
    url = Hi.home() + "/userController.php"
    + "?Id=" + id
    + "&" + Hi.loginprotocol();

    $.get(url, function(data){ 
        $('input[name="previousId"]').val(data.Id);
        $('input[name="Username"]').val(data.Username);
        $('input[name="Firstname"]').val(data.Firstname);
        $('input[name="Lastname"]').val(data.Lastname);
        $('input[name="NationalCode"]').val(data.NationalCode);
        $('input[name="Confirm"]').val(data.Password);
        /*
        Type (USER, ADMIN)
        Image
        IsActive
        */
    });
}



  
$('#edit').on('submit', function (event) {
    event.preventDefault();
    $url = Hi.home() + "/userController.php" + "?" + Hi.loginprotocol();
    $.put( $url ,$( "#edit" ).serialize(),
    function( data ) {
        Hi.message('کاربر ویرایش شد', false);
        Hi.load('users');
    }, "json");
});
