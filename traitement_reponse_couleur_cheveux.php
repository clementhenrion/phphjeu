<?php include'head.php'; 
$id_partie = $_SESSION['id_partie'];
$reponse = $_POST['couleur_cheveux'];
?>
<div id='tableau'>
<?php

?>





<?php
//traitement de la réponse couleur_cheveux




$couleur_personnage = "SELECT * FROM personnage p, cheveux ch
WHERE ch.ID_cheveux = p.ID_cheveux 
AND ID_partie = :partie 
ORDER BY id 
";
$couleur_personnage = $bdd->prepare($couleur_personnage);
$couleur_personnage->execute(array(
	'partie' => $id_partie
	));
while ($couleur_personnage2= $couleur_personnage->fetch() ) {

		if ($_SESSION['couleur_cheveux'] == $reponse) {



$update_couleur_cheveux = "UPDATE personnage p, cheveux c SET est_affiche = :affiche WHERE c.ID_cheveux = p.ID_cheveux AND couleur_cheveux <> :ID_cheveux AND ID_partie = :partie";
$update_couleur_cheveux = $bdd->prepare($update_couleur_cheveux);
$update_couleur_cheveux->execute(array(
	'affiche' => 0,
	'ID_cheveux' => $reponse,
	'partie' => $id_partie
	));


}



else {

  $update_couleur_cheveux2 = "UPDATE personnage p,cheveux c SET est_affiche = :affiche WHERE c.ID_cheveux = p.ID_cheveux AND couleur_cheveux = :ID_cheveux AND ID_partie = :partie";
$update_couleur_cheveux2 = $bdd->prepare($update_couleur_cheveux2);
$update_couleur_cheveux2->execute(array(
	'affiche' => 0,
	'ID_cheveux' => $reponse,
	'partie' => $id_partie
	));




	}







}
















?>

<?php
header ("Refresh: 5;URL=partie_en_cours.php?id=$id_partie");
include'footer.php';
?>

