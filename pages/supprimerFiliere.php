<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idfil=isset($_GET['idfil'])?$_GET['idfil']:0;

           
                $requete="delete from filiere where idfil=?";
                $params=array($idf);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:filieres.php');
            
            
         }else {
                header('location:login.php');
        }
    
    
    
    
?>
 