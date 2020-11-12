$( document ).ready(function() {
    console.log( "ready!" );

    $('#ajouter_fichier').on('click', function(){
        $('#fichier').click();
    });

    $('#envoyer_fichier').on('click', function(){
        var idcours = $(this).data('idcours');
        uploadFile(idcours);
    });

    $('#fichier').on('change', function(){
        var files = $('#fichier')[0].files;
        var nom = files[0].name;
        $('#lbl_nom_fichier').html(nom);

    });
})

function uploadFile(idcours)
{
    var fd = new FormData();
    var files = $('#fichier')[0].files;
    
    // Check file selected or not
    if(files.length > 0 ){
       fd.append('fichier',files[0]);
       fd.append('idcours',idcours);
       fd.append('ajouter', true);

       $.ajax({
          url: './php/upload.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
             if(response != 0){
               console.log("fichier envoyé");
               getCours(idcours);
               $('#fichier').val('');
               $('#lbl_nom_fichier').html('');

             }else{
                alert('file not uploaded');
             }
          },
       });
    }else{
       alert("Faut choisir un fichier avant :)");
    }
}

function supprimerFichier(id, elem)
{
    $.ajax({
        url: './php/upload.php',
        type: 'POST',
        data: {
            "delete" : true,
            "id" : id
        },
        success: function(response){
           
            var res = JSON.parse(response);
            console.log(res);
            elem.remove();
        },
     });
}
