<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
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

<meta name="description" content="Pour accompagner son dernier livre 'Plats gourmands, Vapeur Douce', Stéphane a réalisé une aide mémoire en ligne qui servirait à ses lecteurs."> <!-- Méta description ==> SEO -->
<link id="pageStyle" rel="stylesheet" href="style2.css"> <!-- Lien feuille de style -->
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
    
<?php
if (isset($_POST['mot'])) { // Vérifie si une variable est déclarée et différente de null

$search = htmlspecialchars(ucfirst($_POST['mot']), ENT_QUOTES); // Déclaration de la variable qui prend comme valeur le mot saisi dans le form en intégrant la sécurité de l'entrée
// ucfirst met une majuscule au premier caractères d'une chaine de caractère
$search = str_replace(' ', '+', $search); // fonction qui remplace les espaces en +
$search = str_replace('-', '+', $search); // fonction qui remplace les tirets en +
// On fait ça pour alléger la sensibilité à la casse 

$curl = curl_init(); // fonction qui active l'url 

curl_setopt_array($curl, [ // paramétrage de la session curl
    CURLOPT_URL => "https://api.hmz.tf/?id=$search", //récupère l'url 
    CURLOPT_RETURNTRANSFER => true, // retourne une chaine de caractère
    CURLOPT_TIMEOUT => 1, //durée d'attente avant réponse du serveur
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // force l'http/1.1

]);

$reponse = curl_exec($curl); // exécute la session curl
$reponse = json_decode($reponse, true); // Décodage du fichier json

$status = $reponse['status']; // Déclaration de la variable status pour pourvoir la vérifier par la suite


if ($status === "error") { // Vérification si le mot entrée existe dans la BDD
    echo 'Désolé, cet aliment n\'est pas dans le livre de recette...';
}
else {
    //On affiche dans le contenu dans un echo
    echo "<div class='container2'>",
         "<div class='contenu'>",
         "<h2>" . $reponse['message']['nom'] . "</h2>"; // Variable qui affiche le nom de l'aliment

    if (array_key_exists('trempage', $reponse['message']['vapeur'])) { // Condition pour vérifer si trempage existe dans le tableau sinon on l'affiche pas (ça fait un beug sinon)
        echo '<p>Trempage : ' . $reponse['message']['vapeur']['trempage'] . '</p>'; // Variable pour afficher la valeur du trempage
    }
    else {
        echo '<p>Trempage : - </p>'; // Ce qu'on affiche si il n'y a pas de trempage
    }

    if (array_key_exists('niveau d\'eau', $reponse['message']['vapeur'])) { // Condition pour vérifer si niveau d'eau existe dans le tableau sinon on l'affiche pas
        echo '<p>Niveau d\'eau : ' . $reponse['message']['vapeur']['niveau d\'eau'] . '</p>'; // Variable pour afficher la valeur du niveau d'eau
    }
    else {
        echo '<p>Niveau d\'eau : -</p>'; // Ce qu'on affiche si il n'y a pas de niveau d'eau 
    }

    echo "<p>Cuisson : " . $reponse['message']['vapeur']['cuisson'] . "</p>"; // Affichage de la cuisson
}

curl_close($curl); // fermeture de la session curl

}
else {
    echo "Veuillez saisir votre recherche !"; // Message d'erreur si il n'y a rien de saisi dans la barrre de recherche
}

?>

</div>
</div>

<footer>
    <a href="index.php" class="lien first">Retour</a>
    <p><a href="#" class="lien">Mentions légales</a> - <a href="#" class="lien">Politique de confidentialité</a></p>
</footer>


</body>
</html>