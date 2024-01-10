<?php
include "../ACCESS/connexion.php";
session_start();
function check_login($con)
{
  if (isset($_SESSION['email'])) {
    $user = $_SESSION['email'];
    $query = "SELECT * FROM admin WHERE email='$user' LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_assoc($result);
      return $data;
    }


  } else {
    header("location: ../ACCESS/admin_log.php");
  }
}
$user_data = check_login($con);

$sql = "SELECT * FROM reservation ";
$resultat = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="adminis.css">
</head>
<body>
    <nav>
    <h2 id="espace">Espace ADMINIS</h2>
        
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
    <h1>Bonjour <span> Administrateur </span></h1>
    <h2>Bienvenue dans votre espace Dashboard; </h2>
    <form class="order">
      <h2> A propos des reservation :</h2>
      <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
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
          echo "<td>" . $row["client"] . "</td>";
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
      <h2>Approver une reservation .</h2>
      <br>
      <div id="click">
        <form id="update" action="update.php" method="post"></form>
        
          <label for="id"><b>identifiant de commande :</b></label>
          <input type="text" name="id" id="update">
          <label for="state"><b>Statut de commande :</b></label>
          <input type="text" name="state" id="update">
          <label for="prix"><b>prix total de la commande :</b></label>
          <input type="text" name="prix" id="update">
            <br>
          <button type="submit" class="add" >Mettre à jour</button>
        </form>
      </div>
  </section>
  
<script src="/index.js"></script>
</body>
</html>

