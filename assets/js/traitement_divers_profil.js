$(document).ready(function(){
    
	// alert($("#session_type").val());
	// alert($("#session_id_employe").val());
	// alert();
    // $('#high_grade option[value="BA"]').attr('selected', true);
	// alert("alert from user or emp");
	$("#location selected").val(4);
	$("#location").val("4");
	$("#current_pass").hide();
	$("#new_pass").hide();
	$("#repeat_new_pass").hide();
	$("#current_pass_error").hide();
	$("#repeat_pass_error").hide();
	var new_pass=false;
	var cur_pass=false;
	var repeat_pass=false;
	var correspond = false;
	var dispo=false;
	
	/****  chargement des photos  ****/


$(document).ready(function (e) {
$("#loading").hide();
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "fichierAjax/ajax_php_file_photo.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);

//reload image
$("#img_profile").attr("src", $("#img_profile").attr("src") + "?" + Math.random());
$("#previewing").hide("slow");
}
});
}));

// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
$("#previewing").show("slow");
};
});


	/***   fin chargement de photos  ***/
	if($("#profil_user_from_employe").val()!="")
	{
	// session type est celui de l'user, c'est à dire que l'employé a les mêmes droit que l'user
		/*var datas_sess = "&id="+$("#profil_user_from_employe").val()+"&type=2"+"&action=affichage_data_user";
		$.ajax({
			url : '/fichierAjax/traitement_ajax_profil.php',
			dataType: 'json',
			data : datas_sess,
			success:function(retour_php)
			{
				$("#name").val(retour_php[0]['nom']);
				$("#location").val(retour_php[0]['location']);		
			},
			error:function(retour_php)
			{
				alert("Problème de connexion 4 ");
			}
		});*/
	}

	/***  sms  ***/
	$("#sms").click(function(){
		$.ajax({
			url:'/fichierAjax/ajax_php_file_photo.php',
			type:'POST',
			dataType:'json',
			data : '&gsm='+$("#gsm").val()+'&message='+$("#sms_text").val()+'&action=envoyerSms',
			success:function(retour_php)
			{
				//alert(retour_php);
			},
			error:function(retour_php)
			{
				alert(retour_php);
			}
		});
	});
	/************** partie form save data personal info ******************/
	$("#btn_save_personal_info").click(function(){
		if($("#session_type").val()==2)
		{
			//var datas_change = "&nom="+$("#name").val()+"&location="+$("#location").val()+"&biographie="+$("#bio").val()+"&action=sauver_changement_user";
			var datas_change = $("#form_personal_info").serialize()+"&action=sauver_changement_user";
		}
		else
		{
			var datas_change = $("#form_personal_info").serialize()+"&action=sauver_changement_emp";
		}
		$.ajax({
			url:'/fichierAjax/ajax_php_file_photo.php',
			//url: 'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_inscription_user_ajax.php',
			type:'POST',
			dataType:'json',
			data : datas_change,
			success:function(retour_php)
			{
				//alert("enregistrement ok");
				location.reload();
			},
			error:function(retour_php)
			{
				//alert('enregistrement pas ok');
			}
		});
	});
	
	/************** partie form affiche data personal info ******************/
	
	if($("#session_type").val()==2)
	{
		var datas_aff = "&id="+$("#session_id_user").val()+"&type="+$("#session_type").val()+"&action=affichage_data_user";
	}
	if($("#session_type").val()==1)
	{
		var datas_aff = $("#form_personal_info").serialize()+"&id="+$("#session_id_employe").val()+"&type="+$("#session_type").val()+"&action=affichage_data_emp";
	}
	if($("#session_type").val()==3)
	{
		var datas_aff = "&id="+$("#profil_user_from_employe").val()+"&type="+$("#session_type").val()+"&action=affichage_data_user";
	}
	$.ajax({
		url : '/fichierAjax/traitement_ajax_profil.php',
		type: 'POST',
		dataType: 'json',
		data : datas_aff,
		success:function(retour_php)
		{
			$("#name").val(retour_php[0]['nom']);
			$("#surname").val(retour_php[0]['prenom']);
			$("#gsm").val(retour_php[0]['gsm']);
			$("#adress").val(retour_php[0]['adress']);
			$("#genre").val(retour_php[0]['gender']);
			$("#date_annif").val(retour_php[0]['date_naiss']);
			$("#military").val(retour_php[0]['service_militaire']);
			$("#annee_deb").val(retour_php[0]['annee_experience_deb']);
			$("#annee_fin").val(retour_php[0]['annee_experience_fin']);
			$("#current_job").val(retour_php[0]['current_job']);
			$.ajax({
				url:'fichierAjax/traitement_ajax_profil.php',
				dataType:'json',
				type:'POST',
				data : "&id_user="+$("#session_id_user").val()+"&action=affiche_score",
				success : function(retour_php)
				{
					$("#gmat_score").val(retour_php[0]['score']);
					$("#gre_score").val(retour_php[1]['score']);
					$("#toefl_score").val(retour_php[2]['score']);
					$("#lsat_score").val(retour_php[3]['score']);
					$("#mcat_score").val(retour_php[4]['score']);
				},
				error : function(retour_php)
				{
					alert('probleme de connexion 3');
				}
			});
			//alert(retour_php[0]['plus_haut_diplome']+" "+retour_php[0]['niveau_etude']);
			$('#high_grade option[value="'+retour_php[0]['plus_haut_diplome']+'"]').attr('selected', true);
			$('#area option[value="'+retour_php[0]['niveau_etude']+'"]').attr('selected', true);
			
			$.ajax({
				url:'fichierAjax/traitement_ajax_profil.php',
				dataType:'json',
				type:'POST',
				data : "&id_user="+$("#session_id_user").val()+"&action=affiche_planned_school",
				success:function(retour_php)
				{
					$("#first_school").val(retour_php[0]['ecole_nom']);
					$("#second_school").val(retour_php[1]['ecole_nom']);
					$("#third_school").val(retour_php[2]['ecole_nom']);
					$("#fourth_school").val(retour_php[3]['ecole_nom']);
					$("#fifth_school").val(retour_php[4]['ecole_nom']);
				},
				error:function(retour_php)
				{
					alert('probleme de connexion 2/5');
				}
			});
			if($("#session_type").val()==2)
			{
				$("#img_profile").attr("src","photos_user/"+$("#session_id_user").val()+"user.jpg");//ajouté .jpg
				//location.reload();
			}
			else
			{
				$("#img_profile").attr("src","photos_user/"+$("#session_id_employe").val()+"employe.jpg");//ajouté .jpg
				//location.reload();
			}
		},
		error:function(retour_php)
		{
			alert("Problème de connexion 3");
		}
	});
	
	/*********** onglet school orientation  ****************/
	$("#btn_save_school_orientation").click(function(){	
		
		if($("#session_type").val()==2)
		{
			var datas_school_orient = $("#form_school_orientation").serialize()+"&id_user="+$("#session_id_user").val()+"&action=save_school_orientation";
		}
		$.ajax({
			url:'/fichierAjax/ajax_php_file_photo.php',
			//url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_profil.php',
			dataType:'json',
			type:'POST',
			data : datas_school_orient,
			success :function(retour_php)
			{
				
			},
			error:function(retour_php)
			{
				alert('error');
			}
		});
	});
	/***********  onglet work history  *********************/
	$("#btn_work_history").click(function(){
		if($("#session_type").val()==2)
		{
			var datas_work_history = $("#form_work_history").serialize()+"&action=save_data_work_history"+"&id="+$("#session_id_user").val();
		}
		$.ajax({
			url : 'fichierAjax/traitement_ajax_profil.php',
			type: 'post',
			dataType: 'json',
			data : datas_work_history,
			success:function(retour_php)
			{
				/*$("#annee_deb").val(retour_php[0]['annee_experience_deb']);
				$("#annee_fin").val(retour_php[0]['annee_experience_fin']);
				$("#current_job").val(retour_php[0]['current_job']);*/
				
				if($("#session_type").val()==2)
				{
					$("#img_profile").attr("src","photos_user/"+$("#session_id_user").val()+"user");
					// location.reload();
				}
				else
				{
					$("#img_profile").attr("src","photos_user/"+$("#session_id_employe").val()+"employe");
					// location.reload();
				}
			},
			error:function(retour_php)
			{
				alert("Problème de connexion 2");
			}
		});
	});
	/***********  onglet education  **********************/
		$("#btn_save_education").click(function(){
		if($("#session_type").val()==2)
		{
			var datas_work_history = $("#form_education").serialize()+"&action=save_data_education"+"&id="+$("#session_id_user").val();
		}
		$.ajax({
			url : 'fichierAjax/traitement_ajax_profil.php',
			type: 'post',
			dataType: 'json',
			data : datas_work_history,
			success:function(retour_php)
			{
				/*
				$("#annee_deb").val(retour_php[0]['annee_experience_deb']);
				$("#annee_fin").val(retour_php[0]['annee_experience_fin']);
				$("#current_job").val(retour_php[0]['current_job']);
				*/
				
				if($("#session_type").val()==2)
				{
					$("#img_profile").attr("src","photos_user/"+$("#session_id_user").val()+"user");
					// location.reload();
				}
				else
				{
					$("#img_profile").attr("src","photos_user/"+$("#session_id_employe").val()+"employe");
					// location.reload();
				}
			},
			error:function(retour_php)
			{
				alert("Problème de connexion 1");
			}
		});
	});
	/***********  onglet de changement de password  **********************/
	//test des éléments du formulaire
	$("#current_password").focusout(function()
	{
		if($("#current_password").val()=="")
		{
			$("#current_pass").show();
			cur_pass=false;
		}
		else
		{
			$("#current_pass").hide();
			cur_pass=true;
		}
		if($("#session_type").val()==2)
		{
			var pass_form = "&mp1="+$("#current_password").val()+"&action=verif_connexion_user";
		}
		else
		{
			var pass_form = "&mp1="+$("#current_password").val()+"&action=verif_connexion_emp";
		}
		
		$.ajax({
			url:'fichierAjax/traitement_ajax_profil.php',
			//url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_profil.php',
			type:'POST',
			dataType:'json',
			data : pass_form,
			success:function(retour_php)
			{
				if(!retour_php)
				{
					$("#current_pass_error").show();
					dispo=false;
				}
				else
				{
					$("#current_pass_error").hide();
					dispo=true;
				}
			},
			error:function(retour_php)
			{
				alert('error');
			}
		});
	});
	$("#new_password").focusout(function(){
		if($("#new_password").val()=="")
		{
			$("#new_pass").show();
			new_pass=false;
		}
		else
		{
			$("#new_pass").hide();
			new_pass=true;
		}
	});
	$("#repeat_new_password").focusout(function()
	{
		if($("#repeat_new_password").val()=="")
		{
			$("#repeat_new_pass").show();
			repeat_pass=false;
		}
		else
		{
			$("#repeat_new_pass").hide();
			repeat_pass=true;
		}
		if($("#repeat_new_password").val()!=$("#new_password").val())
		{
			$("#repeat_pass_error").show();
			correspond=false;
		}
		else
		{
			$("#repeat_pass_error").hide();
			correspond=true;
		}
	});
	
	$("#btn_change_password").click(function(){	
		//alert(new_pass+" "+cur_pass+" "+repeat_pass+" "+correspond+" "+dispo);
		if((new_pass==true)&&(cur_pass==true)&&(repeat_pass==true)&&(correspond==true)&&(dispo==true))
		{
			if($("#session_type").val()==2)
			{
				var datas_pwd = "&current_password="+$("#current_password").val()+"&new_password="+$("#new_password").val()+"&action=changement_password_user";
			}
			else
			{
				var datas_pwd = "&current_password="+$("#current_password").val()+"&new_password="+$("#new_password").val()+"&action=changement_password_emp";
			}
			$.ajax({
				url:'fichierAjax/traitement_ajax_profil.php',
				//url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_profil.php',
				dataType:'json',
				type:'POST',
				data : datas_pwd,
				success :function(retour_php)
				{
					alert('Your password has been changed');
					location.reload();
				},
				error:function(retour_php)
				{
					alert('error');
				}
			});
		}
	});
});//end document ready


