<?php
session_start();//----Démarrer une session...pour par exemple stocker des informations en mémoire...et
require_once("config.php");


//------------------------------ Traitement du panier -----------------------
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//Si je clique sur ajouter
	case "add":
		if(!empty($_POST["sQuantite"])) {
			$pid=$_GET["pid"];
			$resultat=mysqli_query($db,"SELECT * FROM table_produits WHERE IdProduit='$pid'");
	          while($Article=mysqli_fetch_array($resultat)){
			//---------- Je stocke dans un autre tableau (en gros un tableau dans un tableau)
			$MaListeArticle = array($Article["Reference"]=>array('LibProd'=>$Article["Libelle"], 'RefArticle'=>$Article["Reference"], 'Qte'=>$_POST["sQuantite"], 'Prix'=>$Article["PrixUHT"], 'image'=>$Article["Image"]));
			
			if(!empty($_SESSION["panier"])) {//Je crée la clé du tableau avec array_keys
				if(in_array($Article["Reference"],array_keys($_SESSION["panier"]))) {//in-array pour chercher une référence dans le panier...
					foreach($_SESSION["panier"] as $MaClef => $v) {//Ma clé
							if($Article["Reference"] == $MaClef) {
								if(empty($_SESSION["panier"][$MaClef]["Qte"])) {
									$_SESSION["panier"][$MaClef]["Qte"] = 0;
								}
								//Concaténation dynamique avec +=
								$_SESSION["panier"][$MaClef]["Qte"] += $_POST["sQuantite"];
							}
					}
				} else {//Array_merge pour effectuer une fusion d'élement d'un tableau
					$_SESSION["panier"] = array_merge($_SESSION["panier"],$MaListeArticle);
				}
			}  else {
				$_SESSION["panier"] = $MaListeArticle;
			}
		}
	}
	break;

	// Si je clique sur supprimer
	case "remove":
		if(!empty($_SESSION["panier"])) {
			foreach($_SESSION["panier"] as $MaClef => $v) {//Pour chaque élément contenu dans le panier...je sors une valeur de maclef et v
					if($_GET["RefArticle"] == $MaClef)
						unset($_SESSION["panier"][$MaClef]);//Détruit une variable... (c'est un peu la kryptonite de isset)				
					if(empty($_SESSION["panier"]))
						unset($_SESSION["panier"]);
			}
		}
	break;
	// Si le panier est vide
	case "empty":
		unset($_SESSION["panier"]);
	break;	
}
}
?>


<html>
<head>
<title>Panier en PHP</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>


<!-- Panier ---->
<div id="panier-shopping">
<div class="txt-ListeArticle">Panier</div>

<a href="index.php?action=empty" id="btnEmpty">Panier vide</a>
<?php
if(isset($_SESSION["panier"])){
    $total_qte = 0;//Initialisation de la somme des quantités
    $total_prix = 0;//Somme des prix
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
	<tbody>
	<tr>
		<th style="text-align:left;">Libéllé</th>
		<th style="text-align:left;">Référence</th>
		<th style="text-align:right;" width="5%">Quantité</th>
		<th style="text-align:right;" width="10%">Prix.U</th>
		<th style="text-align:right;" width="10%">Total</th>
		<th style="text-align:center;" width="5%"><!--Supprimer--></th>
	</tr>

<?php		
    foreach ($_SESSION["panier"] as $element){//Element est un élément du panier issu de la table produit
        $item_price = $element["Qte"]*$element["Prix"];
		?>
				<tr>
					<td><img src="<?php print $element["image"]; ?>" class="cart-item-image" /><?php echo $element["LibProd"]; ?></td>
					<td>
						<?php print $element["RefArticle"]; ?>
					</td>
					<td style="text-align:right;">
						<?php print $element["Qte"]; ?>
					</td>
					<td  style="text-align:right;">
						<?php print $element["Prix"]." €"; ?>
					</td>
					<td  style="text-align:right;">
						<?php print number_format($item_price,2)." €"; ?>
					</td>
					<td style="text-align:center;">
						<a href="index.php?action=remove&RefArticle=<?php print $element["RefArticle"]; ?>" class="btnRemoveAction">
						<img src="icon-delete.png" alt="Supprimer" /></a>
					</td>
				</tr>

				<?php
				$total_qte += $element["Qte"];//Somme des quantités
				$total_prix += ($element["Prix"]*$element["Qte"]);//Quantité x PrixUHT
		}
		?>

		<tr>
		<td colspan="2" align="right">Total:</td>
		<td align="right"><?php echo $total_qte; ?></td>
		<td align="right" colspan="2"><strong><?php print number_format($total_prix, 2)." €"; ?></strong></td>
		<td></td>
		</tr>
	</tbody>
</table>


  <?php
} else {
?>


<div class="panier-vide">Vider le panier</div>
<?php 
}
?>
</div>




<div id="tab-prod">
	<div class="txt-ListeArticle">Articles</div>
	<?php
	$res= mysqli_query($db,"SELECT * FROM table_produits ORDER BY IdProduit ASC");
	if (!empty($res)) { 
		while ($enrg=mysqli_fetch_array($res)) {
		
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&pid=<?php print $enrg["IdProduit"]; ?>">
				<div class="product-image"><img src="<?php echo $enrg["Image"]; ?>"></div>
				<div class="TitreProduit-footer">
				<div class="TitreProd"><?php print $enrg["Libelle"]; ?></div>
				<div class="PrixProd"><?php print $enrg["PrixUHT"]." €"; ?></div>

				<div class="cart-action">
					<input type="text" class="QteProd" name="sQuantite" value="1" size="2" />
					<button type="submit" class="btnAddAction">Ajouter</button>
				</div>
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "Panier ou base de données vide.";

	}
	?>
</div>


<?php //Mettre ce code dans un lien "se déconnecter" par exemple.
//Je vide le panier et détruit la session...
/*session_destroy();//Détruit la session
if(!empty($_SESSION["panier"])) {
	foreach($_SESSION["panier"] as $MaClef => $v) {
			if($_GET["RefArticle"] == $MaClef)
				unset($_SESSION["panier"][$MaClef]);				
			if(empty($_SESSION["panier"]))
				unset($_SESSION["panier"]);
	}
}*/


?>

</body>
</html>