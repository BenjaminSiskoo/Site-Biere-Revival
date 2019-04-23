<?php	
		session_start();
		//recuperation users
		//connexion une seule fois à la bdd
		if (!empty($_POST)){
			// on réaffecte les variables avec les globales $_POST
			$email = $_POST["email"];
			$password = $_POST["password"];
			// Si les variables =1 donc c'est remplie, si une des variables =0 alors condition pas remplie
			if (!empty($email && $password)){	
				require_once 'db.php';
				//requete 
				$sql = "SELECT * FROM users WHERE `email`= ?";
				// prépare la requête et statement dans statement
				$statement = $pdo->prepare($sql);
				// statement on le passe dans execute
				$statement->execute([$email]);
				// attends un tableau 
				$result = $statement->fetch();
				// si result est true, on passe la condition
				// var_dump($result); 
				if ($result){
					if (password_verify($password, $result['password'])){
						$_SESSION["user"]=$result;
						// affiche la cle [user] et l'index [8]
						// var_dump($_SESSION["user"][8]);
						header('location:./produit.php');
					}else{
						header('location:./connexion.php');
					}
				}else{
					die('Erreur de connexion à la bdd ! / Email n\'existe pas');
				}
			}else{
				die('Champs vide');
			}
		}
?>

  <body>
        <div class="wrapper">
            <section class="login-container">
                <div>
                    <header>
                        <h2>Connexion</h2>
                    </header>
                    <form action="" method="Post">
                        
                        <input type="text" name="email" placeholder="Email" required="required" />
                        <input type="password" name="password" placeholder="Mot de passe" required="required" />
                        <button type="submit">S'inscrire</button>
                    </form>
                </div>
            </section>
        </div>
    </body>


