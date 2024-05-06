<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $ideta=isset($_GET['ideta'])?$_GET['ideta']:0;

                $requete="delete from etablissement where ideta=?";
                $params=array($ideta);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:Etablissement.php');
            
            
         }else {
                header('location:login.php');
        }
       
    
      
    
?>