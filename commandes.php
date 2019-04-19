<?php 

require 'db.php';
		//recuperation users
		require_once 'db.php';
		$sql = "SELECT * FROM bières";
		$statement = $pdo->prepare($sql);
		$statement->execute([$username]);
		$user = $statement->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Commandes</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>

			<form method="get" action="confirmation_commande.php" class="border border-white rounded p-5">
				<fieldset>
					<legend>Formulaire de commande</legend>

					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="nom">Nom</label>
							<input type="text" class="form-control" name="nom">
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="prenom">Prénom</label>
							<input type="text" class="form-control" name="prenom">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-3">
							<label for="tel">Téléphone</label>
							<input type="text" class="form-control" name="tel">
						</div>
						<div class="form-group col">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-lg">
							<label for="adresse">Adresse</label>
							<input type="text" class="form-control" name="adresse">
						</div>
						<div class="form-group col-12 col-lg-3">
							<label for="ville">Ville</label>
							<input type="text" class="form-control" name="ville">
						</div>
						<div class="form-group col-12 col-lg-2">
							<label for="pays">Pays</label>
							<input type="text" class="form-control" name="pays">
						</div>
						<div class="form-group col-12 col-lg-2">
							<label for="codePostal">Code postale</label>
							<input type="text" class="form-control" name="codePostal">
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped mt-5">
							<thead>
								<tr>
									<th scope="col">Nom de la bière</th>
									<th scope="col">Prix HT</th>
									<th scope="col">Prix TTC</th>
									<th scope="col">Quantité</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i=0; $i < count($beerArray); $i++) { ?>
								<tr id="<?= ($i+1) ?>">
									<th scope="row"><?= $beerArray[$i][0] ?></th>
									<td>€ <?= number_format($beerArray[$i][3], 2, ',', '.'); ?></td>
									<td>€ <?= number_format($beerArray[$i][3]*1.2, 2, ',', '.'); ?></td>
									<td>
										<input class="form-control" onclick="pomme(<?= ($i+1) ?>)" type="number" value="0" min="0" name="<?= 'beerName'.$i ?>">
										<input id="prixInitial<?= ($i+1) ?>" type="hidden" value="<?= $beerArray[$i][3] ?>">
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<button type="submit" class="btn btn-light float-left">Envoyer</button>
				</fieldset>
			</form>


			<?php include('footer.php'); ?>
		</div>
		<script type="text/javascript" src="table_ttc.js"></script>
		<?php include('scripts.php'); ?>
	</body>
</html>