<?php

/*
Tout le code doit se faire dans ce fichier PHP

Réalisez un formulaire HTML contenant :
- firstname
- lastname
- email
- pwd
- pwdConfirm

Créer une table "user" dans la base de données, regardez le .env à la racine et faites un build de docker
si vous n'arrivez pas à les récupérer pour qu'il les prenne en compte

Lors de la validation du formulaire vous devez :
- Nettoyer les val$valeur, exemple trim sur l'email et lowercase (5 points)
- Attention au mot de passe (3 points)
- Attention à l'unicité de l'email (4 points)
- Vérifier les champs sachant que le prélastname et le lastname sont facultatifs
- Insérer en BDD avec PDO et des requêtes préparées si tout est OK (4 points)
- Sinon afficher les erreurs et remettre les val$valeur pertinantes dans les inputs (4 points)

Le design je m'en fiche mais pas la sécurité

Bonus de 3 points si vous arrivez à envoyer un mail via un compte SMTP de votre choix
pour valider l'adresse email en bdd

Pour le : 22 Octobre 2025 - 8h
M'envoyer un lien par mail de votre repo sur y.skrzypczyk@gmail.com
Objet du mail : TP1 - 2IW3 - lastname Prélastname
Si vous ne savez pas mettre votre code sur un repo envoyez moi une archive
*/

function getConnexion() {
    try {
        $pdo = new PDO("pgsql:host=pg-db;port=5432;dbname=devdb", "devuser", "devpass"); //connexion a la base 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $erreur) {
        die("Erreur de connexion : " . $erreur->getMessage()); // msg d'erreur de connexion 
    }
}

$erreurs_possible = []; // variable dans la ql on stockera les msg d'erreur
$valeur = ['lastname' => '', 'firstname' => '', 'email' => '']; //champs vide

//recup des vaaleur envoyé du formulaire si le formulaire a bien été envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastname = trim($_POST['lastname'] ?? '');
    $firstname = trim($_POST['firstname'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? '')); 
    $pwd = $_POST['pwd'] ?? '';
    $pwdConfirm = $_POST['pwd_confirm'] ?? '';

    //permet de garder les valeurs après une erreur
    $valeur['lastname'] = $lastname;
    $valeur['firstname'] = $firstname;
    $valeur['email'] = $email;

    // Vérification du mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs_possible[] = "Email invalide.";
    }
    
    //vérification pwd
    if (strlen($pwd) < 8) {
        $erreurs_possible[] = "Mot de passe trop court (8 caractères min)."; 
    }
    if ($pwd !== $pwdConfirm) {
        $erreurs_possible[] = "Les mots de passe ne sont pas identique.";
    }

    // vérification de si le mail existe déja dans la bdd
    if (empty($erreurs_possible)) { //on vérifie que la variable est vide 
        $pdo = getConnexion();
        $verif = $pdo->prepare('SELECT id FROM "user" WHERE email = :email');//sous reqt qui compare les email de la bdd avec le mail saisie
        $verif->execute(['email' => $email]);
        if ($verif->fetch()) { //recup la premiere ligne du résultat sous la forme d'un tableau
            $erreurs_possible[] = "Ce email est déjà utilisé.";
        }
    }

    
    if (empty($erreurs_possible)) {
        $insert = $pdo->prepare('INSERT INTO "user" (lastname, firstname, email, pwd)
                                 VALUES (:lastname, :firstname, :email, :pwd)');//requet insert pour inserer les donner entrer par l'utilisateur
        $insert->execute([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'pwd' => password_hash($pwd, PASSWORD_DEFAULT)
        ]);

        echo "Formulaire envoyé";
        $valeur = ['lastname' => '', 'firstname' => '', 'email' => '']; // revide les champs
    }
}
?>
 <? // permet d'afficher les erreurs, j'ai mis dans une balise php car j'arriver pas a commenter sans =) ?>
<?php if (!empty($erreurs_possible)): ?>
    <ul style="color:red;">
        <?php foreach ($erreurs_possible as $erreur): ?>
            <li><?= $erreur ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<form method="POST">
<label>lastname :</label><br>
<input type="text" name="lastname" value="<?= $valeur['lastname'] ?>"><br>

<label>firstname :</label><br>
<input type="text" name="firstname" value="<?=  $valeur['firstname'] ?>"><br>

<label>Adresse Mail :</label><br>
<input type="text" name="email" value="<?= $valeur['email'] ?>" required><br>
<label>Mot de passe :</label><br>
<input type="password" name="pwd" required><br><br>
<label>Confirmer le Mot de passe :</label><br>
<input type="password" name="pwd_confirm" required><br><br>


<input type="submit" value="Valider">
</form>


