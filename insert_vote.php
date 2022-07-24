<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Projet Web -Ameni Ben Jeddou</title>
    </head>
    
    <body>
        <div id="bloc_page">
            <header>
                <div id="titre_principal">
                    <div id="logo">
                        <img src="images/isie.png" alt="Logo de isie" /> 
                    </div>
                    <h3>Republique Tunisienne</h3>
                </div>
                
                <nav>
                    <ul>
                    <li><a href="index.php">Accueil</a></li>
                        <li><a href="inscription.php">S'inscrire</a></li>
                        <li><a href="Login.php">S'authentifier</a></li>
                        <li><a href="voter.php">Voter</a></li>
                        <li><a href="Consult_vote.php">Consulter votre vote</a></li>
                        <li><a href="resultat.php">Afficher resultats election</a></li>
                        <li><a href="deconnect.php">Deconnexion</a></li>
                    </ul>
                </nav>
            </header>
            
            <div id="banniere_image">
            </div>
            <section>
                <article>
                    <?php
                    include'config_db.php';
                    if ($_SESSION['pseudo']!=NULL)
                    {
                    $con=new DBconnect();
                    $sqlRequest='select id_parti_elu from electeur where pseudo ="'.($_SESSION['pseudo']).'"';
                    $stmt = $con->getDbCon()->prepare($sqlRequest);
                    $stmt->execute();
                    $vote=$stmt->fetch(PDO::FETCH_ASSOC);
                    if ($vote['id_parti_elu']==NULL)
                    { 
                        $sqlRequest='select id_parti from partipolitique where nom_parti="'.$_POST['parti'].'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        $parti =$stmt->fetch(PDO::FETCH_ASSOC);
                        $now = new DateTime();
                        $date_elect=$now->format('Y-m-d H:i:s'); 
                        $sqlRequest='update electeur set id_parti_elu="'.$parti['id_parti'].'",date_derniere_election="'.$date_elect.'" where pseudo ="'.($_SESSION['pseudo']).'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        $sqlRequest='select id_parti_elu,id_gouvernerat from electeur where pseudo ="'.($_SESSION['pseudo']).'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        $voix =$stmt->fetch(PDO::FETCH_ASSOC);
                        $sqlRequest='select nombre_voix from voix where id_parti ="'.($voix['id_parti_elu']).'"AND id_gouvernerat="'.($voix['id_gouvernerat']).'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        $nbr_vote =$stmt->fetch(PDO::FETCH_ASSOC);
                        $nbr_vote['nombre_voix']+=1;
                        $sqlRequest='update voix set nombre_voix="'. $nbr_vote['nombre_voix'].'" where id_parti ="'.($voix['id_parti_elu']).'"AND id_gouvernerat="'.($voix['id_gouvernerat']).'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        echo '<p>vote bien inserer</p>';
                    }
                    else 
                    echo '<p>vous avez deja voter veuillez supprimer votre vote et ressayer</p>';
                    }
                    else 
                    echo '<p>vous devez s authentifier pour pour voter</p>';
                    ?>
                </article>
            </section>
            <footer>
                <div id="follow">
                    <h1>Suivez-nous</h1>
                    <img src="images/facebook.png" alt="Logo de facebook" />
                </div>
                <div id="chambre_rep">
                    <h1>Chambre des representants</h1>
                    <p><img src="images/C.representant1.jpg" alt="photo1" /><img src="images/C.representant2.jpg" alt="photo2" /></p>
                </div>
                <div id="links">
                    <h1>Liens Utiles</h1>
                    <div id="list_links">
                        <ul>
                            <li><a href="#">Instance superieure independante des elections</a></li>
                            <li><a href="#">Chambre des representants du peuple</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>