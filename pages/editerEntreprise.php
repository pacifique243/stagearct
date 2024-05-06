
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $identre=isset($_GET['identre'])?$_GET['identre']:0;
    $requeteS="select * from entreprise where identre=$identre";
    $resultatS=$pdo->query($requeteS);
    $entrer=$resultatS->fetch();
    $nomentre=$entrer['nomentre'];
    $fonction=$entrer['fonction'];
    $idser=$entrer['idser'];
   

    $requeteFil="select * from service";
    $resultatFil=$pdo->query($requeteFil);

  
    $resultatSe=$pdo->query($requeteS);
	 	
?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition Entrepriser</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
           
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition d'Entrepriser :</div>
                <div class="panel-body">
                    <form method="post" action="updateEntreprise.php" class="form">
						<div class="form-group">
                             <label for="identre">id d'Entrepriser: <?php echo $identre ?></label>
                            <input type="hidden" name="identre" class="form-control" value="<?php echo $identre ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nomentre">nom_entreprise :</label>
                            <input type="text" name="nomentre" placeholder="nomentre" class="form-control" value="<?php echo $nomentre ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="fonction">Fonction :</label>
                            <input type="text" name="fonction" placeholder="fonction" class="form-control" value="<?php echo $fonction ?>"/>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="idser">Service:</label>
				            <select name="idser" class="form-control" id="idser">
                              <?php while($service=$resultatFil->fetch()) { ?>
                                <option value="<?php echo $service['idser'] ?>"
                                         <?php if($idser===$service['idser']) echo "selected" ?>> 
                                    <?php echo $service['typeser'] ?>
                                </option>
                              <?php }?>
				            </select>
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