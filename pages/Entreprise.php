
<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nomentre=isset($_GET['nomentre'])?$_GET['nomentre']:"";
    $idser=isset($_GET['idser'])?$_GET['idser']:0;
  
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere="select * from service";

   	
    if($idser==0){
        $requetetagiaire="select identre,nomentre,fonction,typeser
                from service as f,entreprise as e
                where f.idser=e.idser 
                and (nomentre like '%$nomentre%')
                order by identre
                limit $size
                offset $offset";
               
        $requeteCount="select count(*) countS from entreprise
                where nomentre like '%$nomentre%'";
    }else{
         $requetetagiaire="select  identre,nomentre,fonction,typeser 
                from service as f,entreprise as e
                where f.idser=e.idser 
                and (nomentre like '%$nomentre%')
                and f.idser=$idser 
                 order by identre
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from entreprise
                where (nomentre like '%$nomentre%')
                and idser=$idser";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
  
    $resultattagiaire=$pdo->query($requetetagiaire);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste===0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Entreprises</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des Entreprises</div>
				
				<div class="panel-body">
					<form method="get" action="Entreprise.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomentre" 
                                   placeholder="nomentre"
                                   class="form-control"
                                   value="<?php echo $nomentre ?>"/>
                        </div>
                            <label for="idser">Service:</label>
                            
				            <select name="idser" class="form-control" id="idser"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les services</option>
                                    
                                <?php while ($filiere=$resultatFiliere->fetch()) { ?>
                                
                                    <option value="<?php echo $filiere['idser'] ?>"
                                    
                                        <?php if($filiere['idser']===$idser) echo "selected" ?>>
                                        
                                        <?php echo $filiere['typeser'] ?>                                                        
                                    </option>
                                    
                                <?php } ?>
                                
                            </select>
                      <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                         
                            <a href="nouvelleEntreprise.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                nouvelle Entreprise 
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Entreprises (<?php echo $nbrStagiaire ?> entreprises)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                 <th>Nom_Entreprise</th> <th>Fonction</th> 
                                <th>Service</th> 
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                     
                        <tbody>
                            <?php while($stagiaire=$resultattagiaire->fetch()){ ?>
                                <tr>
                                   
                                    <td><?php echo $stagiaire['nomentre'] ?> </td>
                                    <td><?php echo $stagiaire['fonction'] ?> </td> 
                                    <td><?php echo $stagiaire['typeser'] ?> </td>
                                  
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerEntreprise.php?identre=<?php echo $stagiaire['identre'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le stagiaire')"
                                            href="supprimerEntreprise.php?identre=<?php echo $stagiaire['identre'] ?>">
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
            <a href="Etreprise.php?page=<?php echo $i;?>&nomentre=<?php echo $nomentre ?>&Service=<?php echo $idser ?>">
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
