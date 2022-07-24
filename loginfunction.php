<?php
include'config_db.php';
session_start();
$con = new DBconnect();
$username = ($_POST['pseudo']);
$mdp =($_POST['mdp']);
$sqlr = 'select * from electeur where pseudo ="'.($username).'"AND mot_de_passe ="'.($mdp).'"';
$stmt = $con->getDbCon()->prepare($sqlr);
$stmt->execute();
if ($stmt->rowCount()==1)
{$_SESSION['pseudo']=$username;
header("Location: welcome_elect.php");
}
else echo 'invalid account please retry';
?>