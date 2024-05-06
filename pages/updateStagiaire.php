<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idst=isset($_POST['idst'])?$_POST['idst']:0;
    $nomst=isset($_POST['nomst'])?$_POST['nomst']:"";
    $prenomst=isset($_POST['prenomst'])?$_POST['prenomst']:"";
    $emailst=isset($_POST['emailst'])?$_POST['emailst']:"F";
    $nationalite=isset($_POST['nationalite'])?$_POST['nationalite']:"";
    $sexe=isset($_POST['sexe'])?$_POST['sexe']:"";
    $telephone=isset($_POST['telephone'])?$_POST['telephone']:"";
    

    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
        $requete="update stagiaire set nomst=?,prenomst=?,emailst=?,nationalite=?,sexe=?,telephone=?,photo=? where idst=?";
        $params=array($nomst,$prenom,$emailst,$nationalite,$sexe,$telephone,$nomPhoto,$idS);
    }else{
        $requete="update stagiaire set nomst=?,prenomst=?,emailst=?,nationalite=?,telephone=?,sexe=? where idst=?";
        $params=array($nomst,$prenomst,$emailst,$nationalite,$telephone,$sexe,$idst);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:stagiaires.php');
  
?>
