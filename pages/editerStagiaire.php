<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idst=isset($_GET['idst'])?$_GET['idst']:0;
    $requeteS="select * from stagiaire where idst=$idst";
    $resultatS=$pdo->query($requeteS);
    $stagiaire=$resultatS->fetch();
    $nomst=$stagiaire['nomst'];
    $prenomst=$stagiaire['prenomst'];
    $emailst=$stagiaire['emailst'];
    $nationalite=$stagiaire['nationalite'];
    $sexe=strtoupper($stagiaire['sexe']);
  
    $telephone=$stagiaire['telephone'];
    $nomPhoto=$stagiaire['photo'];

?>


<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition du stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="updateStagiaire.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idS">id du stagiaire: <?php echo $idst ?></label>
                            <input type="hidden" name="idst" class="form-control" value="<?php echo $idst ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nomst" placeholder="Nom" class="form-control" value="<?php echo $nomst ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenomst" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenomst ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">E-mail :</label>
                            <input type="email" name="emailst" placeholder="emailst" class="form-control"
                                   value="<?php echo $emailst ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Nationalite :</label>
                            <input type="text" name="nationalite" placeholder="nationalite" class="form-control"
                                   value="<?php echo $nationalite ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Sexe :</label>
                            <div class="radio">
                                <label><input type="radio" name="sexe" value="F"
                                    <?php if($sexe==="F")echo "checked" ?> checked/> F </label><br>
                                <label><input type="radio" name="sexe" value="M"
                                    <?php if($sexe==="M")echo "checked" ?>/> M </label>
                            </div>
                        </div>                  
                        <div class="form-group">
                             <label for="prenom">Telephone :</label>
                            <input type="text" name="telephone" placeholder="telephone" class="form-control"
                                   value="<?php echo $telephone ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
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