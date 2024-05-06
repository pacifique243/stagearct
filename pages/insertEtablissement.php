<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nometa=isset($_POST['nometa'])?$_POST['nometa']:"";
    $adressetat=isset($_POST['adressetat'])?$_POST['adressetat']:"";
    $idfil=isset($_POST['idfil'])?$_POST['idfil']:1;
    $emaileta=isset($_POST['emaileta'])?$_POST['emaileta']:"";
    $requete="insert into etablissement(nometa,adressetat,idfil,emaileta) values(?,?,?,?)";
    $params=array($nometa,$adressetat,$idfil,$emaileta);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Etablissement.php');
?> 