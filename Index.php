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
                    <h1><img src="images/ico_epingle.png" alt="chambre representant" id="epingle" />Description</h1>
                    <p>Ceci est un site d'election fictive en ligne ,permettant a des electeurs anonymes d'elire les membres du parliment. Un electuer pourra a tout moment retirer son vote ou le modifier. Il pourra aussi a tout moment afficher les resultats instantanées des elections qui prennent en compte tout les electeurs sur le Web </p>
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