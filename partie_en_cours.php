<?php include'head.php'; 
$_SESSION['id_partie'] = $_GET['id'];
?>
<div id='tableau'>


<?php
//affichage des 24 persos

$personnage = "SELECT * FROM personnage p, corp co, cheveux ch, barbe b, collier col, vetement v, lunettes l, nom n  
WHERE co.ID_corp = p.ID_corp 
AND ch.ID_cheveux = p.ID_cheveux 
AND b.ID_barbe = p.ID_barbe 
AND col.ID_collier = p.ID_collier 
AND v.ID_vetement = p.ID_vetement 
AND l.ID_lunettes = p.ID_lunettes 
AND n.ID_nom = p.ID_nom 
AND ID_partie = :partie 
ORDER BY id 
";
$personnage = $bdd->prepare($personnage);
$personnage->execute(array(
	'partie' => $_SESSION['id_partie']
	));
while ($personnage2= $personnage->fetch() ) {

	 if ($personnage2['est_affiche'] == 1) {
				
	?>
<div id="image">
 <img id="couleur" src="Corps/<?php echo $personnage2['image_corps']; ?>" />
 <img id="cheveux" src="Cheveux/<?php echo $personnage2['image_cheveux']; ?>" />
 <?php
 if ($personnage2['genre_cheveux'] == "homme") {
 	?>
 	<img id="barbe" src="Barbe/<?php echo $personnage2['image_barbe']; ?>" />
 	<?php
 }
 if ($personnage2['genre_cheveux'] == "femme") {
 	?>
 	 <img id="collier" src="collier/<?php echo $personnage2['image_collier']; ?>" />
 	 <?php
 }
 ?>

 <img id="lunette" src="Lunette/<?php echo $personnage2['image_lunettes']; ?>" />
 <img id="cravate" src="vetement/<?php echo $personnage2['image_vetement']; ?>" />
<?php
echo $personnage2['nom'];
											} 
											?>
</div> 
<?php


if ($personnage2['est_affiche'] == 0) {
 	
 
	?>
<div id="carte">
<img id="carte" src="dos2.png" /></br>
	<?php
										}
	}











?>



</br></br></br>
</div>
<div id="tableaucarte">
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
	'partie' => $_SESSION['id_partie']
	));
while ($personnage_advers2= $personnage_advers->fetch() ) {

	 if ($personnage_advers2['est_affiche_nj'] == 1) {
				
	?>
<div id="carte">
<img id="carte" src="dos.png" /></br>
<?php

	} ?>
</div><?php
} ?></div>




<div id="myster"> 

<div id="imagemyster">
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
	'partie' => $_SESSION['id_partie'],
	'myst' => 1
	));


while ($personnage_myst_j2= $personnage_myst_j->fetch() ) {
	 if ($personnage_myst_j2['est_affiche_nj'] == 1) {
				
	?>

 <img id="couleur" src="Corps/<?php echo $personnage_myst_j2['image_corps']; ?>" />
 <img id="cheveux" src="Cheveux/<?php echo $personnage_myst_j2['image_cheveux']; ?>" />
 <?php
 if ($personnage_myst_j2['genre_cheveux'] == "homme") {
 	?>
 	<img id="barbe" src="Barbe/<?php echo $personnage_myst_2['image_barbe']; ?>" />
 	<?php
 }
 if ($personnage_myst_j2['genre_cheveux'] == "femme") {
 	?>
 	 <img id="collier" src="collier/<?php echo $personnage_myst_j2['image_collier']; ?>" />
 	 <?php
 }
 ?>

 <img id="lunette" src="Lunette/<?php echo $personnage_myst_j2['image_lunettes']; ?>" />
 <img id="cravate" src="vetement/<?php echo $personnage_myst_j2['image_vetement']; ?>" />

 <?php 

 $nom_mystere_j_id = $personnage_myst_j2['ID_nom'];
}
}

?> </div> <?php



//affichage perso mystere advers



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
	'partie' => $_SESSION['id_partie'],
	'myst' => 1
	));


