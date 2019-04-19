<?php 
/*require 'connect.php';*/
require 'db.php';

if(!empty($_POST)){
    $firstname = ($_POST["firstname"]);
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $zipcode = ($_POST["zipcode"]);
    $city = $_POST["city"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = ($_POST["email"]);
    $password = $_POST["password"];
    $passwordVerif = $_POST["password_verif"];

    if (!empty($email) && !empty($password)){
        require_once 'db.php';
        $sql1 = "SELECT * FROM users WHERE `email`= ?";
        $statement1 = $pdo->prepare($sql1);
        $statement1->execute([$email]);
        $usermail = $statement1->fetch();
        
        if(!$usermail){
            if(strlen($password) <= 10 && strlen($password) >= 5){
                if($password === $passwordVerif){
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    require_once 'db.php';
                    $sql2 = 'INSERT INTO users (`firstname`, `lastname`, `address`, `zipcode`, `city`, `country`, `phone`, `email`, `password`) VALUES (:firstname, :lastname, :address, :zipcode, :city, :country, :phone, :email, :password)';
                    $statement2 = $pdo->prepare($sql2);
                    $result = $statement2->execute([
                        ":firstname" => $firstname,
                        ":lastname" => $lastname,
                        ":address" => $address,
                        ":zipcode" => $zipcode,
                        ":city" => $city,
                        ":country" => $country,
                        ":phone" => $phone,
                        ":email" => $email,
                        ":password" => $password]);
                    if($result){
                        $_SESSION["connect"] = true;
                        $_SESSION["username"] = $username;
                        header("Location: page.php");
                    }else{
                        die("erreur enregistrement en bdd");
                        // TODO : signaler erreur
                    }

                }else{
                    die("mdp différents");
                    // TODO : signaler que mdp non identiques
                }
            }else{
                // TODO : signaler que mdp est pas d'un bon format
                die("mdp pas bon format");
            }

        }else{
            die("utilisateur existe");
            // TODO : signaler que username existe
        }
    
    }else{
        // TODO : signaler les champs vides
    }

}

?>

<section class="form">
    <form method="POST" action="">
        <label for="prenom">Prénom</label>
        <input type="text" name="firstname" required>

        <label for="nom">Nom de famille</label>
        <input type="text" name="lastname" required>

        <label for="address">Adresse</label>
        <input type="text" name="address" required>

        <label for="zipcode">Code Postal</label>
        <input type="text" name="zipcode" required>

        <label for="ville">Ville</label>
        <input type="text" name="city" required>

        <label for="pays">Pays</label>
        <input type="text" name="country" required>

        <label for="phone">Téléphone</label>
        <input type="text" name="phone" required>

        <label for="email">Adresse email</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <label for="password">Verification mot de passe</label>
        <input type="password" name="password_verif" required>

        <input class="button" type="submit" name="submit_c" value="S'inscrire">
    </form>