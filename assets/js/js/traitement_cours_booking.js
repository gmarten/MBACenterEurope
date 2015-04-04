$(document).ready(function(){

//

});//end document ready

function recuperationDatasVersBd()
{
	var now = $.format.date(new Date(), 'yyyy-MM-dd');
	//new Date();
	//alert(now.getFullYear()+"-"+now.getMonth()+"-"+now.getDate());
	//alert(now);
	if(now<=_date)
	{
	var datas = "&date="+_date+"&action=ajoutercours"+"&cours="+_cours;
		$.ajax({
			url:'http://localhost/mbacenter/mbacenter/fichierAjax/traitement_ajax_cours.php',
			type : 'POST',
			dataType:'json',
			data : datas,
			success:function(retour_php)
			{
				//alert(retour_php);
				window.location.replace("https://www.eventbrite.fr/e/billets-1-2-1-meetings-with-top-business-schools-15386518491");	
			},
			error:function(retour_php)
			{
				alert(retour_php);
			}
		});
	}
	else
	{
		alert("La date est dépassé");
	}
}

