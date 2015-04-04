$(document).ready(function(){
var nb_students;
var retour_id = new Array();
var retour_nom = new Array();
var no_page =0;
$('#data_table_moteur').DataTable();
for(i=0; i<$("#taille_res").val(); i++)
{
	retour_id[i] = $("#"+i+"").val();
	retour_nom[i] = $("input[name=nom"+i+"]").val();
}

$("#btn_search_list").click(function(){
    $.ajax({
		 url:'fichierAjax/traitement_moteur_ajax.php',
		 type:'POST',
		 dataType:'json',
		 data: "&id_cours="+$("#course_type").val()+"&action=student_parcours",
		 success:function(retour_php)
		 {
			if(retour_php.length==0)
			{
				$("#our-speakers").remove();
				$("#our-students").append($("<section id='our-speakers'/>"));
				$("#our-speakers").after($("<p id='msg_vide'> Aucun &#233;l&#233;ment ne correspond &#224; votre recherche </p>"));
			}
			else
			{
				$("#msg_vide").remove();
				$("#our-speakers").remove();
				$("#our-students").append($("<section id='our-speakers'/>"));
				$("#page_num").remove();
				for(nb_p=0;nb_p<retour_php.length;nb_p++)
				{
					if(nb_p%10==0)
					{
						no_page++;
						$("#nb_pages").append($('<ul class="pagination" id="page_num"/>'));
						$("#page_num").append($('<li class="active"><a href="javascript:afficheData('+no_page+');">'+no_page+'</a></li>'));
					}
				}
				for(i=0;i<10;i++)
				{
					if(i<=retour_php.length)
					{
						$("#our-speakers").append($('<div id="speakers" class="author-block course-speaker"/>'));
						$("#speakers").append($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'"/>'))
									  .after($('<figure class="author-picture"><img src="photos_user/'+retour_php[i]['id_user']+'.jpg" alt=""></figure>'))
									  .after($('<article class="paragraph-wrapper"/>'))
									  .after($('<div class="inner"/>'))
			    					  .after($('<header/>'))
									  .after($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'"></a>'))
									  .after($('<figure></figure>'))
									  .after($('<p/>')).html(retour_php[i]['nom'])										
									  .after($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'" class="btn btn-framed btn-small btn-color-grey">Full Profil</a>'));
						//alert(i+" "+retour_php.length);
					}
				}
			}
		 },
		 error:function(retour_php)
		 {
		 
		 }
	});
});
/*** affichage d'un student via le moteur de recherche ***/
	
	$("#btn_search").click(function(){	
		if($("full_text").val()!="")
		{
			$.ajax({
			 url:'fichierAjax/traitement_moteur_ajax.php',
			 type:'POST',
			 dataType:'json',
			 data: "&nom="+$("#full_text").val()+"&action=recherche",
			 success:function(retour_php)
			 {
				nb_students=retour_php.length;
				if(retour_php.length==0)
				{
					$("#our-speakers").remove();
					$("#our-students").append($("<section id='our-speakers'/>"));
					$("#our-speakers").after($("<p id='msg_vide'> Aucun &#233;l&#233;ment ne correspond &#224; votre recherche </p>"));
				}
				else
				{
					$("#msg_vide").remove();
					$("#our-speakers").remove();
					$("#our-students").append($("<section id='our-speakers'/>"));
					for(i=0;i<retour_php.length;i++)
					{
						$("#our-speakers").append($('<div id="speakers" class="author-block course-speaker"/>'));
						$("#speakers").append($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'"/>'))
									 .after($('<figure class="author-picture"><img src="photos_user/'+retour_php[i]['id_user']+'user.jpg" alt=""></figure>'))
									 .after($('<article class="paragraph-wrapper"/>'))
									 .after($('<div class="inner"/>'))
									 .after($('<header/>'))
									 .after($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'"></a>'))
									 .after($('<figure></figure>'))
									 .after($('<p/>')).html(retour_php[i]['nom'])
									 .after($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'" class="btn btn-framed btn-small btn-color-grey">Full Profil</a>'));
					}
				}
			 },
			 error:function(retour_php)
			 {
				
			 }
			});
		}
	});
});  //end document ready

function afficheData(no_page)
{
	$.ajax({
		url:'fichierAjax/traitement_moteur_ajax.php',
		type:'POST',
		dataType:'json',
		data: "&id_cours="+$("#course_type").val()+"&action=student_parcours",
		success:function(retour_php)
		{
			if(retour_php.length==0)
			{
				$("#our-speakers").remove();
				$("#our-students").append($("<section id='our-speakers'/>"));
				$("#our-speakers").after($("<p id='msg_vide'> Aucun &#233;l&#233;ment ne correspond &#224; votre recherche </p>"));
			}
			else
			{
				$("#msg_vide").remove();
				$("#our-speakers").remove();
				$("#our-students").append($("<section id='our-speakers'/>"));
				for(j=i=(no_page*10)-10;i<10;i++)
				{
					if(i<retour_php.length)
					{
						$("#our-speakers").append($('<div id="speakers" class="author-block course-speaker"/>'));
						$("#speakers").append($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'"/>'))
									  .after($('<figure class="author-picture"><img src="photos_user/'+retour_php[i]['id_user']+'user.jpg" alt=""></figure>'))
									  .after($('<article class="paragraph-wrapper"/>'))
									  .after($('<div class="inner"/>'))
									  .after($('<header/>'))
									  .after($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'"></a>'))
									  .after($('<figure></figure>'))
									  .after($('<p/>')).html(retour_php[i]['nom'])										
									  .after($('<a href="http://mbacentereurope.eu/profil.php?id_user='+retour_php[i]['id_user']+'" class="btn btn-framed btn-small btn-color-grey">Full Profil</a>'));
					}
				}
				
			}
		},
		error:function(retour_php)
		{
		 
		}
	});
}