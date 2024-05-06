<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $datedebut=isset($_POST['datedebut'])?$_POST['datedebut']:"";
    $datefin=isset($_POST['datefin'])?$_POST['datefin']:"";
    
    $idser=isset($_POST['idser'])?$_POST['idser']:1;
    $idst=isset($_POST['idst'])?$_POST['idst']:1;

    $requete="insert into affecter(idser,idst,datedebut,datefin) values(?,?,?,?)";
    $params=array($idser,$idst,$datefin,$datedebut);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Effectue.php');
   	
?>
