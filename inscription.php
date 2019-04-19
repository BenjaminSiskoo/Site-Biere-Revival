<?php 
    session_start();
    /* Si on est déjà connecter on redirige vers page.php */
    if (isset($_SESSION['username'])) {
        header("Location: page.php");
        exit;
    }
    /*
        Définition des variable pour contrer l'erreur
        undefined en cas d'utilisation du debugeur "xdebug".
    */
    $errUsername = "";
    $errPassword = "";
    $errPasswordConfirmed = "";
    $errUsernamePwd = false;
    /* Vérif que le formulaire ($_POST) n'est pas vide */
    if(!empty($_POST)){
        $username = strtolower($_POST['username']);
        $password = $_POST['password'];
        $passwordConfirmed = $_POST['passwordConfirmed'];
        /* verif que les champs ne sont pas vides */
        if (!empty($username) && !empty($password)) {
            /* récupération de l'utilisateur */
            require_once 'db.php';
            $sql = 'SELECT * FROM users WHERE name = ?';
            $statement = $pdo->prepare($sql);
            $statement->execute([$username]);
            $user = $statement->fetch();
            /* Si $user est false (l'utilisateur existe pas) */
            if (!$user) {
                /* Verif que le mdp soit dans le format désiré */
                if (strlen($password) <= 10 && strlen($password) >= 5) { // Format à déposer dans la condition
                    /* Si mot de passe identiques = true */
                    if ($password === $passwordConfirmed) {
                        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
                        require_once 'db.php';
                        $sql = 'INSERT INTO users (name, password) VALUES (:name, :password)';
                        $statement = $pdo->prepare($sql);
                        $result = $statement->execute([
                            ':name' => $username,
                            ':password' => $passwordhash
                        ]);
                        if ($result) { // Si tout s'est bien passé
                            session_start();
                            $_SESSION['username'] = $username;
                            header("Location: page.php");
                        }else{
                            die('erreur enregistrement en base de donnée');
                            /* TODO : Signaler l'erreur */
                        }
                    }else{
                        /* TODO : Les mot de passe ne sont pas identiques */
                    }
                }else{
                    /* TODO : Mot de passe n'est pas entre 5 et 10 caractères */
                }
            }else{
                /* TODO : L'uilisateur existe déjà */
            }
        }else{
            /* Si le champs utilisateur est envoyer vide alors class="danger" */
            if (empty($username)) {
                $errUsername = "class=\"danger\"";
            }
            /* Si le champs mot de passe est envoyer vide alors class="danger" */
            if (empty($password)) {
                $errPassword = "class=\"danger\"";
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
                        <h2>Inscription</h2>
                    </header>
                    <form action="" method="Post">
                        
                        <input <?php echo $errUsername ?> type="text" name="username" placeholder="Nom d'utilisateur" required="required" />
                        <input <?php echo $errPassword ?> type="password" name="password" placeholder="Mot de passe" required="required" />
                        <input <?php echo $errPasswordConfirmed ?> type="password" name="passwordConfirmed" placeholder="Retapez votre mot de passe" required="required" />
                        <button type="submit">S'inscrir</button>
                    </form>
                </div>
            </section>
        </div>
        <!-- Si $errUsernamePwd est à true (erreur) alors execute le script js -->
        <?php if ($errUsernamePwd === true): ?>
            <script src="assets/js/errorAlert.js"></script>
        <?php endif; ?>
    </body>
</html>