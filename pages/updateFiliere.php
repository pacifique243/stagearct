<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idfil=isset($_POST['idfil'])?$_POST['idfil']:0;

    $nomfil=isset($_POST['nomfil'])?$_POST['nomfil']:"";

    $idst=isset($_POST['idst'])?strtoupper($_POST['idst']):"";
    
    $requete="update filiere set nomfil=?,idst=? where idfil=?";

    $params=array($nomfil,$idst,$idfil);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:filieres.php');
?>
 