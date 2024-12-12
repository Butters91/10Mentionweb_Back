<?php

require_once "inc/functions.inc.php";

// Si l'utilisateur est connecté, le rediriger vers la page de profil
session_start();
if (isset($_SESSION['utilisateur'])) {
    header('Location: profil.php');
    exit;
}

$info = "";

if (!empty($_POST)) {

    // Vérification des champs vides
    $verif = true;
    foreach ($_POST as $key => $value) {
        if (empty(trim($value))) {
            $verif = false;
        }
    }

    if ($verif == false) {
        $info = alert("Veuillez renseigner tous les champs", "danger");
    } else {
        // Récupération des valeurs des champs
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmpassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

        // Validation du champ username
        if (strlen($username) < 3 || strlen($username) > 50) {
            $info .= alert("Le nom d'utilisateur doit contenir entre 3 et 50 caractères.", "danger");
        }

        // Validation de l'email
        if (strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $info .= alert("L'email n'est pas valide.", "danger");
        }

        // Validation du téléphone (doit contenir exactement 10 chiffres)
        if (!preg_match('/^[0-9]{10}$/', $phone)) {
            $info .= alert("Le téléphone n'est pas valide. Il doit contenir 10 chiffres.", "danger");
        }

        // Validation du mot de passe (au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial)
        $regexpassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        if (!preg_match($regexpassword, $password)) {
            $info .= alert("Le mot de passe n'est pas valide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.", "danger");
        }

        // Vérification de la correspondance entre le mot de passe et sa confirmation
        if ($password !== $confirmpassword) {
            $info .= alert("Le mot de passe et la confirmation doivent être identiques.", "danger");
        }

        // Vérification des erreurs et existence de l'email dans la base de données
        if (empty($info)) {

            // Vérifier si l'email existe déjà
            $emailExist = checkEmailUsers($email);
            if ($emailExist) {
                $info = alert("Cet email est déjà utilisé.", "danger");
            } else {

                // Hashage du mot de passe
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                // Inscription de l'utilisateur dans la base de données
                inscriptionUsers($username, $email, $passwordHash, $phone);
                $info = alert('Vous êtes bien inscrit, vous pouvez <a href="authentification.php" class="text-danger fw-bold">vous connecter</a>.', 'success');
            }
        }
    }
}

require_once "inc/header.inc.php";
?>

<main style="background:url(assets/img/5818.png) no-repeat; background-size: cover; background-attachment: fixed;">
    <div class="w-75 m-auto p-5" style="background: rgba(20, 20, 20, 0.9);">
        <h2 class="text-center mb-5 p-3">Créer un compte</h2>
        <?php
        echo $info;
        ?>

        <form action="" method="post" class="p-5">
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="username" class="form-label mb-3">Nom d'utilisateur</label>
                    <input type="text" class="form-control fs-5" id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 mb-5">
                    <label for="email" class="form-label mb-3">Email</label>
                    <input type="text" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                <div class="col-md-4 mb-5">
                    <label for="phone" class="form-label mb-3">Téléphone</label>
                    <input type="text" class="form-control fs-5" id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="password" class="form-label mb-3">Mot de passe</label>
                    <input type="password" class="form-control fs-5" id="password" name="password" placeholder="Entrer votre mot de passe">
                </div>
                <div class="col-md-6 mb-5">
                    <label for="confirmPassword" class="form-label mb-3">Confirmation mot de passe</label>
                    <input type="password" class="form-control fs-5 mb-3" id="confirmPassword" name="confirmPassword" placeholder="Confirmer votre mot de passe">
                    <input type="checkbox" onclick="myFunction()"> <span class="text-danger">Afficher/masquer le mot de passe</span>
                </div>
            </div>
            <div class="row mt-5">
                <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">S'inscrire</button>
                <p class="mt-5 text-center">Vous avez déjà un compte ? <a href="authentification.php" class="text-danger">Connectez-vous ici</a></p>
            </div>
        </form>
    </div>
</main>

<?php
require_once "inc/footer.inc.php";
?>
