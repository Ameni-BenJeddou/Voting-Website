<!DOCTYPE html>
<html>
 <head>
 <title>Cours PHP / MySQL</title>
 <meta charset='utf-8'>
<link rel="stylesheet" href="achats.css">
 </head>
 <body>
 <h1>Bases de données MySQL</h1>
 <?php
 $servname = "localhost"; $dbname = "projectisie"; $user = "Ameni"; $pass = "ameni";

 try{
 $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
 $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 //Sélectionne les gouvernorats
 $sthGouv = $dbco->prepare("
 SELECT * from gouvernerat
 ");
 $sthGouv->execute();

 /*Retourne un tableau associatif pour chaque entrée de notre table
 *avec le nom des colonnes sélectionnées en clefs*/
 $resultatGouv = $sthGouv->fetchAll(PDO::FETCH_ASSOC);

 $sthParti= $dbco->prepare("
 SELECT * from partipolitique
 ");$sthParti->execute();

 /*Retourne un tableau associatif pour chaque entrée de notre table
 *avec le nom des colonnes sélectionnées en clefs*/
 $resultatParti = $sthParti->fetchAll(PDO::FETCH_ASSOC);

 foreach($resultatGouv as $clefGouv=>$valeurGouv)
 foreach($resultatParti as $clefParti=>$valeurParti)
{
 $sthVoix = $dbco->prepare("INSERT INTO voix(id_parti,id_gouvernerat,nombre_voix)
 VALUES('" . $valeurParti["id_parti"]. "','". $valeurGouv["id_gouvernerat"]."','". rand(500,10000) ."')");
 $sthVoix->execute();
}

echo '<pre>';
 print_r($resultatGouv);
print_r($resultatParti);
 echo '</pre>';
}

 catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
 }
 ?>
 </body>
</html>