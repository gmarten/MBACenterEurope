$(document).ready(function(){

    $("#facebooklogin").hide();

    var scopes = 'email,public_profile';

    var btn_login = '<div id="login" class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="true" data-auto-logout-link="false"></div>';
    var div_session = "<div id='facebook-session'>"+
					"<strong></strong>"+
					"<img>"+
					"<a href='#' id='logout'>Close Facebook Session</a>"+
					"</div>";

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '580375555396764',
            status     : true,
            cookie     : true,
            xfbml      : true,
            version    : 'v2.3'
        });
    };

});

function statusChangeCallback (response, callback) {
    console.log(response.status);
    if (response.status === 'connected') {
        getFacebookData();
        callback(true);
    }
    else {
        callback(false);
    }
}
function checkLoginState (callback) {
    FB.getLoginStatus(function(response) {
        callback(response);
    });
}
function getFacebookData() {

    FB.api('/me', function(response) {
        //$('#facebook-session img').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=large');
        $.ajax({
            url:'/fichierAjax/traitement_inscription_user_ajax.php',
            type:'POST',
            dataType : 'json',
            data : '&nom='+response.name+'&email='+response.email+'&action=facebook_connect'+'&employe='+$("#employe").is(':checked'),
            success:function(retour_php)
            {
                if(retour_php)
                {
                    document.location.href="/profil.php";
                }
                else
                {
                    alert(retour_php);
                }
            },
            error:function(retour_php)
            {
                console.log("il y a un soucis \340 la connexion à la base de donn\351es");
            }
        });
    });
}

function fbCreateAccount (){
    FB.getLoginStatus(function(response) {
        if (!statusChangeCallback(response, function() {}))
            $("#facebooklogin").show();
    });
}

$("#fbLoginButton").on('click', function(e) {
    fbCreateAccount();
});

function CallAfterLogin(){
    //location.reload();
    fbCreateAccount ();
}