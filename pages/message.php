<?php

require_once('identifier.php');
    require_once('connexiondb.php');

$utilisateursQuery = $pdo->prepare("SELECT * FROM utilisateur WHERE iduser != ? and (role='ADMIN' Or role='ETAT')");
$utilisateursQuery->execute(array($_SESSION['user']['iduser']));
$utilisateurs = $utilisateursQuery->fetchAll();

if(isset($_GET['destinataire'])) { // recuperation des messages
          $messagesQuery = $pdo->prepare("SELECT * FROM messages WHERE (id_expediteur = ? AND id_destinataire = ?) OR (id_expediteur = ? AND id_destinataire = ?)");
          $messagesQuery->execute(array(
                    $_SESSION['user']['iduser'],
                    $_GET['destinataire'],
                    $_GET['destinataire'],
                    $_SESSION['user']['iduser']
          ));
          $messages = $messagesQuery->fetchAll();

          if(isset($_POST['envoie'])) { // envoie de message
                    if(empty($_POST['contenu'])) {
                              $erreur = "Veuillez écrire le message";
                    } else {
                              $insert = $pdo->prepare('INSERT INTO messages(id_expediteur, id_destinataire, contenu) VALUES(?, ?, ?)');
                              $insert->execute(array(
                                        $_SESSION['user']['iduser'],
                                        $_GET['destinataire'],
                                        $_POST['contenu']
                              ));
                              header("Location: ".$_SERVER['HTTP_REFERER']);
                    }
          }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Tous les messages</title>
         <style>
                    .row {
                              display: flex;
                              justify-content: center;
                    }
                    .users {
                              border-right: 1px solid #ddd;
                              padding: 20px;
                    }
                    .messages {
                              padding: 20px;
                    }
                    ul {
                              list-style-type: none;
                    }
          </style> 
</head>
          <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
<body>
          <?php require('menu.php') ?>
          <br>
          <br><br><br><br><br><br>
        
          <div class="row">
                    <ul class="users">
                              <?php foreach($utilisateurs as $utilisateur) { ?>
                                        <li>
                                                  <a href="message.php?destinataire=<?php echo $utilisateur['iduser'] ?>">
                                                            <?php echo $utilisateur['email'];?>
                                                  </a>
                                        </li>
                              <?php } ?>
                    </ul>
                    <?php if(isset($_GET['destinataire'])) { ?>
                    <div class="messages">
                              <ul>
                                        <?php foreach($messages as $message) { 
                                                  if($message['id_expediteur'] == $_SESSION['user']['iduser']) { ?>
                                                            <li style="text-align: right">
                                                                      <?php echo $message['contenu'] ?>
                                                            </li>
                                                  <?php } else { ?>
                                                  <li >
                                                            <?php echo $message['contenu'] ?>
                                                  </li>
                                        <?php } } ?>
                              </ul>
                              <div class="col-md-6">
                                   <div class="container">
                                   <form action="" method="POST">
                                        <?php if(isset($erreur)) { ?>
                                                  <p style="color: red "><?php echo $erreur; ?></p>
                                        <?php } ?>
                                        <textarea placeholder="Ecrivez votre message" name="contenu"></textarea>
                                        <input type="submit" value="Envoyer" name="envoie" />
                              </form>
                                   </div>
                              </div>
                              
                    </div>
                    <?php } ?>
          </div>
          <?php
    require_once('footer/footer.html');
    ?>
</body>
</html>
<style>
     input{
          background-color: #582092;
     }
     input:hover {
                    background: blue;
                    color:black;
                    text-transform: uppercase;
          }
          input{
               margin-right: 200PX;
               border-color: #654;
               color:black;
     border: 8px solid green;
     font-weight: bolder;}
     body{
          background: #986;

     }
     

     textarea{
          width: 250px;
          height: 60px;
          border-color: #bde;
          margin-left: 120px;
          border-radius: px;
     }
     a{display: flex;
          flex-direction: row;
          color: white;
         
          width: 180px;
          height: 30px;


          
     }
