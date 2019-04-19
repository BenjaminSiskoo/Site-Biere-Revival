<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Présentation produit</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>
			<section class="row">
				<div class="col-md-12">
					<h1 class="text-center">La bière faite au pain par Julien et Kevin !</h1>
					<hr class="d-none d-lg-block" />
					<p>Il y a 3 ans de là, Julien et Kevin ont collaboré pour créer une bière inédite ! Mais qui n'a, malgrès toute ces années passé, toujours pas de nom.</p>
				</div>
			</section>

			<section class="row">
				<div class="col-md-6">
					<img id="illustration" src="images/biere_et_pain.jpeg" alt="Bière et pain" />
				</div>
				<div class="col-md-6">
					<p>Leurs pains sont entièrement "récolté" localement, dans un rayon de 10km. Pourquoi récolté ? Car ils utilise le pain racit de toute les boulangeries
					alentour pour en faire de la <strong>bière</strong> ! Le tout est fabriqué dans une petite brasserie qui n'a non plus pas de nom.</p>
					<p>MAIS ils vous font partager leurs ingrédients!</p>
					<h4>Il vous faudra:</h4>
					<ol>
						<li>Du Pain racit</li>
						<li>Pain racit</li>
						<li>Pain racit</li>
						<li>et enfin, du pain racit</li>
						<li>A oui, et de l'eau aussi</li>
					</ol>
				</div>
			</section>
			<br />

			<section class="row">
				<div class="col-12">
					<h2 class="text-center">Nos produits</h2>
					<hr />
					<p class="text-center">Voici ci-dessous notre sélection de produits</p>
				</div>
			</section>

			<section class="row">
				<div class="col-6 offset-3 col-md-3 offset-md-2">
					<div class="row box">
						<div class="col-12">
							<h3 class="my-3 text-center text-uppercase">Offre spécial</h3>
						</div>
						<div class="col-12 box-borders">
							<img class="my-3 mx-auto d-block" src="images/biere-x1.png" height="250" />
						</div>
						<div class="col-12">
							<h3 class="my-3 text-center text-uppercase">1 Acheté<br /> 2 offertes</h3>
						</div>
					</div>
				</div>
				<div class="col-6 offset-3 col-md-3 offset-md-2">
					<div class="row box">
						<div class="col-12">
							<h3 class="my-3 text-center text-uppercase">Classic</h3>
						</div>
						<div class="col-12 box-borders">
							<img class="my-3 mx-auto d-block" src="images/biere-x2.png" height="250" />
						</div>
						<div class="col-12 box-bottom">
							<h3 class="my-3 text-center text-uppercase">15€ Unité<br /> 50cl</h3>
						</div>
					</div>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>
	<?php include('scripts.php'); ?>
	</body>
</html>
