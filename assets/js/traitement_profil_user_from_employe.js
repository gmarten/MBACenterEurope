$(document).ready(function(){
	//alert("from emp user");
	
	$("#name").attr('disabled',true);
	$("#surname").attr('disabled',true);
	$("#gsm").attr('disabled',true);
	$("#adress").attr('disabled',true);
	$("#genre").attr('disabled',true);
	$("#date_annif").attr('disabled',true);
	$("#military").attr('disabled',true);
	$("#annee_deb").attr('disabled',true);
	$("#annee_fin").attr('disabled',true);
	$("#current_job").attr('disabled',true);
	
	$("#btn_save_school_orientation").attr('disabled',true);
	/*$("#btn_work_history").attr('disabled',true);
	$("#btn_save_education")attr('disabled',true);*/
	
	var datas_aff = "&id="+$("#profil_user_from_employe").val()+"&type="+$("#session_type").val()+"&action=affichage_data_user_from_emp";
	
	$.ajax({
		url : 'fichierAjax/traitement_ajax_user_from_employe.php',
		type: 'post',
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
			$("#comments").val(retour_php[0]['comments']);
			$.ajax({
				url:'fichierAjax/traitement_ajax_user_from_employe.php',
				dataType:'json',
				type:'POST',
				data : "&id_user="+$("#profil_user_from_employe").val()+"&action=affiche_score",
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
				
				}
			});
			if($("#session_type").val()==2)
			{
				$("#img_profile").attr("src","photos_user/"+$("#session_id_user").val()+"user");
				//location.reload();
			}
			else
			{
				$("#img_profile").attr("src","photos_user/"+$("#session_id_employe").val()+"employe");
				//location.reload();
			}
		},
		error:function(retour_php)
		{
			alert("Problème de connexion");
		}
	});
	/*$.ajax({
		//url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_user_from_employe.php',
		url:'fichierAjax/traitement_ajax_user_from_employe.php',
		type:'POST',
		dataType:'json',
		data : "&action=affichage_data_user_from_emp"+"&id_user="+$("#profil_user_from_employe").val(),
		success: function(retour_php)
		{
			$("#name").val(retour_php[0]['nom']);
			$("#location").val(retour_php[0]['location']);
			$("#bio").val(retour_php[0]['biographie']);
			$("#comments").val(retour_php[0]['comments']);
			$("#gsm").val(retour_php[0]['gsm']);
		},
		error: function(retour_php)
		{
			alert("Data base error");
		}
	});
	*/
	$("#btn_sms").click(function()
	{
		if($("#sms_text").val()!="")
		{
			$.ajax({
				url:'fichierAjax/traitement_sms_ajax.php',
				type:'POST',
				dataType:'json',
				data : '&gsm='+$("#gsm").val()+'&text='+$("#sms_text").val()+'&action=envoiSms',
				success:function(retour_php)
				{
					alert('Votre sms a \350t\350 envoy\350');
				},
				error:function(retour_php)
				{
					//alert(retour_php);
				}
			});
		}
		else
		{
			alert("Vous devez \351crire un message");
		}
	});
	$("#btn_save_personal_info").click(function(){
		var datas = "&comments="+$("#comments").val()+"&id_user_from_emp="+$("#profil_user_from_employe").val()+"&action=sauver_changement_user_from_emp";
		$.ajax({
			//url:'http://mbacentereurope.eu/fichierAjax/traitement_ajax_user_from_employe.php',
			url: 'fichierAjax/traitement_ajax_user_from_employe.php',
			type:'POST',
			dataType:'json',
			data : datas,
			success:function(retour_php)
			{
				//alert("Enregistrement fait");
				location.reload();
			},
			error:function(retour_php)
			{
				//alert('enregistrement pas ok');
			}
		});
		
	});
});