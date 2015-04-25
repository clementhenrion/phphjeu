<?php include'head.php'; 
$id_partie = strip_tags($_GET['id']);
?>
<div id='tableau'>


<?php
//affichage des 24 persos

$personnage = "SELECT * FROM personnage p, corp co, cheveux ch, barbe b, collier col, vetement v, lunettes l  
WHERE co.ID_corp = p.ID_corp 
AND ch.ID_cheveux = p.ID_cheveux 
AND b.ID_barbe = p.ID_barbe 
AND col.ID_collier = p.ID_collier 
AND v.ID_vetement = p.ID_vetement 
AND l.ID_lunettes = p.ID_lunettes 
AND ID_partie = :partie 
ORDER BY id 
";
$personnage = $bdd->prepare($personnage);
$personnage->execute(array(
	'partie' => $id_partie
	));
while ($personnage2= $personnage->fetch() ) {

	 if ($personnage2['est_affiche'] == 1) {
				
	?>
<div id="image">
 <img id="couleur" src="Corps/<?php echo $personnage2['image_corps']; ?>" /></br>
 <img id="cheveux" src="Cheveux/<?php echo $personnage2['image_cheveux']; ?>" /></br>
 <?php
 if ($personnage2['genre_cheveux'] == "homme") {
 	?>
 	<img id="barbe" src="Barbe/<?php echo $personnage2['image_barbe']; ?>" /></br>
 	<?php
 }
 if ($personnage2['genre_cheveux'] == "femme") {
 	?>
 	 <img id="collier" src="collier/<?php echo $personnage2['image_collier']; ?>" /></br>
 	 <?php
 }
 ?>

 <img id="lunette" src="Lunette/<?php echo $personnage2['image_lunettes']; ?>" /></br>
 <img id="cravate" src="vetement/<?php echo $personnage2['image_vetement']; ?>" /></br>
<?php
	} ?>
</div> <?php
} ?>

</br></br></br>
</div>
<div id="tableaucarte" >
<?php

$personnage_advers = "SELECT * FROM personnage p, corp co, cheveux ch, barbe b, collier col, vetement v, lunettes l  
WHERE co.ID_corp = p.ID_corp 
AND ch.ID_cheveux = p.ID_cheveux 
AND b.ID_barbe = p.ID_barbe 
AND col.ID_collier = p.ID_collier 
AND v.ID_vetement = p.ID_vetement 
AND l.ID_lunettes = p.ID_lunettes 
AND ID_partie = :partie 
ORDER BY id 
";
$personnage_advers = $bdd->prepare($personnage_advers);
$personnage_advers->execute(array(
	'partie' => $id_partie
	));
while ($personnage_advers2= $personnage_advers->fetch() ) {

	 if ($personnage_advers2['est_affiche'] == 1) {
				
	?>
<div id="carte">
<img id="carte" src="dos.png" /></br>
<?php

	} ?>
</div> <?php
} ?>




<?php
//perso mystère joueur


$personnage_myst_j = "SELECT * FROM personnage p, corp co, cheveux ch, barbe b, collier col, vetement v, lunettes l  
WHERE co.ID_corp = p.ID_corp 
AND ch.ID_cheveux = p.ID_cheveux 
AND b.ID_barbe = p.ID_barbe 
AND col.ID_collier = p.ID_collier 
AND v.ID_vetement = p.ID_vetement 
AND l.ID_lunettes = p.ID_lunettes 
AND ID_partie = :partie 
AND mystere_j = :myst 
ORDER BY id 
";
$personnage_myst_j = $bdd->prepare($personnage_myst_j);
$personnage_myst_j->execute(array(
	'partie' => $id_partie,
	'myst' => 1
	));


while ($personnage_myst_j2= $personnage_myst_j->fetch() ) {
	 if ($personnage_myst_j2['est_affiche'] == 1) {
				
	?>

 <img id="couleur" src="Corps/<?php echo $personnage_myst_j2['image_corps']; ?>" /></br>
 <img id="cheveux" src="Cheveux/<?php echo $personnage_myst_j2['image_cheveux']; ?>" /></br>
 <?php
 if ($personnage_myst_j2['genre_cheveux'] == "homme") {
 	?>
 	<img id="barbe" src="Barbe/<?php echo $personnage_myst_2['image_barbe']; ?>" /></br>
 	<?php
 }
 if ($personnage_myst_j2['genre_cheveux'] == "femme") {
 	?>
 	 <img id="collier" src="collier/<?php echo $personnage_myst_j2['image_collier']; ?>" /></br>
 	 <?php
 }
 ?>

 <img id="lunette" src="Lunette/<?php echo $personnage_myst_j2['image_lunettes']; ?>" /></br>
 <img id="cravate" src="vetement/<?php echo $personnage_myst_j2['image_vetement']; ?>" /></br>
 <?php
 $nom_mystere_j_id = $personnage_myst_j2['ID_nom'];
}
}
?> </div> <?php





//selection / affichage perso mystere advers



$personnage_myst_nj = "SELECT * FROM personnage p, corp co, cheveux ch, barbe b, collier col, vetement v, lunettes l  
WHERE co.ID_corp = p.ID_corp 
AND ch.ID_cheveux = p.ID_cheveux 
AND b.ID_barbe = p.ID_barbe 
AND col.ID_collier = p.ID_collier 
AND v.ID_vetement = p.ID_vetement 
AND l.ID_lunettes = p.ID_lunettes 
AND ID_partie = :partie 
AND mystere_nj = :myst 
ORDER BY id 
";
$personnage_myst_nj = $bdd->prepare($personnage_myst_nj);
$personnage_myst_nj->execute(array(
	'partie' => $id_partie,
	'myst' => 1
	));


while ($personnage_myst_nj2= $personnage_myst_nj->fetch() ) {
	 if ($personnage_myst_nj2['est_affiche'] == 1) {
				
	?>
<div id="carte">
<img id="carte" src="dos.png" /></br>

 <?php



 $nom_mystere_nj_id = $personnage_myst_nj2['ID_nom'];
 
}
}
?> </div> <?php


$nom_perso_mystere = "SELECT * FROM personnage p, nom n WHERE n.ID_nom = p.ID_nom AND p.ID_nom = :id";
$nom_perso_mystere = $bdd->prepare($nom_perso_mystere);
$nom_perso_mystere->execute(array(
	'id' => $nom_mystere_nj_id
	));

while ($nom_perso_mystere2= $nom_perso_mystere->fetch() ) {

	$mystere_nj = $nom_perso_mystere2['nom'];

									}













//Debut question :
error_reporting(0);
$reponse_nom = $_POST['nom'];
if ($reponse_nom == $mystere_nj) {
	echo "PArtie gagne !";
}

?>


  <form method="post" action="partie_en_cours.php?id=<?php echo $_SESSION['num_partie']; ?>">
  <input type="text" name="nom" placeholder="nom" />
<input type="submit" value="Tentez votre chance !" />
</form>




<?php














?>

<?php
include'footer.php';
?>