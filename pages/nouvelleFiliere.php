
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteSt="select * from stagiaire";
    $resultatSt=$pdo->query($requeteSt);


     
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouvelle stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
   
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouvelle etablissement :</div>
                <div class="panel-body">
                    <form method="post" action="insertFiliere.php" class="form">
						
                        <div class="form-group">
                             <label for="nomfil">Nom :</label>
                            <input type="text" name="nomfil" placeholder="nomfil" class="form-control"/>
                        </div>
                        
                             <div class="form-group">
                            <label for="idst">Stagiaire:</label>
				            <select name="idst" class="form-control" id="idst">
                              <?php while($stg=$resultatSt->fetch()) { ?>
                                <option value="<?php echo $stg['idst'] ?>"> 
                                    <?php echo $stg['nomst'] ?>
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
</HTML>