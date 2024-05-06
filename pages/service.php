 
<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    $typeser=isset($_GET['typeser'])?$_GET['typeser']:"";
    
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    if($typeser!=""){
        $requete="select * from service
                where typeser like '%$typeser%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from service
                where typeser like '%$typeser%'";
    }
    else{
         $requete="select * from service
                where typeser like '%$typeser%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from service
                where typeser like '%$typeser%'";
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
        <title>Gestion des service</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
       
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Rechercher des services</div>
				<div class="panel-body">
					
					<form method="get" action="service.php" class="form-inline">
					
						<div class="form-group">
                     	
                            <input type="text" name="typeser" 
                                   placeholder="Type de service"
                                   class="form-control"
                                   value="<?php echo $typeser ?>"/>
                                   
                        </div>
                     
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['user']['role']=='ADMIN') {?>
                       	
                            <a href="nouvelleservice.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouvelle Service
                                
                            </a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des service (<?php echo $nbrFiliere ?> service)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Type_service</th>
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($service=$resultat->fetch()){ ?>
                                <tr>
                               
                                    <td><?php echo $service['typeser'] ?> </td>
                               
                                    
                                     <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerservice.php?idser=<?php echo $service['idser'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le service')"
                                                href="supprimerservice.php?idser=<?php echo $service['idser'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>

                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
                              <a href="service.php?page=<?php echo $i;?>&Type_service=<?php echo $typeser ?>">
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