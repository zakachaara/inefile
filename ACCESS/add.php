<!-- dealing with the form using php -->
<!-- Ajout de commande -->
<?php
ob_start();
include '../CMD/addRSV.php';
include 'connexion.php';
$user = $_SESSION['username'];
if ($_POST && isset($_POST['jour'], $_POST['repas'], $_POST['pprincipale'], $_POST['accom'], $_POST['entree'], $_POST['boisson'], $_POST['dessert'])) {

    $jour = $_POST['jour'];
    $repas = $_POST['repas'];
    $pprincipale = $_POST['pprincipale'];
    $accom = $_POST['accom'];
    $boisson =  $_POST['boisson'];
    $dessert = $_POST['dessert'];
    $entree =  $_POST['entree'];
    $sql = "INSERT INTO reservation (client , repas , date , entree, accompagnement, plat, boisson, dessert, state , prix ) VALUES ('$user','$repas', '$jour', '$entree', '$accom', '$pprincipale','$boisson','$dessert','En attente',0)";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION['reservation_state'] = "Reserved Successfully";
        header("location:../CMD/index.php");
    }
    else {
        $_SESSION['reservation_state'] = "Reservation not complited";
    }
}
?>
