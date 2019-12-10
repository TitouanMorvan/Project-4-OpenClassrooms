/*$(document).ready(function(){

    $('.modal-trigger').leanModal();

    $(".see_comment").click(function(){
        var id = $(this).attr("id");
        $.post('ajax/see_comment.php',{id:id},function(){
            $("#commentaire_"+id).hide();
        });
    });

    $(".delete_comment").click(function(){
        var id = $(this).attr("id");
        $.post('ajax/delete_comment.php',{id:id},function(){
                $("#commentaire_"+id).hide();
        });
    });

}); */

function see_comment(id){

  $.ajax({
       url : 'views/error.php',
       type : 'GET',
       dataType : 'html',
       success : function(code_html, statut){ // success est toujours en place, bien sûr !
          console.log("VALIDER");
       },

       error : function(resultat, statut, erreur){
          console.log("Pas valider");
       }

    });
}
