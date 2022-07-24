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
                    <h1>Page d'inscription au elections</h1>
                    <form  method="post" action="registerfunction.php" >
        <table align="center">
            <tr>
                <td><label for="pseudo">votre pseudo : </label></td>
                <td><input type="text" name="pseudo" id="pseudo" placeholder="nom d'utilisateur" required></td>
            </tr>
            <tr>
                <td><label for="mdp">votre mot de passe : </label></td>
                <td><input type="password" name="mdp" id="mdp" placeholder="mot de passe" required ></td>
            </tr>
            <tr>
            <td><label for="age">Age:</label></td>
            <td><input type="number" id="age" name="age" min="18" step="1" required></td>
            </tr>
            <tr>
                <td><label for="gouv">votre gouvernerat : </label></td>
                <td><SELECT name="gouv" size="1" required >
                    <OPTION>Tunis
                    <OPTION>Ariana
                    <OPTION>Manouba
                    <OPTION>Ben Arous 
                    <OPTION>Nabeul
                    <OPTION>Sousse
                    <OPTION>Monastir
                    <OPTION>Mahdia
                    <OPTION>Sfax
                    <OPTION>Gabes
                    <OPTION>medenine
                    <OPTION>Tataouine
                    <OPTION>Gafsa
                    <OPTION>Touzeur
                    <OPTION>Gbili
                    <OPTION>Kairaouen
                    <OPTION>Tela
                    <OPTION>Siliena
                    <OPTION>Kef
                    <OPTION>Jandouba
                    <OPTION>Beja
                    <OPTION>Kasserine
                    <OPTION>Bizerte
                    <OPTION>Zaghouen
                    </SELECT></td>
            </tr>
            <tr><td align="center"><br><input type="reset" value="delete" /> </td>  
               <td><br> <input type="submit" value="s'inscrire" /></td></tr>
        </table>
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