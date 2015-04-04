$(document).ready(function(){

	var connexion_error =false;
	var name_error_required=false;
	var email_error_use=false;
	var email_error_required=false;
	var password_error=false;
	var password_size=false;
	var password_repeat=false;
	var repeat_password_required=false;
	var email_error_format=false;
	var repeat_password_match=false;
	var phone_error=false;
	var phone_size=false;
	$("#connexion_error").hide();
	$("#email_error_format").hide();
	$("#name_error_required").hide();
	$("#email_error_use").hide();
	$("#email_error_required").hide();
	$("#phone_error").hide();
	$("#phone_format").hide();
	//$("#password_error_use").hide();
	$("#password_error").hide();
	$("#password_size").hide();
	$("#password_repeat").hide();
	$("#repeat_password_required").hide();
	$("#repeat_password_match").hide();
	
	$("#form_signin").validate({
		debug: true
	});
	$("#new-account-name").focusout(function(){
		if($("#new-account-name").val()=="")
		{
			$("#name_error_required").show();
			name_error_required=false;
		}
		else
		{
			$("#name_error_required").hide();
			name_error_required=true;
		}
	});
	$("#new-account-password").focusout(function(){
		if($("#new-account-password").val()=="")
		{
			$("#password_error").show();
			password_error=false;
		}
		else
		{
			$("#password_error").hide();
			password_error=true;
		}
	});
	$("#new_account_phone").focusout(function(){
		if($("#new-account-cellular").val()=="")
		{
			$("#phone_error").show();
			phone_error=false;
		}
		else
		{
			$("#phone_error").hide();
			phone_error=true;
		}
	});
	/*$("#new_account_phone").focusout(function(){
		if(!isNaN($("#new-account-cellular").val()))
		{
			$("#phone_error").show();
			phone_error=false;
		}
		else
		{
			$("#phone_error").hide();
			phone_error=true;
		}
	});*/
	$("#new-account-repeat-password").focusout(function(){
		if($("#new-account-repeat-password").val()=="")
		{
			$("#repeat_password_required").show();
			repeat_password_required=false;
		}
		else
		{
			$("#repeat_password_required").hide();
			repeat_password_required=true;
		}
	});
	$("#new-account-repeat-password").focusout(function()
	{
		if($("#new-account-repeat-password").val()==$("#new-account-password").val())
		{
			$("#repeat_password_match").hide();
			repeat_password_match=true;
		}
		else
		{
			$("#repeat_password_match").show();
			repeat_password_match=false;
		}
	});
	$("#new-account-email").blur(function(){
		if(!bonmail($("#new-account-email").val()))
		{
			
			$("#email_error_format").show();
			$("#email_error_use").hide();
			email_error_format=false;
		}
		else
		{
			email_error_format=true;
			$("#email_error_format").hide();
			var mail_verif='&email='+$("#new-account-email").val()+"&action=mail_verif";
			$.ajax({
				url:'fichierAjax/traitement_inscription_user_ajax.php',
				//url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_inscription_user_ajax.php',
				type:'POST',
				dataType : 'json',
				data : mail_verif,
				success:function(retour_php)
				{
					if(retour_php)
					{	//$("#new-account-email").css("backgroundColor", "red");
						$("#email_error_use").show();
						email_error_use=false;
					}
					else
					{
						$("#email_error_use").hide();
						email_error_use=true;
					}
				},
				error:function(retour_php)
				{
					console.log("il y a un soucis à la connexion à la base de données");
				}
			});
		}
	});
$("#btn_connection").click(function(){
	
	var form_connexion = $("#form_connection").serialize()+"&action=connection";
	$.ajax({
		//url :'http://mbacentereurope.eu/mbacenter/fichierAjax/traitement_inscription_user_ajax.php',
		url :'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_inscription_user_ajax.php',
		type:'POST',
		dataType:'json',
		data : form_connexion,
		success:function(retour_php)
		{
			if(retour_php)
			{
				//document.location.href="http://mbacentereurope.eu/mbacenter/profil.php";
				document.location.href="http://localhost/mbacenter/mbacenter/profil.php";
			}
			else
			{
				$("#connexion_error").show();
			}
		},
		error:function(retour_php)
		{
			alert("il y a un soucis avec la connexion à la base de données");
		}
	});
});

$("#btn_signin").click(function(){
	var datas = $("#form_signin").serialize()+"&action=ajouter"+"&employe="+$("#employe").is(':checked');
	// alert(name_error_required+" "+email_error_use+" "+password_error+" "+repeat_password_required+" "+email_error_format+" "+repeat_password_match);
	if((name_error_required==true)&&(email_error_use==true)&&(password_error==true)&&(repeat_password_required==true)&&(email_error_format==true)&&(repeat_password_match==true))
	{
		$.ajax({
			url: 'fichierAjax/traitement_inscription_user_ajax.php',
			//url: 'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_inscription_user_ajax.php',
			type: 'POST',
			dataType: 'json',
			data : datas,
			success:function(retour_php)
			{
				if(retour_php)
				{
					//alert("faire la redirection vers une page sp\351cifique");
					//document.location.href("http://profil.php");
					window.location = 'http://mbacentereurope.eu/profil.php';
					//$(location).attr('href',"profil.php");
				}else
				{
					alert("Probl\351me de connexion \341 la base de donn\351e");
				}
			},
			error:function(retour_php)
			{
				alert(retour_php);
			}
		});
	}
});

});//end document ready

function bonmail(mailteste)

{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test(mailteste))
	{
		return(true);
	}
	else
	{
		return(false);
	}
}