<!DOCTYPE html>
<html lang="fr" prefix="og: https://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vapeur Douce</title>
  <!-- Open graph -->
  <meta property="og:title" content="Vapeur Douce" />
  <meta property="og:type" content="video.movie" />
  <meta property="og:url" content="http://localhost:8888/vapeurDouce/index.php" />
  <meta property="og:image" content="https://95deg.s3.amazonaws.com/pictures/pictures/5963/3164/7369/c401/8505/6dcc/original/carre-gabrielly.jpg?1499672931" />
  <!-- Fin Og -->

  <!-- Twitter card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@VapeurDouce">
  <meta name="twitter:creator" content="@StéphaneGabrielly">
  <meta name="twitter:title" content="Aide-mémoire pour mon livre Vapeur Douce">
  <meta name="twitter:description" content="Pour accompagner son dernier livre 'Plats gourmands, Vapeur Douce', Stéphane a réalisé une aide mémoire en ligne qui servirait à ses lecteurs.">
  <meta name="twitter:image" content="https://95deg.s3.amazonaws.com/pictures/pictures/5963/3164/7369/c401/8505/6dcc/original/carre-gabrielly.jpg?1499672931">
  <!-- Fin twitter card -->

  <meta name="description" content="Pour accompagner son dernier livre 'Plats gourmands, Vapeur Douce', Stéphane a réalisé une aide mémoire en ligne qui servirait à ses lecteurs."> 
  <!-- Méta description ==> SEO -->
  <link id="pageStyle" rel="stylesheet" href="style.css"> <!-- Lien feuille de style -->
</head>
<body>

  <header>
      <h1>VAPEUR DOUCE</h1>
      <img class="imgDesktop" src="logovapeurdouce.png" alt="Logo Vapeur Douce">
      <img class="imgMobile" src="logoVapeurdoucemobile.png" alt="Logo Vapeur Douce">
  </header>

  <div class="container1">
    <form action="search.php" method="post">
        <label for="search" class="search"></label><br>
        <input class="barreSearch" type="text" name="mot" id="mot" placeholder="Haricot rouge" autocomplete="on" required>
        <input class="btnSearch" type="submit" value="RECHERCHER">
    </form>
  </div>

  <footer>
    <p><a href="#" class="lien">Mentions légales</a> - <a href="#" class="lien">Politique de confidentialité</a></p>
  </footer>

</body>
</html>