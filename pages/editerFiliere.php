

<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idfil=isset($_GET['idfil'])?$_GET['idfil']:0;
    $requeteFil="select * from filiere where idfil=$idfil";
    $resultatFil=$pdo->query($requeteFil);
    $etablissement=$resultatFil->fetch();
    $nomfil=$etablissement['nomfil'];
    $idst=$etablissement['idst'];
   

    $requeteSt="select * from stagiaire";
    $resultatSt=$pdo->query($requeteSt);

  
    $resultatSe=$pdo->query($requeteFil);
	 	
?>

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition Filiere</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
           
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de Filiere :</div>
                <div class="panel-body">
                    <form method="post" action="updateFiliere.php" class="form">
						<div class="form-group">
                             <label for="idfil">id : <?php echo $idfil ?></label>
                            <input type="hidden" name="idfil" class="form-control" value="<?php echo $idfil ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nomfil">Nomfil :</label>
                            <input type="text" name="nomfil" placeholder="nomfil" class="form-control" value="<?php echo $nomfil ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="idst">Stagiaire:</label>
				            <select name="idst" class="form-control" id="idst">
                              <?php while($stg=$resultatSt->fetch()) { ?>
                                <option value="<?php echo $stg['idst'] ?>"
                                         <?php if($idst===$stg['idst']) echo "selected" ?>> 
                                    <?php echo $stg['nomst'] ?>
                                </option>
                              <?php }?>
				            </select>
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