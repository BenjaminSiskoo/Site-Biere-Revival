<?php 

include 'beerArray.php';
include 'db.php';

foreach ($beerArray as $element) {
// on crée une variable ou l'on récupère la cle et on applique par ex une opération
 $prixttc = $element[3]*1.2;
require_once 'db.php';
$sql = 'INSERT INTO bieres (nom, lien_photo, description, prix_ht, prix_ttc) VALUES (:nom, :lien_photo, :description, :prix_ht, :prix_ttc)';
$statement = $pdo->prepare($sql);

// Mon objet execute attend un tableau qui se trouve entre []
$result = $statement->execute([
	':nom' 		=> $element[0],
	':lien_photo'			=> $element[1],
	':description' 	=> $element[2],
	':prix_ht' 		=> $element[3],
// on affecte à la cle ":key" la valeur => $variable
	':prix_ttc' 	=> $prixttc

]);
}

?>