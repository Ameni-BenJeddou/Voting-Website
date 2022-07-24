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
                $sqlRequest='select nbr_sieges from gouvernerat ';
                $stmt = $con->getDbCon()->prepare($sqlRequest);
                $stmt->execute();
                $siege=$stmt->fetchAll();
                $sqlRequest='select nombre_voix from voix ';
                $stmt = $con->getDbCon()->prepare($sqlRequest);
                $stmt->execute();
                $voix=$stmt->fetchAll();
                $sqlRequest='select nom_parti from partipolitique ';
                $stmt = $con->getDbCon()->prepare($sqlRequest);
                $stmt->execute();
                $nom_parti=$stmt->fetchAll();
                $sqlRequest='select nom_gouvernerat from gouvernerat ';
                $stmt = $con->getDbCon()->prepare($sqlRequest);
                $stmt->execute();
                $nom_gouvernerat=$stmt->fetchAll();
                $nbr_siege_national_parti=[0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0];
                $str="<table border=1><tr><th></th>";
                for ($k=0;$k<=6;$k++)
                {
                    $str.="<th>".$nom_parti[$k][0]."</th>";
                }
                $str.="<th>Total des sieges</th></tr>";
                for($i=0;$i<=23;$i++)
                {
                    $voix_gouv=0;
                    for($j=0;$j<=6;$j++)
                    {
                        $voix_gouv+=$voix[($i*7)+$j][0];
                        $voix_parti[$j]=$voix[($i*7)+$j][0];
                    }
                    $quotient[$i]=(int)($voix_gouv/$siege[$i][0]);
                    $siege_donne=0;
                    for($j=0;$j<=6;$j++)
                    {
                        $nbr_siege_par_parti[$j]=(int)($voix_parti[$j]/$quotient[$i]);
                        $nbr_siege_national_parti[$j]+=$nbr_siege_par_parti[$j];
                        $siege_donne+=$nbr_siege_par_parti[$j];
                        $rest[$j]=$voix_parti[$j]%$quotient[$i];
                    } 
                    $rest_vote=["0"=>$rest[0],"1"=>$rest[1],"2"=>$rest[2],"3"=>$rest[3],"4"=>$rest[4],"5"=>$rest[5],
                    "6"=>$rest[6]];
                    asort($rest_vote);
                    while ($siege_donne<$siege[$i][0])
                    {
                        foreach ($rest_vote as $key => $val) {
                            $top_rest=$val;
                            $key_parti=$key;
                        }
                        $rest_vote[$key_parti]=0;
                        $nbr_siege_par_parti[$key_parti]+=1;
                        $siege_donne+=1;
                        arsort($rest_vote);
                    }
                    $str.="<tr><th>".$nom_gouvernerat[$i][0]."</th>";
                    for($j=0;$j<=6;$j++)
                    {
                        $str.="<td>".$nbr_siege_par_parti[$j]."</td>";
                    }
                    $str.="<td>".$siege[$i][0]."</td></tr>";
                }
                $str.="</table>";
                echo ($str);
                $str2="<br><br><table border=1><tr>";
                for ($k=0;$k<=6;$k++)
                {
                    $str2.="<th>".$nom_parti[$k][0]."</th>";
                }
                $str2.="</tr><tr>";
                for ($n=0;$n<=6;$n++)
                {
                    $str2.="<td>".$nbr_siege_national_parti[$n]."</td>";
                }
                $str2.="</tr></table>";
                echo($str2);



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