<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $nom=isset($_POST['nomst'])?$_POST['nomst']:"";
    $prenom=isset($_POST['prenomst'])?$_POST['prenomst']:"";
    $sexe=isset($_POST['sexe'])?$_POST['sexe']:"F";
    $emailst=isset($_POST['emailst'])?$_POST['emailst']:"";
    $nationalite=isset($_POST['nationalite'])?$_POST['nationalite']:"";
    $telephone=isset($_POST['telephone'])?$_POST['telephone']:"";
    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    $requete="insert into stagiaire(nomst,prenomst,emailst,nationalite,sexe,telephone,photo) values(?,?,?,?,?,?,?)";
    $params=array($nom,$prenom,$sexe,$emailst,$nationalite,$telephone,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:stagiaires.php');

?>
