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
    <form class="order">
      <h2> A propos de mes reservation :</h2>
      <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Repas</th>
                <th>Plat principale</th>
                <th>Boisson</th>
                <th>Accomp</th>
                <th>Dessert</th>
                <th>Entree</th>
                <th>Etat RSV</th>
                <th>prix(total)</th>
            </tr>
        </thead>
        <tbody>
        <?php
      
        while ($row = mysqli_fetch_assoc($resultat)) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["date"] . "</td>";
          echo "<td>" . $row["repas"] . "</td>";
          echo "<td>" . $row["plat"] . "</td>";
          echo "<td>" . $row["boisson"] . "</td>";
          echo "<td>" . $row["accompagnement"] . "</td>";
          echo "<td>" . $row["dessert"] . "</td>";
          echo "<td>" . $row["entree"] . "</td>";
          echo "<td>" . $row["state"] . "</td>";
          echo "<td>" . $row["prix"] . "</td>";
          echo "</tr>";
        }
        
        ?>
        </tbody>
      </table>
      <br>
      <h2>Quoi de neuf ?</h2>
      <br>
      <div id="click">
        <a class="add" href="addRSV.php">Ajouter une reservation</a>
        <a class="update" href="updateRSV.php">Modifier une reservation </a>
      </div>
  </section>
  
<script src="/index.js"></script>
</body>
</html>

