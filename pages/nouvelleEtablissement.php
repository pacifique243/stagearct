
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteFil="select * from filiere";
    $resultatFil=$pdo->query($requeteFil);


     
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouvelle Etablissemnet</title>
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
                    <form method="post" action="insertEtablissement.php" class="form">
						
                        <div class="form-group">
                             <label for="nometa">Nom_Etablissement :</label>
                            <input type="text" name="nometa" placeholder="Nom_Etablissement" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="adressetat">Adress_Etablissement :</label>
                            <input type="text" name="adressetat" placeholder="adressetat" class="form-control"/>
                        </div>
                             <div class="form-group">
                            <label for="idfil">Filiere:</label>
				            <select name="idfil" class="form-control" id="idfil">
                              <?php while($service=$resultatFil->fetch()) { ?>
                                <option value="<?php echo $service['idfil'] ?>"> 
                                    <?php echo $service['nomfil'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                             <label for="emaileta">E-mail :</label>
                            <input type="email" name="emaileta" placeholder="emaileta" class="form-control"/>
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