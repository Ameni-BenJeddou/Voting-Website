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
                    $con=new DBconnect();
                    $sqlRequest='select id_parti_elu,id_gouvernerat from electeur where pseudo ="'.($_SESSION['pseudo']).'"';
                    $stmt = $con->getDbCon()->prepare($sqlRequest);
                    $stmt->execute();
                    $voix =$stmt->fetch(PDO::FETCH_ASSOC);
                    $sqlRequest='update electeur set id_parti_elu=null,date_derniere_election=null where pseudo ="'.($_SESSION['pseudo']).'"';
                    $stmt = $con->getDbCon()->prepare($sqlRequest);
                    $stmt->execute();
                    $sqlRequest='select nombre_voix from voix where id_parti ="'.($voix['id_parti_elu']).'"AND id_gouvernerat="'.($voix['id_gouvernerat']).'"';
                    $stmt = $con->getDbCon()->prepare($sqlRequest);
                    $stmt->execute();
                    $nbr_vote =$stmt->fetch(PDO::FETCH_ASSOC);
                    if ($stmt->rowCount()>0)
                    {$nbr_vote['nombre_voix']-=1;
                    $sqlRequest='update voix set nombre_voix="'. $nbr_vote['nombre_voix'].'" where id_parti ="'.($voix['id_parti_elu']).'"AND id_gouvernerat="'.($voix['id_gouvernerat']).'"';
                    $stmt = $con->getDbCon()->prepare($sqlRequest);
                    $stmt->execute();
                    echo"<h3>vote supprimer avec success vous pouvez voter du nouveau</h3>";
                    }
                    else                     
                    echo"<h3>vous n'avez pas de vote a supprimer</h3>";

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