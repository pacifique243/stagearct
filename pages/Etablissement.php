<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nometa=isset($_GET['nometa'])?$_GET['nometa']:"";
    $idfil=isset($_GET['idfil'])?$_GET['idfil']:0;
  
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere="select * from filiere";

   	
    if($idfil==0){
        $requetetagiaire="select ideta,nometa,adressetat,nomfil,emaileta 
                from filiere as f,etablissement as e
                where f.idfil=e.idfil 
                and (nometa like '%$nometa%')
                order by ideta
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from etablissement
                where nometa like '%$nometa%'";
    }else{
         $requetetagiaire="select ideta,nometa,adressetat,nomfil,emaileta 
                from filiere as f,etablissement as e
                where f.idfil=e.idfil 
                and (nometa like '%$nometa%')
                and f.idfil=$idfil 
                 order by ideta
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from etablissement
                where (nometa like '%$nometa%')
                and idfil=$idfil";
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
        <title>Gestion des stagiaires</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des etablissements</div>
				
				<div class="panel-body">
					<form method="get" action="Etablissement.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nometa" 
                                   placeholder="nometa"
                                   class="form-control"
                                   value="<?php echo $nometa ?>"/>
                        </div>
                            <label for="idfil">Filière:</label>
                            
				            <select name="idfil" class="form-control" id="idfil"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les filières</option>
                                    
                                <?php while ($filiere=$resultatFiliere->fetch()) { ?>
                                
                                    <option value="<?php echo $filiere['idfil'] ?>"
                                    
                                        <?php if($filiere['idfil']===$idfil) echo "selected" ?>>
                                        
                                        <?php echo $filiere['nomfil'] ?>                                                        
                                    </option>
                                    
                                <?php } ?>
                                
                            </select>
                      <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN' or $_SESSION['user']['role']== 'ETAT') {?>
                         
                            <a href="nouvelleEtablissement.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                nouvelle Etablissement 
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Etablissement (<?php echo $nbrStagiaire ?> Etablissements)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th> <th>ADress</th> 
                                <th>Filière</th><th>E-mail</th>  
                                <?php if ($_SESSION['user']['role']== 'ADMIN' or $_SESSION['user']['role']== 'ETAT') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($stagiaire=$resultattagiaire->fetch()){ ?>
                                <tr>
                                   
                                    <td><?php echo $stagiaire['nometa'] ?> </td>
                                    <td><?php echo $stagiaire['adressetat'] ?> </td> 
                                    <td><?php echo $stagiaire['nomfil'] ?> </td>
                                    <td><?php echo $stagiaire['emaileta'] ?> </td>
                                <?php if ($_SESSION['user']['role']== 'ADMIN' or $_SESSION['user']['role']== 'ETAT') {?>
                                        <td>
                                            <a href="editerEtablissement.php?ideta=<?php echo $stagiaire['ideta'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le stagiaire')"
                                            href="supprimerEtablissement.php?ideta=<?php echo $stagiaire['ideta'] ?>">
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
            <a href="Etablissement.php?page=<?php echo $i;?>&nometa=<?php echo $nometa ?>&idfiliere=<?php echo $idfil ?>">
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
