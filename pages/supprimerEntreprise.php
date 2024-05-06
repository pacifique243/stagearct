
<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $identre=isset($_GET['identre'])?$_GET['identre']:0;

           
                $requete="delete from entreprise where identre=?";
                $params=array($identre);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:Entreprise.php');
            
            
          
            
         }else {
                header('location:login.php');
        }
       
    
      
    
?>