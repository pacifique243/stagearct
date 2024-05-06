<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouveau stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="insertStagiaire.php" class="form"  enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nomst" placeholder="Nom" class="form-control"/>
                        </div>

                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenomst" placeholder="Prénom" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="sexe">Sexe :</label>
                            <div class="radio">
                                <label><input type="radio" name="sexe" value="F" checked/> F </label><br>
                                <label><input type="radio" name="sexe" value="M"/> M </label>
                            </div>

                        </div>
                      
                       
                        <div class="form-group">
                             <label for="prenom">Email :</label>
                            <input type="text" name="emailst" placeholder="email" class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="nationalite">Nationalite :</label>
                            <select name="nationalite" class="form-control">
                            <option  value="RDC">RDC</option>
                            <option  value="Burundi">Burundi</option>
                            <option  value="Rwanda">Rwanda</option>
                            <option  value="Tanzanie">Tanzanie</option>
                            <option  value="Angola">Angola</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                             <label for="telephone">Telephone :</label>
                            <input type="text" name="telephone" placeholder="telephone" class="form-control"/>
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
</HTML>