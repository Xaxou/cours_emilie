<?php 

    $dsn = 'mysql:dbname=emilie;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);

    $ajouterCours = $dbh->prepare('INSERT INTO `cours`(`nom`) VALUES (?)');
    $getAllCours = $dbh->prepare('SELECT * FROM `cours`');
    $getOneCours = $dbh->prepare('SELECT * FROM `cours` WHERE id = ?');
    $getFichiersCours = $dbh->prepare('SELECT * FROM `fichiers` WHERE `id_cours` = ?');

    $results = false;

    if(isset($_POST['ajouter']))
    {
        $ajouterCours->execute(array($_POST['nom']));
        $results = $dbh->lastInsertId();
    }

    if(isset($_POST['cours']))
    {
        $getAllCours->execute();
        $results = $getAllCours->fetchAll();
    }

    if(isset($_POST['getOne']))
    {
        $results = [];
        $getOneCours->execute(array($_POST['id']));
        $results['cours'] = $getOneCours->fetchAll()[0];

        $getFichiersCours->execute(array($_POST['id']));
        $results['fichiers'] = $getFichiersCours->fetchAll();

    }

    

    echo json_encode($results);

?>