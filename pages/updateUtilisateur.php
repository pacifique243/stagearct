<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $iduser=isset($_POST['iduser'])?$_POST['iduser']:0;

    $login=isset($_POST['login'])?$_POST['login']:"";

    $email=isset($_POST['email'])?$_POST['email']:"";
     $role=isset($_POST['role'])?$_POST['role']:"";
    $requete="update utilisateur set login=?,email=?,role=? where iduser=?";

    $params=array($login,$email,$role,$iduser);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:utilisateurs.php');
?>
