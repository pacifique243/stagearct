<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idaff=isset($_GET['idaff'])?$_GET['idaff']:0;
    $requeteS="select * from affecter where idaff=$idaff";
    $resultatS=$pdo->query($requeteS);
    $effectuer=$resultatS->fetch();
    $datedebut=$effectuer['datedebut'];
    $datefin=$effectuer['datefin'];
    $idser=$effectuer['idser'];
    $idst=$effectuer['idst'];
   

    $requeteSt="select * from stagiaire";
    $resultatSt=$pdo->query($requeteSt);

    $requeteSe="select * from service";
    $resultatSe=$pdo->query($requeteSe);
     	
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'affecter</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <br><br>
        <div class="container">
           
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition d'Affecter :</div>
                <div class="panel-body">
                    <form method="post" action="updateEffectue.php" class="form">
						<div class="form-group">
                             <label for="idaff"></label>
                            <input type="hidden" name="idaff" class="form-control" value="<?php echo $idaff ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Date_Debut :</label>
                            <input type="date" name="datedebut" placeholder="datedebut" class="form-control" value="<?php echo $datedebut ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Date_Fin :</label>
                            <input type="date" name="datefin" placeholder="datefin" class="form-control" value="<?php echo $datefin ?>"/>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="idser">service:</label>
				            <select name="idser" class="form-control" id="idser">
                              <?php while($service=$resultatSe->fetch()) { ?>
                                <option value="<?php echo $service['idser'] ?>"
                                         <?php if($idser===$service['idser']) echo "selected" ?>> 
                                    <?php echo $service['typeser'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                       
                        <div class="form-group">
                            <label for="idst">Stagiaire:</label>
				            <select name="idst" class="form-control" id="idst">
                              <?php while($stagiaire=$resultatSt->fetch()) { ?>
                                <option value="<?php echo $stagiaire['idst'] ?>"
                                         <?php if($idst===$stagiaire['idst']) echo "selected" ?>> 
                                    <?php echo $stagiaire['nomst'] ?>
                                    <?php echo $stagiaire['prenomst'] ?>
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