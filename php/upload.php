<?php 

    $uploads_dir = '../fichiers';
    $dsn = 'mysql:dbname=emilie;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);

    $ajouterFichier = $dbh->prepare('INSERT INTO `fichiers`(`nom`, `date_ajout`, `id_cours`) VALUES (?,?,?)');
    $ajouterCours = $dbh->prepare('INSERT INTO `fichiers`(`nom`, `date_ajout`, `id_cours`) VALUES (?,?,?)');
    $deleteFichier = $dbh->prepare('DELETE FROM `fichiers` WHERE `id` = ?');

    if(isset($_POST['ajouter']))
    {
        if(isset($_FILES))
        {
            $tmp_name = $_FILES["fichier"]["tmp_name"];
            // basename() peut empêcher les attaques de système de fichiers;
            // la validation/assainissement supplémentaire du nom de fichier peut être approprié
            $name = $_FILES["fichier"]["name"];
            $idcours = $_POST['idcours'];
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
    
            $ajouterFichier->execute(array($name, date('Y-m-d'), $idcours));
            $insertid = $dbh->lastInsertId();
            echo json_encode($insertid);
        }
    }

    if(isset($_POST['delete']))
    {
        $deleteFichier->execute(array($_POST['id']));
        echo json_encode($deleteFichier);
    }

?>