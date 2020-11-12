<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>COURS EMILIE</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>

<body data-categorie="1">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Cours </div>
      <div class="list-group list-group-flush">
        <div id="liste_cours">
          <a href="#" class="list-group-item list-group-item-action bg-light">Cours 1</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Cours 2</a>
        </div>
        <input id="nom_cours" class="form-control mt-5" type="text" placeholder="Nom">
        <button id="ajouter_cours" type="button" class="btn btn-primary btn-sm btn-block mt-2">Ajouter</button>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <svg id="menu-toggle" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12 mt-4" style='text-align:center;'>
            <h1 id='cours_nom'></h1>
          </div>
          <div class="col-md-12">
            <h4 class="mt-4">Ajouter un document</h4>
            <div class="form-check form-check-inline mt-4">
              <input type="file" class="custom-file-input" id="fichier" hidden>
              <i id="ajouter_fichier" class="fas fa-file-upload"></i>
              <label id="lbl_nom_fichier" class="form-check-label ml-2" for="ajouter_fichier"></label>
              <button id="envoyer_fichier" data-idcours="0"; type="button" class="btn btn-outline-primary ml-4">Ajouter</button>
            </div>
          </div>
        </div>
        <div class="row mt-4">
       

          <div class="col-md-4">
            <h4 class="mt-4">Liste des cours</h4>
            <div id="cours_documents" class="mt-4">

            </div>
          </div>
          <div class="col-md-8" id="affichage_document">

          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="font-awesome/js/all.min.js"></script>
  <script src="js/fichiers.js"></script>
  <script src="js/main.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
