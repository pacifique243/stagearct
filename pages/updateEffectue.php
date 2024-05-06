<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idaff=isset($_POST['idaff'])?$_POST['idaff']:0;
    $datedebut=isset($_POST['datedebut'])?$_POST['datedebut']:"";
    $datefin=isset($_POST['datefin'])?$_POST['datefin']:"";
    $idser=isset($_POST['idser'])?$_POST['idser']:1;
    $idst=isset($_POST['idst'])?$_POST['idst']:1;

        $requete="update affecter set idser=?,idst=?,datedebut=?,datefin=? where idaff=?";
        $params=array($idser,$idst,$datedebut,$datefin,$idaff);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Effectue.php');

?>

