	
<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idser=isset($_GET['idser'])?$_GET['idser']:0;
    $requete="select * from service where idser=$idser";
    $resultat=$pdo->query($requete);
    $service=$resultat->fetch();
    $typeser=$service['typeser'];
?>
	
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition de service</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
   	    
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de service :</div>
                <div class="panel-body">
                    <form method="post" action="updateservice.php" class="form">
						<div class="form-group">
                             <label for="niveau">id de service: <?php echo $idser ?></label>
                            <input type="hidden" name="idser" 
                                   class="form-control"
                                    value="<?php echo $idser ?>"/>
                        </div>
                       
                        <div class="form-group">
                             <label for="niveau">Nom du dervice:</label>
                            <input type="text" name="typeser" 
                                   placeholder="Nom du service"
                                   class="form-control"
                                   value="<?php echo $typeser ?>"/>
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