<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteSe="select * from service";
    $resultatSe=$pdo->query($requeteSe);


    $requeteSt="select * from Stagiaire";
    $resultatSt=$pdo->query($requeteSt);
     
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau Affectation</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouvelle Affectation :</div>
                <div class="panel-body">
                    <form method="post" action="insertEffectue.php" class="form">
						
                        <div class="form-group">
                             <label for="datedebut">Date_Debut :</label>
                            <input type="date" name="datedebut" placeholder="datedebut" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="datefin">Date_Fin :</label>
                            <input type="date" name="datefin" placeholder="datefin" class="form-control"/>
                        </div>
                             <div class="form-group">
                            <label for="idser">Service:</label>
				            <select name="idser" class="form-control" id="idser">
                              <?php while($service=$resultatSe->fetch()) { ?>
                                <option value="<?php echo $service['idser'] ?>"> 
                                    <?php echo $service['typeser'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                   
                         <div class="form-group">
                            <label for="idst">Stagiaire:</label>
				            <select name="idst" class="form-control" id="idst">
                              <?php while($Stagiaire=$resultatSt->fetch()) { ?>
                                <option value="<?php echo $Stagiaire['idst'] ?>"> 
                                    <?php echo $Stagiaire['nomst'] ?>
                                    <?php echo $Stagiaire['prenomst'] ?>
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