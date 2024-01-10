<?php
include "../ACCESS/connexion.php";
session_start();
function check_login($con)
{
  if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $query = "SELECT * FROM client WHERE username='$user' LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_assoc($result);
      return $data;
    }


  } else {
    header("location: OFD_log.php");
  }
}
$user_data = check_login($con);

$client= $user_data['username'];
$sql = "SELECT * FROM reservation where client ='$client'";
$resultat = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Résultat du Formulaire</title>
  <link rel="stylesheet" href="index_style.css">
</head>
<body>
    <nav>
    <h2 id="espace">Espace O'FOOD</h2>
        <a href="">Mes reservation</a>
        <!-- <a href="">About</a>
        <a href="">Services</a> -->
        <a href="">
        <?php
          
              echo '<form action="../ACCESS/deconnexion.php" method="post">';
              echo '<input type="submit" value="Déconnexion">';
              echo '</form>';
          
          ?>
        </a>
    </nav>
  <section class="home">
    <h1>Bonjour <?php $name = $user_data['name'];
    echo "<span> $name </span>" ;?> </h1>
    <h2>Bienvenue dans votre espace O'FOOD; </h2>
    <h3>Explorez le monde des saveurs avec nous : Réservez vos repas, savourez l'instant!</h3>
    <form class="order" action="../ACCESS/update.php">
      <h2>Modifier une reservation en se baseant sur son identifiant</h2>
      <div id="update">
        <label for="update"><b>identifiant de commande :</b></label>
        <input type="text" name="update" id="update">
      </div>
      <br>
      <div class="init">
          <div>
              <label for="jour"> <b>Choisir le Jour:</b></label><br>
              <input type="date" name="jour" id="choixDate">
          </div>
          <br>
          <div>
            <label for="repas"><b>Repas:</b></label><br>
            <select name="repas" >
                <option >Petit-déjeuner</option>
                <option >Déjeuner</option>
                <option >Dîner</option>
            </select>
          </div>
        </div>
        <h3>Personnalisez votre repas comme un Chef !</h3>
        <div class="cmd">
          <div>
            <label for="entree"><b>Entrée:</b></label><br>
            <select name="entree" >
                <option >Soupe</option>
                <option >Salade</option>
                <option >Hors-d'œuvre </option>
            </select>
          </div>
          <div>
            <label for="boisson"><b>Boissons:</b></label><br>
            <select name="boisson" >
                <option >Eau</option>
                <option >Jus de fruits</option>
                <option >Cola</option>
            </select>
          </div>

          <div>
            <label for="accom"><b>Accompagnements:</b></label><br>
            <select name="accom" >
                <option >Le riz</option>
                <option >Les pâtes</option>
                <option >les pommes de terre</option>
            </select>
          </div>

          <div>
            <label for="pprincipale"><b>Plat principal:</b></label><br>
            <select name="pprincipale" >
                <option >Tajine</option>
                <option >Couscous</option>
                <option >Pastilla </option>
                <option >Harira </option>
                <option >Seffa </option>
                <option >Pizza </option>

            </select>
          </div>
          <div> 
            <label for="dessert"><b>Dessert:</b></label><br>
            <select name="dessert" >
                <option >Gâteaux</option>
                <option >Pâtisseries</option>
                <option >Glace</option>
                <option >Fruits</option>

            </select>
          </div>
        </div>
        <div class="sbmt">
          <input id="sbmt" type="submit" value="Submit">
          <a class="cancel" href="index.php"> Annuler</a>
        </div> 
    </form>
  </section>
  
<script src="/index.js"></script>
</body>
</html>

