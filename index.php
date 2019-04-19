<?php
session_start();
if (isset($_SESSION["connect"])) {
	$connect = $_SESSION["connect"];
}else{
	$connect = false;
}
if($connect){
	header("Location: page.php");
	//fin du traitement
}



$errusername="";
$errpassword="";

if(!empty($_POST)){
	$stock = require 'beerArray.php.php';
	$username = strtolower($_POST["username"]);
	$password = $_POST["password"];

	if (!empty($username) && !empty($password)){
		//recuperation users
		require_once 'db.php';
		$sql = "SELECT * FROM bières WHERE `name`= ?";
		$statement = $pdo->prepare($sql);
		$statement->execute([$username]);
		$user = $statement->fetch();

		
		/* verifier couple user / mdp */
		if($user){
			if (password_verify($password, $user["password"])){
					
					$_SESSION["connect"] = true;
					$_SESSION["username"] = $username;
					header("Location: page.php");
			}else{
				header("HTTP/1.0 403 Forbidden");
				/*  USERNAME ou MDP pas bon */
			}
		}else{
			header("HTTP/1.0 403 Forbidden");
			/* USERNAME ou MDP pas bon */
		}
	}else{

		if(empty($username)){
			$errusername= "class=\"danger\"";
		}

		if(empty($password)){
			$errpassword="class=\"danger\"";
		}

		
	}

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>formulaire de connexion</title>
	<link rel="stylesheet" type="text/css" href="assets/css/form.css">
</head>
<body>
	<div class="wrapper">
		<section class="login-container">
			<div>
				<header>
					<h2>Identification</h2>
				</header>
				<form action="" method="Post">
					<input <?= $errusername ?> type="text" name="username" placeholder="Nom d'utilisateur" required="required" />
					<input <?= $errpassword ?> type="password" name="password" placeholder="Mot de passe" required="required" />
					<button type="submit">Connexion</button>
				</form>
			</div>
		</section>
	</div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Présentation entreprise</title>
		<?php include('head.php'); ?>
	</head>
	<body>
		<div id="oppacity-bg" class="container">
			<?php include('header.php'); ?>
			<section class="row">
				<div class="col-12 col-md-12">
					<h1 class="text-center">Qui somme nous ?</h1>
					<hr class="d-none d-lg-block" />
					<p class="m--2">Entreprise créée par l'association de 2 formateurs, Julien et Kévin. Cette entreprise élabore de façon artisanale de la bière.<br />
					Elle est située en Allemagne, à Stuttgart. L'entreprise s'est spécialisée dans l'élaboration d'une bière aromatisée au pain.</p>
				</div>
			</section>

			<section class="row">
				<div id="contact" class="col-12">
					<h2 class="text-center">Contactez-nous !</h2>
					<hr />
				</div>
			</section>

			<section class="row">
				<div class="col-12 col-md-6">
					<img src="images\plan_stuttgart.jpg" alt="Plan Stuttgart" />
				</div>
				<div class="col-md-6">
					<div class="contact-list">
						<address>
							<ul class="p-0 list-unstyled">
								<p class="m-0">Par voie postale:</p>
								<li>51 rue de la bière</li>
								<li>70173 Stuttgart</li>
								<li>ALLEMAGNE</li>
							</ul>
						</address>
						<p>Par email:<br />
						<a href="mailto:biere@apprendre.co">biere@apprendre.co</a>
						</p>
					</div>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>
	<?php include('scripts.php'); ?>
	</body>
</html>
