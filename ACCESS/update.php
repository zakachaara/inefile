<!-- dealing with the form using php -->
<!-- Modifie de commande -->
<?php
ob_start();
include '../CMD/addRSV.php';
include 'connexion.php';
$user = $_SESSION['username'];
if ($_POST && isset($_POST['update'],$_POST['jour'], $_POST['repas'], $_POST['pprincipale'], $_POST['accom'], $_POST['entree'], $_POST['boisson'], $_POST['dessert'])) {
    $id = $_POST['update'];
    $jour = $_POST['jour'];
    $repas = $_POST['repas'];
    $pprincipale = $_POST['pprincipale'];
    $accom = $_POST['accom'];
    $boisson =  $_POST['boisson'];
    $dessert = $_POST['dessert'];
    $entree =  $_POST['entree'];
    $sql = "UPDATE reservation SET client ='$user' , repas= '$repas', date='$jour' , entree='$entree', accompagnement='$accom', plat='$pprincipale', boisson='$boisson', dessert='$dessert' where id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION['reservation_state'] = "updated Successfully";
        header("location:../CMD/index.php");
    }
    else {
        $_SESSION['reservation_state'] = "update not complited";
    }
}
?>
