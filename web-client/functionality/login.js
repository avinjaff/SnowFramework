if ($.cookie("PrimaryNumber") == null )
    $( "#logout" ).hide();
else
    $( "#login" ).hide();



function login(){
    // $('input[name=PrimaryNumber]').mask('980000000000', {placeholder: "98__________"});
}
    

$('#logout').on('submit', function (event) {
    event.preventDefault();

    $.removeCookie("Id");
    $.removeCookie("PrimaryNumber");
    $.removeCookie("Password");
    $.removeCookie("IsActive");
    $.removeCookie("Type");
    
    $(".side-bar").hide();
    Hi.load('login');
});

$('#login').on('submit', function (event) {
    event.preventDefault();

    $url = Hi.home() + "/userController.php"
    + "?LOGINHELLO=true"
    + "&Username=" + $("input[name=PrimaryNumber]").val()
    + "&Password=" + $("input[name=Password]").val();

    jQuery.get($url, function(data){
        $.cookie("UserId", data.Id);
        $.cookie("PrimaryNumber", data.PrimaryNumber, { expires : 10 });
        $.cookie("Password", $("input[name=Password]").val(), { expires : 10 });
        $.cookie("IsActive", data.Type, { expires : 10 });
        $.cookie("Type", data.Type, { expires : 10 });
        Hi.message('خوش آمدید!');
        $(".side-bar").show();
        Hi.load('dashboard');
    }).fail(function() {
        Hi.message('خطا در احراز هویت', true);
    });
});

document.getElementById("nav_register").addEventListener("click", function(event){
    event.preventDefault();
    Hi.load('register');
});