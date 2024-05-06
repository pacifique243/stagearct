
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $ideta=isset($_GET['ideta'])?$_GET['ideta']:0;
    $requeteS="select * from etablissement where ideta=$ideta";
    $resultatS=$pdo->query($requeteS);
    $etablissement=$resultatS->fetch();
    $nometa=$etablissement['nometa'];
    $adressetat=$etablissement['adressetat'];
    $idfil=$etablissement['idfil'];
    $emaileta=$etablissement['emaileta'];
   

    $requeteFil="select * from filiere";
    $resultatFil=$pdo->query($requeteFil);

  
    $resultatSe=$pdo->query($requeteS);
	 	
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition etablissement</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
           
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition d'Affecter :</div>
                <div class="panel-body">
                    <form method="post" action="updateEtablissement.php" class="form">
						<div class="form-group">
                             <label for="ideta">id d'Etablissement: <?php echo $ideta ?></label>
                            <input type="hidden" name="ideta" class="form-control" value="<?php echo $ideta ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nometa">nometa :</label>
                            <input type="text" name="nometa" placeholder="nometa" class="form-control" value="<?php echo $nometa ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="idfil">Filiere:</label>
				            <select name="idfil" class="form-control" id="idfil">
                              <?php while($service=$resultatFil->fetch()) { ?>
                                <option value="<?php echo $service['idfil'] ?>"
                                         <?php if($idfil===$service['idfil']) echo "selected" ?>> 
                                    <?php echo $service['nomfil'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                             <label for="nom">E-mail :</label>
                            <input type="email" name="emaileta" placeholder="emaileta" class="form-control" value="<?php echo $emaileta ?>"/>
                        </div>
                        </div>
                       
                     
                       
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
    <?php
    require_once('footer/footer.html');
    ?>
</HTML>