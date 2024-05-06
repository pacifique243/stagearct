identre	nomentre	fonction	idser
<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $identre=isset($_POST['identre'])?$_POST['identre']:0;

    $nomentre=isset($_POST['nomentre'])?$_POST['nomentre']:"";
    $fonction=isset($_POST['fonction'])?$_POST['fonction']:"";

    $idser=isset($_POST['idser'])?$_POST['idser']:1;
    $requete="update entreprise set nomentre=?, fonction=?, idser=? where identre=?";

    $params=array($nomentre,$fonction,$idser,$identre);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:Entreprise.php');
?>
  