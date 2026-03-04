<?php
// var_dump($_POST);
if (isset($_SESSION['login'])) {
    $sql = "select nom,prenom,password from user where email=:email";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
    $sth->execute();
    $row = $sth->fetch();
    if (!$row) {
        header('location:index.php?page=logout');
    }
} else {
    header('location:index.php?page=index');
}
if (isset($_POST['modifier'])) {
    $actuel = $_POST['actuel'];
    $nouveau = $_POST['nouveau'];
    $confirmation = $_POST['confirmation'];
    if (empty($actuel) || empty($nouveau) || empty($confirmation)) {
        echo 'veuillez saisir toutes les informations';
    } else {
        $nb = strlen($nouveau);
        if ($nb < 12) {
            echo 'Le mot de passe doit contenir au minimum 12 caractères';
        }
        if (!preg_match("/[0-9]/", $nb)){
          echo 'Il manque un chiffre';
        }
        if (!preg_match("/[a-z]/", $nb)){
          echo 'Il manque une minuscule';
        }
        if (!preg_match("/[A-Z]/", $nb)){
          echo 'Il manque une majuscule';
        }
        if (!preg_match("/[^a-zA-Z0-9]/", $nb)){
          echo 'Il manque un caractère spécial';
        }
    }
    {
        $recupPassword = $row['password'];
        if (password_verify($actuel, $recupPassword)) {
            if ($nouveau == $confirmation) {
                $password = password_hash($nouveau, PASSWORD_DEFAULT);
                $sql = "update user set password=:password where email=:email";
                $sth = $dbh->prepare($sql);
                $sth->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
                $sth->bindParam(':password', $password, PDO::PARAM_STR);
                $sth->execute();
            } else {
                echo 'la confirmation n\'est pas identique à votre mot de passe';
            }
        } else {
            echo 'Votre mot de passe actuel est erroné';
        }
    }
}
echo '<h1 class="text-center text-primary">Profil</h1>
<form actiion="index.php?page=profil" method="POST">
<table class="table table-hover">
  <tbody>
    <tr class="table-secondary">
      <th scope="row">Nom</th>
      <td>' . $row['nom'] . '</td>

    </tr>
    <tr>
      <th scope="row">Prénom</th>
      <td>' . $row['prenom'] . '</td>
    </tr>
    <tr class="table-secondary">
      <th scope="row">Email</th>
      <td>' . $_SESSION['login'] . '</td>

    </tr>
    <tr>
      <th scope="row">Mot de passe actuel</th>
     <td><input type="password" name="actuel" class="form-control" required></td>

    </tr>
    <tr class="table-secondary">
      <th scope="row">Nouveau mot de pase</th>
      <td><input type="password" name="nouveau" class="form-control" required></td>

    </tr>
    <tr>
      <th scope="row">Confirmation du mot de passe</th>
     <td><input type="password" name="confirmation" class="form-control" required></td>

    </tr>
  </tbody>
</table>
<div class="text-center">
<button name="modifier" type="submit" class="btn btn-primary">Modifier</button>
</div>
</form>';
