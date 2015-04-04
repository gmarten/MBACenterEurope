$(document).ready(function(){
	alert();
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
	/***  sms  **/
	$("#sms").click(function(){
		$.ajax({
			url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_sms_ajax.php',
			type:'POST',
			dataType:'json',
			data : '0032494589365',
			success:function(retour_php)
			{
				alert(retour_php);
			},
			error:function(retour_php)
			{
				alert(retour_php);
			}
		});
	});
	/************** partie affichage user data ******************/
	$("#btn_save_change").click(function(){
		if($("#session_type").val()==2)
		{
			var datas = "&nom="+$("#name").val()+"&location="+$("#location").val()+"&biographie="+$("#bio").val()+"&action=sauver_changement_user";
		}
		else
		{
			var datas = "&nom="+$("#name").val()+"&action=sauver_changement_emp";
		}
		$.ajax({
			//url:'http://mbacentereurope.eu/mbacenter/fichierAjax/traitement_ajax_profil.php',
			url: 'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_inscription_user_ajax.php',
			type:'POST',
			dataType:'json',
			data : datas,
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
	//affichage des données
	if($("#session_type").val()==2)
	{
		var datas = "&id="+$("#session_id_user").val()+"&type="+$("#session_type").val()+"&action=affichage_data_user";
	}
	else
	{
		var datas = "&id="+$("#session_id_employe").val()+"&type="+$("#session_type").val()+"&action=affichage_data_emp";
	}
	$.ajax({
		url : 'http://localhost//mbacenter/mbacenter/fichierAjax/traitement_ajax_profil.php',
		type: 'post',
		dataType: 'json',
		data : datas,
		success:function(retour_php)
		{
			$("#name").val(retour_php[0]['nom']);
			$("#location").val(retour_php[0]['location']);
			$("#bio").val(retour_php[0]['biographie']);
		},
		error:function(retour_php)
		{
			alert("Problème de connexion");
		}
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
			//url:'http://mbacentereurope.eu/mbacenter/fichierAjax/traitement_ajax_profil.php',
			url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_profil.php',
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
				var datas = "&current_password="+$("#current_password").val()+"&new_password="+$("#new_password").val()+"&action=changement_password_user";
			}
			else
			{
				var datas = "&current_password="+$("#current_password").val()+"&new_password="+$("#new_password").val()+"&action=changement_password_emp";
			}
			$.ajax({
				//url:'http://mbacentereurope.eu/mbacenter/fichierAjax/traitement_ajax_profil.php',
				url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_profil.php',
				dataType:'json',
				type:'POST',
				data : datas,
				success :function(retour_php)
				{
					alert('modification ok');
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