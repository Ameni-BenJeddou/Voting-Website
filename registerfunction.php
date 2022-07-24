<?php
    include'config_db.php';
    session_start();
    $con=new DBconnect();
    $sqlRequest='select id_gouvernerat from gouvernerat where nom_gouvernerat ="'.($_POST['gouv']).'"';
    $stmt = $con->getDbCon()->prepare($sqlRequest);
    $stmt->execute();
    $gouvernerat=$stmt->fetch(PDO::FETCH_ASSOC);
    $data_elect=["pseudo" =>($_POST['pseudo']),"mot_de_passe" => ($_POST['mdp']),"age"=>($_POST['age']),"id_gouvernerat" =>$gouvernerat['id_gouvernerat']];
    $test=$con->insert("electeur",$data_elect);
    if($test)
    {$username=$_POST['pseudo'];
    $_SESSION['pseudo']=$username;
    header("Location: welcome_elect.php");
    }
    else echo 'oops il y a un problem d authentification';
?>
