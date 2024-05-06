<?php
    //require_once('identifier.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	<div class="navbar-header">
		<img class="gg" src="../images/arct.jpg" alt="" width="70" height="70">
			
		</div>
		
		
		<ul class="nav navbar-nav">
	
			<li><a href="Effectue.php">
			<i class="fa fa-heart"></i>
                    &nbsp Affectation
                </a>
            </li>
			
			<?php if ($_SESSION['user']['role']=='ETAT') {?>
				<li><a href="stagiaires.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Les Stagiaires
                </a>
            </li>
			
			<li><a href="filieres.php">
                    <i class="fa fa-tags"></i>
                    &nbsp Les Filières
                </a>
            </li>
			<li><a href="message.php">
                    <i class="fa fa-tags"></i>
                    &nbsp  mesageries
                </a>
            </li>
				
			<?php }?>
			
			<?php if ($_SESSION['user']['role']=='ADMIN') {?>
				<li><a href="stagiaires.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Les Stagiaires
                </a>
            </li>
			
			<li><a href="message.php">
                    <i class="fa fa-tags"></i>
                    &nbsp  mesageries
                </a>
            </li>
			<li><a href="Etablissement.php">
			<i class="fas fa-"></i>
			&nbsp Les Etablissement
                </a>
			</li>
			<li><a href="service.php">
			<i class="fa fa-tags"></i>
                    &nbsp Service
                </a>
			</li>
		
				<li><a href="Utilisateurs.php">
                        <i class="fa fa-users"></i>
                        &nbsp Les utilisteurs
                    </a>
                </li>
				
				
			<?php }?>
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="fa fa-sign-out"></i>
					&nbsp Se déconnecter
				</a>
			</li>
					
		</ul>
		
	</div>
	
</nav>
<STYle>
	.gg {
    border-radius: 50%;
}
</STYle>