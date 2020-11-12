$( document ).ready(function() {
    console.log( "ready!" );

    listerCours();
    getCours(1);

    $('#ajouter_cours').on('click', function(){
        ajouterCours();
    });

    $('#liste_cours').on('click', '.cours', function(){
        var id = $(this).data('idcours');
        if(!$(this).hasClass('select'))
        {
            getCours(id);
        }

        $('.select').removeClass('select');
        $(this).addClass('select');

        $('#envoyer_fichier').data('idcours', id);
    });

    $('#cours_documents').on('click', '.voir_fichier', function(){
        var fichier = $(this).data('fichier');
        $('#affichage_document').html('<iframe src="fichiers/'+fichier+'" height="1250" width="100%"></iframe>');
    });

    $('#cours_documents').on('click', '.supprimer_fichier', function(){
        var id = $(this).data('idfichier');
        supprimerFichier(id, $(this).parent());
    });
})

function ajouterCours()
{
    var fd = new FormData();
    var nom = $('#nom_cours').val();
    
    // Check file selected or not
    if(nom != ''){
       fd.append('ajouter', true);
       fd.append('nom', nom);

       $.ajax({
          url: './php/cours.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
            listerCours();
          },
       });
    }else{
       alert("Tu as oublié d'ajouter le nom de ton cours :)");
    }
}

function listerCours()
{
    $.ajax({
        url: './php/cours.php',
        type: 'POST',
        data: {"cours" : true},
        success: function(response){
           
            var res = JSON.parse(response);
            console.log(res);
            $('#liste_cours').html('');
            var i = 0;
            res.forEach(element => {
                var active = "";
                if(i == 0)
                {
                    active = "select";
                }
                $('#liste_cours').append('<a href="#" data-idcours="'+element.id+'" class="cours list-group-item list-group-item-action bg-light '+active+'">'+element.nom+'</a>') 
                i++;
            });
        },
     });
}

function getCours(idcours)
{
    $.ajax({
        url: './php/cours.php',
        type: 'POST',
        data: {
            "getOne" : true,
            "id" : idcours
        },
        success: function(response){
           
            var res = JSON.parse(response);
            console.log(res);
            $('#cours_nom').html(res.cours.nom);
            $('#cours_documents').html('');
            res.fichiers.forEach(element => {
                $('#cours_documents').append('<h6>'+element.nom+' <button type="button" data-fichier="'+element.nom+'" class="btn btn-outline-primary ml-2 voir_fichier"><i class="fas fa-eye"></i></button><button type="button" data-idfichier="'+element.id+'" class="btn btn-outline-danger ml-2 supprimer_fichier"><i class="fas fa-trash"></i></button></h6>'); 
            });
            $('#affichage_document').html('');
        },
     });
}