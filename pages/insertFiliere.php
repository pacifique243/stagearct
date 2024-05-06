<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomfil=isset($_POST['nomfil'])?$_POST['nomfil']:"";
    $idst=isset($_POST['idst'])?strtoupper($_POST['idst']):1;
    
    $requete="insert into filiere(nomfil,idst) values(?,?)";
    $params=array($nomfil,$idst);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:filieres.php');
?>
