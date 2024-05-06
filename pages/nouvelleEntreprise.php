<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteFil="select * from service";
    $resultatFil=$pdo->query($requeteFil);


     
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouvelle Entreprise</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
  
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouvelle Entreprise :</div>
                <div class="panel-body">
                    <form method="post" action="insertEntreprise.php" class="form">
                        <div class="form-group">
                             <label for="nomentre">Nom_Entreprise :</label>
                            <input type="text" name="nomentre" placeholder="nom_entreprise" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="fonction">Fonction :</label>
                            <input type="text" name="fonction" placeholder="fonction" class="form-control"/>
                        </div>
                             <div class="form-group">
                            <label for="idser">Service:</label>
				            <select name="idser" class="form-control" id="idser">
                              <?php while($service=$resultatFil->fetch()) { ?>
                                <option value="<?php echo $service['idser'] ?>"> 
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
</HTML>