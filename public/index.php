<?php
require_once "src/db.php";

$getNom = $pdo->prepare('SELECT nom FROM utilisateur WHERE id = :id');
$getNom->execute ([":id" => $_SESSION['id_utilisateur']]);
$nomU = $getNom->fetch()['nom'];

// session_destroy();
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>L D S H O P</title>
  </head>
  <body>
    <header>
      <h1>L D S H O P</h1>
      <a href="img/prototype-removebg-preview.png"><img src="" alt=""></a>
      <div>
        <button onclick="ouvrirpopup('co')" id="connexion">C O N N E X I O N</button>
        <button onclick="ouvrirpopup('in')" id="inscription">I N S C R I P T I O N</button>
        <button onclick="ouvrirpopup('ar')" id="panier">A R T I C L E</button>
        <button onclick="ouvrirpopup('cu')" id="panier">C O N T A C T </button>
        <button onclick="ouvrirpopup('pa')" id="panier">P A N I E R</button>
        <button onclick="ouvrirpopup('nu')" id="panier"><?= $nomU ?></button>
      </div>
    </header>

    <canvas id="Matrix"></canvas>

    <div class="popup" id="popupco">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('co')">&times;</span>
       
        <h2>C O N N E X I O N</h2>
    <form method ="post" name ="formco" action='src/actions/connexion.php'>
        <div class="formdegroupe">
          <input name="nom1" type="text" placeholder="Nom d'utilisateur" />
        </div>

        <div class="formdegroupe">
          <input name="email1" type="email" placeholder="Email" />
        </div>

        <div class="formdegroupe">
          <input name="mdp1" type="password" placeholder="Mot de passe" />
        </div>

        <div class="formdegroupe">
          <input type="submit" class="btf" onclick="fermerpopup('co')" value="C O - T O I">
        </div>
    </form>
      </div>

    </div>

    <div class="popup" id="popupin">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('in')">&times;</span>

        <h2>I N S C R I P T I O N</h2>

        <form method ="post" name ="formin" action='src/actions/inscription.php'>
        <div class="formdegroupe">
          <input name="nom" type="text" placeholder="Nom d'utilisateur" />
        </div>

        <div class="formdegroupe">
          <input name="email" type="email" placeholder="Email" />
        </div>

        <div class="formdegroupe">
          <input name="mdp" type="password" placeholder="Mot de passe" />
        </div>
        <div class="formdegroupe">
          <input name="cmdp" type="password" placeholder="Confirmer le mot de passe" />
        </div>
        <div class="formdegroupe">
          <input type="submit" class="btf" onclick="fermerpopup('in')" value="I N - T O I">
        </div>
        </form>
      </div>
    </div>

    <div class="popup" id="popupar">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('ar')">&times;</span>

        <h2>A R T I C L E</h2>
        <div class="scroller" data-speed="fast">
          <ul class="tag-list scroller__inner">
            <li>C O M M A N D E R</li>
            <li>V O T R E</li>
            <li>E Q U I P E M E N T</li>
            <li>D E</li>
            <li>R Ê V E</li>
          </ul>
        </div>

        <div class="scroller" data-direction="right" data-speed="slow">
          <div class="scroller__inner">
            <?php $getArticles = $pdo->prepare('SELECT * FROM Article');
            $getArticles->execute();
            $articles = $getArticles->fetchAll();

            foreach ($articles as $article) : ?>
              <img onclick="ouvrirpopup('<?=$article['id']?>')"src="<?=$article['image_url']?>"/>
          
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="popup" id="popupcu">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('cu')">&times;</span>

        <h2>C O N T A C T</h2>
        <div class="scroller" data-speed="fast">
          <ul class="tag-list scroller__inner">
            <li>C O N T A C T E R</li>
            <li>N O U S</li>
            <li>P O U R</li>
            <li>C O N N A I T R E</li>
            <li>L A</li>
            <li>V E R I T E R</li>
          </ul>
        </div>

        <div class="scroller" data-direction="right" data-speed="slow">
          <div class="scroller__inner">
            <?php $getContacts = $pdo->prepare('SELECT * FROM contact');
            $getContacts->execute();
            $contacts = $getContacts->fetchAll();

            foreach ($contacts as $contact) : ?>
              <a href="<?=$contact['lien']?>"><img src="<?=$contact['image_url']?>" style="width: 195px;"></a>
             
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="popup" id="popuppa">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('pa')">&times;</span>

        <h2>P A N I E R</h2>
      </div>
    </div>

    <div class="popup" id="popupnu">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('nu')">&times;</span>

        <h2><?= $nomU ?></h2>
      </div>
    </div>

    <?php 
    $getArticles = $pdo->prepare('SELECT * FROM Article');
    $getArticles->execute();
    $articles = $getArticles->fetchAll();

    foreach ($articles as $article) : ?>
    <div class="popup" id="popup<?=$article['id']?>">
      <div class="popupct">
        <span class="close" onclick="fermerpopup('<?=$article['id']?>')">&times;</span>

        <h2><?=$article['nom']?></h2>
        <h2><?=$article['stock']?></h2>
        <img src="<?=$article['image_url']?>"/>
        <h3><?=$article['prix']?> B</h3>
      </div>
    </div>
    <?php endforeach; ?>

    <script src="script.js"></script>
  </body>
</html>
