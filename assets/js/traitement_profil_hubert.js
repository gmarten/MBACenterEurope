$(document).ready(function(){

$('#btn_activation').click(function(){
	$.ajax({
		url:'fichierAjax/traitement_ajax_activation_hubert.php',
		type:'POST',
		dataType : 'json',
		data : "&email="+$("#email_emp").val()+"&action=activation_emp",
		success:function(retour_php)
		{
			alert('le profil a bien \350t\350 activ\350');
		},
		error : function(retour_php)
		{
			alert('Data base error');
		}
	});
});

});//end doc ready