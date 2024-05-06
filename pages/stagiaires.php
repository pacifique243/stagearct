<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    if($nomPrenom!=""){
        $requete="select * from stagiaire
                where nomst like '%$nomPrenom%' or prenomst like '%$nomPrenom%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from stagiaire
                where nomst like '%$nomPrenom%' or prenomst like '%$nomPrenom%'";
    }
    else{
         $requete="select * from stagiaire
                where nomst like '%$nomPrenom%' or prenomst like '%$nomPrenom%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from stagiaire
                where nomst like '%$nomPrenom%' or prenomst like '%$nomPrenom%'";
    }
 
    $resultat=$pdo->query($requete);
    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrFiliere=$tabCount['countF'];
    $reste=$nbrFiliere % $size;  
    if($reste===0)
        $nbrPage=$nbrFiliere/$size;   
    else
        $nbrPage=floor($nbrFiliere/$size)+1; 
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des stagiaires</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
   
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des stagiaires</div>
				
				<div class="panel-body">
					<form method="get" action="stagiaires.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>
                           
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN' Or $_SESSION['user']['role']== 'ETAT') {?>
                         
                            <a href="nouveauStagiaire.php" class="btn btn-success">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Stagiaire
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Stagiaires (<?php echo $nbrFiliere ?> Stagiaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th> <th>Prénom</th> 
                                <th>E-mail</th><th>Nationalite</th><th>Sexe</th>
                                <th>Telephone</th> <th>Photo</th> 
                                <?php if ($_SESSION['user']['role']== 'ADMIN' Or $_SESSION['user']['role']== 'ETAT') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                       
                        <tbody>
                            <?php while($stagiaire=$resultat->fetch()){ ?>
                                <tr>
                                    
                                    <td><?php echo $stagiaire['nomst'] ?> </td>
                                    <td><?php echo $stagiaire['prenomst'] ?> </td> 
                                    <td><?php echo $stagiaire['emailst'] ?> </td>
                                    <td><?php echo $stagiaire['nationalite'] ?> </td>
                                    <td><?php echo $stagiaire['sexe'] ?> </td>
                                    <td><?php echo $stagiaire['telephone'] ?> </td>
                                    <td>
                                        <img src="../images/<?php echo $stagiaire['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                    
                                     <?php if ($_SESSION['user']['role']== 'ADMIN' Or $_SESSION['user']['role']== 'ETAT') {?>
                                        <td>
                                            <a href="editerStagiaire.php?idst=<?php echo $stagiaire['idst'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le stagiaire')"
                                            href="supprimerStagiaire.php?idst=<?php echo $stagiaire['idst'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                 </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="stagiaires.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    require_once('footer/footer.html');
    ?>
</HTML>
