<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $ideta=isset($_POST['ideta'])?$_POST['ideta']:0;

    $nometa=isset($_POST['nometa'])?$_POST['nometa']:"";
    $adressetat=isset($_POST['adressetat'])?$_POST['adressetat']:"";

    $idfil=isset($_POST['idfil'])?$_POST['idfil']:1;


    $emaileta=isset($_POST['emaileta'])?$_POST['emaileta']:"";
    $requete="update etablissement set nometa=?, adressetat=?, idfil=?, emaileta=? where ideta=?";

    $params=array($nometa,$adressetat,$idfil,$emaileta,$ideta);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:Etablissement.php');
?>
  