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
                    <h1>Consultation du vote</h1>
                    <?php
                    include'config_db.php';
                    $con=new DBconnect();
                    $sqlRequest='select id_parti_elu,id_gouvernerat from electeur where pseudo ="'.($_SESSION['pseudo']).'"';
                    $stmt = $con->getDbCon()->prepare($sqlRequest);
                    $stmt->execute();
                    $vote=$stmt->fetch(PDO::FETCH_ASSOC);
                    if ($vote['id_parti_elu']==NULL)
                    echo '<p>vous n avez pas voter</p>';
                    else 
                    {
                        $sqlRequest='select nom_parti from partipolitique where id_parti ="'.($vote['id_parti_elu']).'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        $parti =$stmt->fetch(PDO::FETCH_ASSOC);
                        $sqlRequest='select nom_gouvernerat from gouvernerat where id_gouvernerat ="'.($vote['id_gouvernerat']).'"';
                        $stmt = $con->getDbCon()->prepare($sqlRequest);
                        $stmt->execute();
                        $gouv = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo '<p>'.$_SESSION['pseudo'].' vous avez voter pour '.$parti['nom_parti'].' dans le gouvernerat de '.$gouv['nom_gouvernerat'].'</p>';
                    }
                    ?>
                     <form  method="post" action="supprimervote.php" >
                     <table align="center"><tr><td><br> <input type="submit" value="supprimer vote" /></td></tr></table>
                     </form>
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