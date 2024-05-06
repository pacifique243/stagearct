<?php
        session_start();
        if(isset($_SESSION['user']) ){
            
            if($_SESSION['user']['role']=='ADMIN'){
               
                require_once('connexiondb.php');
                
                $idaff=isset($_GET['idaff'])?$_GET['idaff']:0;

                $requete="delete from affecter where idaff=?";
               
                $params=array($idaff);
                
                $resultat=$pdo->prepare($requete);
                
                $resultat->execute($params);
                
                header('location:Effectue.php'); 
                
            }else{
                $message="Vous n'avez pas le privilège de supprimer une affectation!!!";
                
                $url='Effectue.php';
                
                header("location:alerte.php?message=$message&url=$url"); 
            }
           
        }else {
                header('location:login.php');
        }
       