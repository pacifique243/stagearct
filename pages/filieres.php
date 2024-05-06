<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $nomfil=isset($_GET['nomfil'])?$_GET['nomfil']:"";
    $idst=isset($_GET['idst'])?$_GET['idst']:0;
   $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteSt="select * from stagiaire";

   	
    if($idst==0){
        $requetetFil="select idfil,nomfil,nomst,prenomst
                from stagiaire as f,filiere as e
                where f.idst=e.idst 
                and (nomfil like '%$nomfil%')
                order by idfil
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from filiere
                where nomfil like '%$nomfil%'";
    }else{
         $requetetFil="select idfil,nomfil,nomst,prenomst
                from stagiaire as f,filiere as e
                where f.idst=e.idst 
                and (nomfil like '%$nomfil%')
                and f.idst=$idst 
                 order by idfil
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from filiere
                where (nomfil like '%$nomfil%')
                and idfil=$idfil";
    }

    $resultattagiaire=$pdo->query($requeteSt);
   
    $resultatFiliere=$pdo->query($requetetFil);
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
        <title>Gestion des Filiere</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des Fileieres</div>
				
				<div class="panel-body">
					<form method="get" action="filieres.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomfil" 
                                   placeholder="nomfil"
                                   class="form-control"
                                   value="<?php echo $nomfil ?>"/>
                        </div>
                            <label for="idst">Stagiaire:</label>
                            
				            <select name="idst" class="form-control" id="idst"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les Stagiaires</option>
                                    
                                <?php while ($filiere=$resultattagiaire->fetch()) { ?>
                                
                                    <option value="<?php echo $filiere['idst'] ?>"
                                    
                                        <?php if($filiere['idst']===$idst) echo "selected" ?>>
                                        
                                        <?php echo $filiere['nomst'] ?>   
                                        <?php echo $filiere['prenomst'] ?>                                                      
                                    </option>
                                    
                                <?php } ?>
                                
                            </select>
                           
    
   
                      <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN' or $_SESSION['user']['role']== 'ETAT') {?>
                         
                            <a href="nouvelleFiliere.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                nouvelle Filiere 
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des filiere (<?php echo $nbrStagiaire ?> Filiere)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                 <th>Filiere</th> <th>Stagiaire</th> 
                                 
                                <?php if ($_SESSION['user']['role']== 'ADMIN' or $_SESSION['user']['role']== 'ETAT') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($stagiaire=$resultatFiliere->fetch()){ ?>
                                <tr>
                                 
                                    <td><?php echo $stagiaire['nomfil'] ?> </td>
                                    <td><?php echo $stagiaire['nomst'] ?> 
                                     <?php echo $stagiaire['prenomst'] ?> </td> 

                                <?php if ($_SESSION['user']['role']== 'ADMIN' or $_SESSION['user']['role']== 'ETAT') {?>
                                        <td>
                                            <a href="editerFiliere.php?idfil=<?php echo $stagiaire['idfil'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le Filiere')"
                                            href="supprimerFiliere.php?idfil=<?php echo $stagiaire['idfil'] ?>">
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
            <a href="filieres.php?page=<?php echo $i;?>&nomfil=<?php echo $nomfil ?>&idst=<?php echo $idst ?>">
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
