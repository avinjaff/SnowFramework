Hi = {
    auth(admin = false){
        if ($.cookie("PrimaryNumber") == null || 
            (admin && $.cookie("Type") != "ADMIN"))
        {
            Hi.message('شما به این بخش دسترسی ندارید', true);
            Hi.load('login');
        }
    },
    loading(visible)
    {
        if (visible)
            $(".LockOn").show();
        else
            $(".LockOn").hide();
    },
    message: function(text, error = false){
        // TODO: If was error change theme to red
        $(".message").html('<span class="' + (error? 'error' : 'confirm') + '">' + text + '</span>');
        $(".message").append("<a style=\"float: right; color:red; margin-right: 40px\" onclick=\"$('.message').hide();\">X</a>");
        $(".message").fadeIn('slow').delay(5000).fadeOut();
    },
    load: function(name, params = null){
        $("html, body").animate({ scrollTop: 0 }, "slow");
        Hi.loading(true);
        $('.content').load('view/' + name + '.htm', function() {
            $.getScript('functionality/' + name + '.js', function() {
                Hi.loading(false);
                if (jQuery.isFunction(window[name]))
                    window[name](params);
            });
        });
    },
    loginprotocol(){
        return "Username=" + $.cookie("PrimaryNumber")
        + "&Password=" + $.cookie("Password");
    },
    home(){
        return "http://localhost/Japayab/api/controller";
    }
}