<?php

include('beerArray.php');

if (!empty($_GET['nom'] && $_GET['prenom'] && $_GET['tel'] &&  $_GET['email'] && $_GET['adresse'] && $_GET['ville'] && $_GET['pays'] && $_GET['codePostal'])) {
		$nom = htmlentities($_GET['nom']);
		$prenom = htmlentities($_GET['prenom']);
		$tel = htmlentities($_GET['tel']);
		$email = htmlentities($_GET['email']);
		$adresse = htmlentities($_GET['adresse']);
		$ville = htmlentities($_GET['ville']);
		$pays = htmlentities($_GET['pays']);
		$codeP = htmlentities($_GET['codePostal']);
} else {
	header('Location: commandes.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Confirmation Commandes</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>

				<h1 class="text-center">Récapitulatif de la commande</h1>
				<hr class="d-md-none d-block">
				<div class="border border-white rounded p-3">
					<div class="row">
						<div class="col-xl-2 col-lg-12 border-bottom border-light ml-xl-5">
							<address class="m-0">
								<ul class="list-unstyled m-0 p-3">
									<li><?= $nom. " " .$prenom ?></li>
									<li><?= $adresse ?></li>
									<li><?= $codeP . " " .$ville ?></li>
									<li><?= $pays ?></li>
								</ul>
							</address>
						</div>
						<div class="col-xl-3 col-lg-12 border-bottom border-light">
							<ul class="list-unstyled m-0 p-3" >
								<li><?= $email ?></li>
								<li><?= $tel ?></li>
							</ul>
						</div>
					</div>
					
					<table class="table table-striped mt-3">

						<thead>
							<tr>
								<th scope="col">Nom de la bière</th>
								<th scope="col">Prix unitaire HT</th>
								<th scope="col">Prix unitaire TTC</th>
								<th scope="col">Quantité</th>
								<th scope="col">Total TTC</th>
							</tr>
						</thead>

						<tbody>
							<?php for ($i=0; $i < count($beerArray) ; $i++) {
								if ($_GET['beerName'.$i] > 0) {
							?>
							<tr>
								<td><?= $beerArray[$i][0]; ?></td>
								<td><?= '€ '.number_format($beerArray[$i][3], '2', ',', '.'); ?></td>
								<td><?= '€ '.number_format($beerArray[$i][3]*1.2, '2', ',', '.'); ?></td>
								<td><?= $_GET['beerName'.$i]; ?></td>
								<td><?= '€ '.number_format(($_GET['beerName'.$i]*$beerArray[$i][3])*1.2, '2', ',', '.'); ?></td>
							</tr>
							<?php }} ?>
							<?php  ?>
							<tfoot>
								<tr>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col">Totaux</th>
									<th scope="col">€ 0.00</th>
								</tr>
							</tfoot>
							<?php  ?>
						</tbody>
					</table>
				</div><!-- fin border -->

			<?php include('footer.php'); ?>
		</div>
		<script type="text/javascript" src="table_ttc.js"></script>
		<?php include('scripts.php'); ?>
	</body>
</html>