<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idser=isset($_GET['idser'])?$_GET['idser']:0;

            
                $requete="delete from service where idser=?";
                $params=array($idser);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:service.php');
            
            
         }else {
                header('location:login.php');
        }
    
  
    
    
?>