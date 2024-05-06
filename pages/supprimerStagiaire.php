<?php
        session_start();
        if(isset($_SESSION['user']) ){
            
            if($_SESSION['user']['role']=='ADMIN'){
               
                require_once('connexiondb.php');
                
                $idst=isset($_GET['idst'])?$_GET['idst']:0;

                $requete="delete from stagiaire where idst=?";
                
                $params=array($idst);
                
                $resultat=$pdo->prepare($requete);
                
                $resultat->execute($params);
                
                header('location:stagiaires.php'); 
                
            }else{
                $message="Vous n'avez pas le privilège de supprimer un stagiaire!!!";
                
                $url='stagiaires.php';
                
                header("location:alerte.php?message=$message&url=$url"); 
            }
           
        }else {
                header('location:login.php');
        }
?>
