<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idser=isset($_POST['idser'])?$_POST['idser']:0;

    $typeser=isset($_POST['typeser'])?$_POST['typeser']:"";

    $requete="update service set typeser=? where idser=?";

    $params=array($typeser,$idser);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:service.php');
?>
      