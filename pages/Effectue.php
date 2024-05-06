<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  

    $idser=isset($_GET['idser'])?$_GET['idser']:0;
    $idst=isset($_GET['idst'])?$_GET['idst']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteSe="select * from service";
    	
    $requeteSt="select * from stagiaire";

    if($idser==0){
        $requeteEffectue="select idaff,datedebut,datefin,typeser,nomst,prenomst
                from service as Se,stagiaire as St,affecter as E
                where Se.idser=E.idser and St.idst=E.idst
               
                order by idaff
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from affecter";
    }else{
         $requeteStagiaire="select idaff,datedebut,datefin,typeser,nomst,prenomst
                from service as Se,stagiaire as St,affecter as E
                where Se.idser=E.idser and St.idst=E.idst
                and Se.idser=$idser and St.idst=$idst
                 order by idaff
                limit $size
                offset $offset";
               
        $requeteCount="select count(*) countS from affecter
                where idser=$idser and idst=$idst";
    }	
$resultatService=$pdo->query($requeteSe);
    $resultatStagiaire=$pdo->query($requeteSt);
    $resultateffectue=$pdo->query($requeteEffectue);
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
            
				<div class="panel-heading">Rechercher des affectation</div>
				
				<div class="panel-body">
					<form method="get" action="Effectue.php" class="form-inline">
					
                           
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                         
                            <a href="nouvelleEffectue.php" class="btn btn-primary">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouvelle Effectuation
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
           
            <div class="panel panel-primary">
                <div class="panel-heading">Liste d'Affectation (<?php echo $nbrStagiaire ?> Affecter)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date_Debut</th> <th>Date_Fin</th>
                                <th>Service</th><th>Stagiaire</th>
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <?php while($effectue=$resultateffectue->fetch()){ ?>
                                <tr>
                                   
                                    <td><?php echo $effectue['datedebut'] ?> </td>
                                    <td><?php echo $effectue['datefin'] ?> </td>
                                    <td><?php echo $effectue['typeser'] ?> </td> 
                                    <td><?php echo $effectue['nomst'] ?> 
                                    <?php echo $effectue['prenomst'] ?> 
                                  

                                    </td>
                                     <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerEffectue.php?idaff=<?php echo $effectue['idaff'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer l affectation')"
                                            href="supprimerEffectue.php?idaff=<?php echo $effectue['idaff'] ?>">
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
            <a href="Effectue.php?page=<?php echo $i;?>&idservice=<?php echo $idser ?>&idStagiaire=<?php echo $idst ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <?php   
        
?>
    </body>
    <?php
    require_once('footer/footer.html');
    ?>
</HTML>
