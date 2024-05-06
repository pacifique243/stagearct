identre	nomentre	fonction	idser	
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomentre=isset($_POST['nomentre'])?$_POST['nomentre']:"";
    $fonction=isset($_POST['fonction'])?$_POST['fonction']:"";
    $idser=isset($_POST['idser'])?$_POST['idser']:1;
    $requete="insert into entreprise(nomentre,fonction,idser) values(?,?,?)";
    $params=array($nomentre,$fonction,$idser);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Entreprise.php');
?> 