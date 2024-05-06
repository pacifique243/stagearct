<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $typeser=isset($_POST['typeser'])?$_POST['typeser']:"";
    
    $requete="insert into service(typeser) values(?)";
    $params=array($typeser);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:service.php');
?>
