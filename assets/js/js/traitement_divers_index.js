$(document).ready(function(){

$.ajax({
	url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_sms_ajax.php',
	type :'POST',
	dataType:'json',
	data:'&action=envoiSms',
	success:function(retour_php)
	{
		var now = new Date();
		$.format.date(now, 'yyyy-MM-dd 00:00:00');
		date_cours = retour_php[0]['date_cours']+' 00:00:00';	
		date2 = new Date(date_cours);
		tmp = (int)(now - date2);
		alert(tmp);
		
		/*if($.format.date('2015-02-03')>now)
			alert('ok');
		else
			alert('pas ok');
		//alert((int)(now-retour_php[0]['date_cours']));*/
	},
	error:function(retour_php)
	{
		alert();
	}
  });
});//end document ready