var element = document.getElementById('id');//On récupère l'id de l'article
var id_article = element.innerText;

    //On fais un appel AJAX avec GET
    $.get("index.php?c=afficheAjax", {
        id_article: id_article//On met les paramettre
    }, function (data){
        $('#affichageCommentaires').html(data);//On affiche le resultat dans la div qui possède l'id 'affichageCommentaires'       
    });