while ($personnage_myst_nj2= $personnage_myst_nj->fetch() ) {
	 if ($personnage_myst_nj2['est_affiche'] == 1) {
				
	?>
<div id="carte">
<img id="carte" src="dos.png" /></br>

 <?php
 //caracteristiques du personnage A DEVINER (mystere nj)
 $_SESSION['couleur_corp'] = $personnage_myst_nj2['couleur_corp'];

$_SESSION['couleur_cheveux'] = $personnage_myst_nj2['couleur_cheveux'];

$_SESSION['couleur_lunettes'] = $personnage_myst_nj2['couleur_lunettes'];
$_SESSION['couleur_collier'] = $personnage_myst_nj2['couleur_collier'];
$_SESSION['couleur_barbe'] = $personnage_myst_nj2['couleur_barbe'];
$_SESSION['couleur_vetement'] = $personnage_myst_nj2['couleur_vetement'];





 $nom_mystere_nj_id = $personnage_myst_nj2['ID_nom'];

}
}
?> </div><?php


$nom_perso_mystere = "SELECT * FROM personnage p, nom n WHERE n.ID_nom = p.ID_nom AND p.ID_nom = :id";
$nom_perso_mystere = $bdd->prepare($nom_perso_mystere);
$nom_perso_mystere->execute(array(
	'id' => $nom_mystere_nj_id
	));

while ($nom_perso_mystere2= $nom_perso_mystere->fetch() ) {

	$_SESSION['mystere_nj'] = $nom_perso_mystere2['nom'];

									} ?></div><?php













//Debut question :
error_reporting(0);

?>


<p>Question sur les cheveux</p>
  <form method="post" action="traitement_reponse_couleur_cheveux.php">
  <p>
     <select name="couleur_cheveux" id="couleur_cheveux">
     	 <option value="noir">noir</option>
           <option value="blond">blond</option>
           <option value="roux">roux</option>
           <option value="gris">gris</option>
         
     </select>
     <input type="submit" value="Envoyer" />
     </p>
</form>
</br></br>


<p>Question sur les vetements</p>
  <form method="post" action="traitement_reponse_couleur_vetement.php">
  <p>
     <select name="couleur_vetement" id="couleur_vetement">
     	 <option value="bleu">bleu</option>
           <option value="vert">vert</option>
           <option value="rouge">rouge</option>
           <option value="marron">marron</option>
           <option value="violet">violet</option>
           <option value="noir">noir</option>
     </select>
     <input type="submit" value="Envoyer" />
     </p>
</form>
</br></br>

<p>Question sur les lunettes</p>
  <form method="post" action="traitement_reponse_couleur_lunettes.php">
  <p>
     <select name="couleur_lunettes" id="couleur_lunettes">
     	 <option value="bleu">bleu</option>
           <option value="vert">vert</option>
           <option value="orange">orange</option>
           <option value="violet">violet</option>
           <option value="noir">noir</option>
     </select>
     <input type="submit" value="Envoyer" />
     </p>
</form>
</br></br>

<p>Question sur le corps</p>
  <form method="post" action="traitement_reponse_couleur_corps.php">
  <p>
     <select name="couleur_corps" id="couleur_corps">
     	 <option value="noir">noir</option>
           <option value="blanc">blanc</option>
     </select>
     <input type="submit" value="Envoyer" />
     </p>
</form>
</br></br>

<p>Question sur le collier</p>
  <form method="post" action="traitement_reponse_couleur_collier.php">
  <p>
     <select name="couleur_collier" id="couleur_collier">
     	   <option value="bleu">bleu</option>
           <option value="jaune">jaune</option>
           <option value="rouge">rouge</option>
           <option value="gris">gris</option>
        
     </select>
     <input type="submit" value="Envoyer" />
     </p>
</form>
</br></br>

<p>Question sur la barbe</p>
  <form method="post" action="traitement_reponse_couleur_barbe.php">
  <p>
     <select name="couleur_barbe" id="couleur_barbe">
     	   <option value="gris">gris</option>
           <option value="roux">roux</option>
           <option value="blond">blond</option>
           <option value="noir">noir</option>
        
     </select>
     <input type="submit" value="Envoyer" />
     </p>
</form>
</br></br>


  <form method="post" action="partie_gagnee.php?id=<?php echo $_SESSION['id_partie']; ?>">
  <input type="text" name="nom" placeholder="nom" />
<input type="submit" value="Tentez votre chance !" />
</form>




<?php














?>

<?php
include'footer.php';
?>